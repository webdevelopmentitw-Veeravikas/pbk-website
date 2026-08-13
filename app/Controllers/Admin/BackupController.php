<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Database;
use App\Models\ActivityLog;

class BackupController extends BaseAdminController
{
    private string $backupDir;

    public function __construct()
    {
        $this->backupDir = storage_path('backups');
        if (!is_dir($this->backupDir)) {
            mkdir($this->backupDir, 0755, true);
        }
    }

    public function index(): void
    {
        $this->view('admin.backup.index', [
            'backups' => $this->listBackups(),
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $filename = 'backup_' . date('Y-m-d_His') . '.sql';
        $filepath = $this->backupDir . '/' . $filename;

        try {
            if ($this->tryMysqldump($filepath)) {
                ActivityLog::record(Auth::id(), 'backup_create', "Database backup created: {$filename}");
                $this->flash('success', 'Backup created successfully.');
                $this->redirect(url('/admin/backup'));
            }

            $this->exportViaPhp($filepath);
            ActivityLog::record(Auth::id(), 'backup_create', "Database backup created (PHP): {$filename}");
            $this->flash('success', 'Backup created successfully.');
        } catch (\Throwable $e) {
            $this->flash('danger', 'Backup failed: ' . $e->getMessage());
        }

        $this->redirect(url('/admin/backup'));
    }

    public function download(string $file): void
    {
        $path = $this->resolveBackupPath($file);
        if (!$path) {
            abort(404, 'Backup not found.');
        }

        header('Content-Type: application/sql');
        header('Content-Disposition: attachment; filename="' . basename($path) . '"');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        exit;
    }

    public function restore(): void
    {
        $file = (string) ($this->request->post('file') ?? '');
        $path = $this->resolveBackupPath($file);
        if (!$path) {
            $this->notFound('Backup not found.');
        }

        try {
            $sql = file_get_contents($path);
            if ($sql === false || $sql === '') {
                throw new \RuntimeException('Backup file is empty.');
            }

            $db = Database::getInstance();
            $pdo = $db->pdo();
            $pdo->exec('SET FOREIGN_KEY_CHECKS=0');

            foreach ($this->splitSqlStatements($sql) as $statement) {
                $trimmed = trim($statement);
                if ($trimmed !== '') {
                    $pdo->exec($trimmed);
                }
            }

            $pdo->exec('SET FOREIGN_KEY_CHECKS=1');

            ActivityLog::record(Auth::id(), 'backup_restore', "Database restored from: {$file}");
            $this->flash('success', 'Database restored from backup.');
        } catch (\Throwable $e) {
            $this->flash('danger', 'Restore failed: ' . $e->getMessage());
        }

        $this->redirect(url('/admin/backup'));
    }

    private function listBackups(): array
    {
        $files = glob($this->backupDir . '/*.sql') ?: [];
        $backups = [];

        foreach ($files as $file) {
            $backups[] = [
                'name' => basename($file),
                'size' => filesize($file),
                'date' => date('Y-m-d H:i:s', filemtime($file)),
            ];
        }

        usort($backups, fn ($a, $b) => strcmp($b['date'], $a['date']));

        return $backups;
    }

    private function resolveBackupPath(string $file): ?string
    {
        $file = basename($file);
        if (!preg_match('/^backup_[\w\-]+\.sql$/', $file)) {
            return null;
        }

        $path = $this->backupDir . '/' . $file;
        return is_file($path) ? $path : null;
    }

    private function tryMysqldump(string $filepath): bool
    {
        $cfg = require CONFIG_PATH . '/database.php';
        $mysqldump = $this->findMysqldumpBinary();
        if (!$mysqldump) {
            return false;
        }

        $password = $cfg['password'] !== '' ? '-p' . escapeshellarg($cfg['password']) : '';
        $command = sprintf(
            '%s -h%s -P%d -u%s %s %s > %s 2>&1',
            escapeshellarg($mysqldump),
            escapeshellarg($cfg['host']),
            (int) $cfg['port'],
            escapeshellarg($cfg['username']),
            $password,
            escapeshellarg($cfg['database']),
            escapeshellarg($filepath)
        );

        exec($command, $output, $code);

        return $code === 0 && is_file($filepath) && filesize($filepath) > 0;
    }

    private function findMysqldumpBinary(): ?string
    {
        $candidates = [
            'C:\\xampp\\mysql\\bin\\mysqldump.exe',
            'mysqldump',
        ];

        foreach ($candidates as $bin) {
            if ($bin === 'mysqldump') {
                exec('where mysqldump 2>NUL', $out, $code);
                if ($code === 0 && !empty($out[0])) {
                    return trim($out[0]);
                }
            } elseif (is_file($bin)) {
                return $bin;
            }
        }

        return null;
    }

    private function exportViaPhp(string $filepath): void
    {
        $db = Database::getInstance();
        $pdo = $db->pdo();

        $sql = "-- CMS Portal Backup\n";
        $sql .= '-- Generated: ' . date('Y-m-d H:i:s') . "\n\n";
        $sql .= "SET NAMES utf8mb4;\nSET FOREIGN_KEY_CHECKS=0;\n\n";

        $tables = $pdo->query('SHOW TABLES')->fetchAll(\PDO::FETCH_COLUMN);

        foreach ($tables as $table) {
            $create = $pdo->query("SHOW CREATE TABLE `{$table}`")->fetch();
            $sql .= "DROP TABLE IF EXISTS `{$table}`;\n";
            $sql .= ($create['Create Table'] ?? '') . ";\n\n";

            $rows = $pdo->query("SELECT * FROM `{$table}`")->fetchAll(\PDO::FETCH_ASSOC);
            if (empty($rows)) {
                continue;
            }

            $columns = array_keys($rows[0]);
            $colList = implode(', ', array_map(fn ($c) => "`{$c}`", $columns));

            foreach ($rows as $row) {
                $values = array_map(function ($val) use ($pdo) {
                    if ($val === null) {
                        return 'NULL';
                    }
                    return $pdo->quote((string) $val);
                }, array_values($row));

                $sql .= "INSERT INTO `{$table}` ({$colList}) VALUES (" . implode(', ', $values) . ");\n";
            }
            $sql .= "\n";
        }

        $sql .= "SET FOREIGN_KEY_CHECKS=1;\n";

        if (file_put_contents($filepath, $sql) === false) {
            throw new \RuntimeException('Could not write backup file.');
        }
    }

    private function splitSqlStatements(string $sql): array
    {
        return preg_split('/;\s*\n/', $sql) ?: [];
    }
}
