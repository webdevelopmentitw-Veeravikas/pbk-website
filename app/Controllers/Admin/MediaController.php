<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Upload;
use App\Models\ActivityLog;
use App\Models\Media;

class MediaController extends BaseAdminController
{
    public function index(): void
    {
        $model = new Media();
        $folder = $this->request->get('folder');
        $q = trim((string) $this->request->get('q', ''));

        if ($q !== '') {
            $items = $model->search($q, $folder ?: null);
        } elseif ($folder) {
            $items = $model->where('folder = :folder', ['folder' => $folder], 'created_at DESC');
        } else {
            $items = $model->all('created_at DESC');
        }

        $this->view('admin.media.index', [
            'items'   => $items,
            'folders' => $model->folders(),
            'folder'  => $folder,
            'q'       => $q,
        ], 'admin.layouts.app');
    }

    public function upload(): void
    {
        $folder = $this->sanitizeFolder((string) $this->request->post('folder', 'root'));
        $files = $this->request->files('files');

        if (empty($files)) {
            $this->json(['success' => false, 'message' => 'No files uploaded.'], 422);
        }

        $upload = new Upload();
        $model = new Media();
        $stored = [];

        try {
            foreach ($files as $file) {
                $result = $upload->store($file, 'media/' . $folder);
                if (!$result) {
                    continue;
                }

                $info = @getimagesize(PUBLIC_PATH . '/' . ltrim($result['path'], '/'));

                $id = $model->create([
                    'user_id'       => Auth::id(),
                    'folder'        => $folder,
                    'filename'      => basename($result['path']),
                    'original_name' => $result['name'],
                    'path'          => $result['path'],
                    'thumb_path'    => $result['thumb'] ?? null,
                    'webp_path'     => $result['webp'] ?? null,
                    'mime_type'     => $result['mime'],
                    'size'          => $result['size'],
                    'width'         => $info[0] ?? null,
                    'height'        => $info[1] ?? null,
                    'alt_text'      => pathinfo($result['name'], PATHINFO_FILENAME),
                ]);

                $stored[] = array_merge($result, ['id' => $id]);
            }
        } catch (\Throwable $e) {
            $this->json(['success' => false, 'message' => $e->getMessage()], 422);
        }

        ActivityLog::record(Auth::id(), 'media_upload', 'Uploaded ' . count($stored) . ' file(s) to ' . $folder);
        $this->json(['success' => true, 'message' => count($stored) . ' file(s) uploaded.', 'data' => $stored]);
    }

    public function rename(int $id): void
    {
        $model = new Media();
        $media = $model->find($id);
        if (!$media) {
            $this->json(['success' => false, 'message' => 'File not found.'], 404);
        }

        $data = $this->validate($this->request->all(), [
            'original_name' => 'required|max:255',
        ]);

        $model->update($id, [
            'original_name' => $data['original_name'],
            'alt_text'      => $this->request->post('alt_text') ?: $data['original_name'],
        ]);

        ActivityLog::record(Auth::id(), 'media_rename', "Renamed media #{$id}");
        $this->json(['success' => true, 'message' => 'File renamed.', 'data' => $model->find($id)]);
    }

    public function destroy(int $id): void
    {
        $model = new Media();
        $media = $model->find($id);
        if (!$media) {
            $this->notFound();
        }

        $upload = new Upload();
        $upload->delete($media['path'] ?? null);
        $upload->delete($media['thumb_path'] ?? null);
        $upload->delete($media['webp_path'] ?? null);
        $model->delete($id);

        ActivityLog::record(Auth::id(), 'media_delete', "Deleted media #{$id}: {$media['original_name']}");
        $this->respondDestroy('File deleted.', url('/admin/media'));
    }

    public function folders(): void
    {
        if ($this->request->isPost()) {
            $name = $this->sanitizeFolder((string) $this->request->post('name', ''));
            if ($name === '' || $name === 'root') {
                $this->json(['success' => false, 'message' => 'Invalid folder name.'], 422);
            }

            $dir = UPLOAD_PATH . '/media/' . $name;
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            ActivityLog::record(Auth::id(), 'media_folder_create', "Created media folder: {$name}");
            $this->json(['success' => true, 'message' => 'Folder created.', 'data' => ['name' => $name]]);
        }

        $this->json(['success' => true, 'data' => (new Media())->folders()]);
    }

    private function sanitizeFolder(string $folder): string
    {
        $folder = trim($folder, '/');
        $folder = preg_replace('/[^a-zA-Z0-9_\-\/]/', '', $folder) ?? 'root';
        return $folder !== '' ? $folder : 'root';
    }
}
