<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Models\Newsletter;

class NewsletterController extends BaseFrontendController
{
    public function subscribe(): void
    {
        $data = $this->validate($this->request->all(), [
            'email' => 'required|email|max:255',
        ]);

        (new Newsletter())->subscribe(
            $data['email'],
            $this->request->post('name') ?: null
        );

        if ($this->request->isAjax()) {
            $this->json([
                'success' => true,
                'message' => 'Thank you for subscribing!',
            ]);
            return;
        }

        $this->flash('success', 'Thank you for subscribing!');
        $this->back();
    }
}
