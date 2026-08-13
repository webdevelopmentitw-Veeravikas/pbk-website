<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Base controller with view rendering and JSON helpers.
 */
abstract class Controller
{
    protected Request $request;

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    protected function view(string $path, array $data = [], ?string $layout = null): void
    {
        echo View::render($path, $data, $layout);
    }

    protected function json(mixed $data, int $status = 200): void
    {
        Response::json($data, $status);
    }

    protected function redirect(string $url): void
    {
        Response::redirect($url);
    }

    protected function back(): void
    {
        $ref = $_SERVER['HTTP_REFERER'] ?? url('/');
        Response::redirect($ref);
    }

    protected function flash(string $type, string $message): void
    {
        Session::flash('alert', ['type' => $type, 'message' => $message]);
    }

    protected function validate(array $data, array $rules): array
    {
        $validator = new Validator($data, $rules);
        if (!$validator->passes()) {
            if ($this->request->isAjax()) {
                $this->json(['success' => false, 'errors' => $validator->errors()], 422);
            }
            Session::flash('errors', $validator->errors());
            Session::flash('old', $data);
            $this->back();
        }
        return $validator->validated();
    }
}
