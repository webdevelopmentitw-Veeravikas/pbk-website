<?php

declare(strict_types=1);

/**
 * One-click installer: creates DB schema + seeds sample data.
 * Delete this file after installation in production.
 */

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/constants.php';

$cfg = require CONFIG_PATH . '/database.php';
$app = require CONFIG_PATH . '/app.php';
$baseUrl = rtrim((string) ($app['url'] ?? ''), '/');

$message = '';
$error = '';
$alreadyInstalled = false;

try {
    $dsnDb = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=%s',
        $cfg['host'],
        $cfg['port'],
        $cfg['database'],
        $cfg['charset']
    );
    $check = new PDO($dsnDb, $cfg['username'], $cfg['password'], $cfg['options']);
    $tables = $check->query("SHOW TABLES LIKE 'users'")->fetchAll();
    $userCount = 0;
    if ($tables) {
        $userCount = (int) $check->query('SELECT COUNT(*) FROM users')->fetchColumn();
        $alreadyInstalled = $userCount > 0;
    }
} catch (Throwable) {
    $alreadyInstalled = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $dsn = sprintf('mysql:host=%s;port=%d;charset=%s', $cfg['host'], $cfg['port'], $cfg['charset']);
        $pdo = new PDO($dsn, $cfg['username'], $cfg['password'], $cfg['options']);

        $sql = file_get_contents(__DIR__ . '/database/schema.sql');
        if ($sql === false || $sql === '') {
            throw new RuntimeException('Could not read database/schema.sql');
        }

        // Split and run statements (PDO::exec can choke on multi-statement + USE)
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        foreach (splitSqlStatements($sql) as $statement) {
            $trimmed = trim($statement);
            if ($trimmed === '' || str_starts_with($trimmed, '--')) {
                continue;
            }
            $pdo->exec($trimmed);
        }

        // Seed in-process (avoid exec() under Apache on Windows)
        ob_start();
        require __DIR__ . '/database/seed.php';
        ob_end_clean();

        $message = 'Installation complete. Login: admin@cms.local / Admin@123 — Delete install.php now.';
        $alreadyInstalled = true;
    } catch (Throwable $e) {
        $error = $e->getMessage();
    }
}

/**
 * @return list<string>
 */
function splitSqlStatements(string $sql): array
{
    $sql = preg_replace('/^--.*$/m', '', $sql) ?? $sql;
    $parts = preg_split('/;\s*[\r\n]+/', $sql) ?: [];
    return array_values(array_filter(array_map('trim', $parts)));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CMS Installer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width:560px">
  <div class="card shadow-sm">
    <div class="card-body p-4">
      <h1 class="h4 mb-3">CMS Portal Installer</h1>
      <p class="text-muted mb-3">Creates the <code><?= htmlspecialchars($cfg['database']) ?></code> database, tables, and seed data.</p>

      <?php if ($alreadyInstalled && !$error): ?>
        <div class="alert alert-success">
          Database is already installed and seeded. You can log in now.
        </div>
      <?php endif; ?>

      <?php if ($message): ?><div class="alert alert-success"><?= htmlspecialchars($message) ?></div><?php endif; ?>
      <?php if ($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>

      <div class="d-flex flex-wrap gap-2">
        <?php if (!$alreadyInstalled): ?>
          <form method="post" class="d-inline">
            <button class="btn btn-primary" type="submit">Install now</button>
          </form>
        <?php else: ?>
          <form method="post" class="d-inline" onsubmit="return confirm('This will wipe and reinstall the database. Continue?');">
            <button class="btn btn-outline-danger" type="submit">Reinstall (wipe data)</button>
          </form>
        <?php endif; ?>
        <a class="btn btn-outline-secondary" href="<?= htmlspecialchars($baseUrl) ?>/admin/login">Admin login</a>
        <a class="btn btn-outline-primary" href="<?= htmlspecialchars($baseUrl) ?>/">View site</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>
