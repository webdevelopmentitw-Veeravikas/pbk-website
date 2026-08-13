<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Model;

abstract class BaseAdminController extends Controller
{
    protected function uniqueSlug(Model $model, string $baseSlug, ?int $exceptId = null): string
    {
        $slug = $baseSlug;
        $counter = 2;

        while (true) {
            $existing = $model->findBy('slug', $slug);
            if (!$existing || ($exceptId !== null && (int) $existing['id'] === $exceptId)) {
                return $slug;
            }
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }
    }

    protected function respondDestroy(string $message, string $redirectUrl): void
    {
        if ($this->request->isAjax()) {
            $this->json(['success' => true, 'message' => $message]);
            return;
        }

        $this->flash('success', $message);
        $this->redirect($redirectUrl);
    }

    protected function notFound(string $message = 'Record not found.'): void
    {
        if ($this->request->isAjax()) {
            $this->json(['success' => false, 'message' => $message], 404);
            return;
        }

        abort(404, $message);
    }

    protected function boolVal(mixed $value): int
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
    }
}
