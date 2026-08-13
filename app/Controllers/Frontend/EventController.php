<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Models\Event;

class EventController extends BaseFrontendController
{
    public function index(): void
    {
        $page = max(1, (int) $this->request->get('page', 1));
        $events = (new Event())->paginate(
            $page,
            12,
            'status = 1',
            [],
            'event_date ASC, event_time ASC, id ASC'
        );

        $this->frontendView('frontend.events.index', [
            'events'  => $events,
            'baseUrl' => url('/events'),
        ]);
    }

    public function show(string $slug): void
    {
        $event = (new Event())->findBySlug($slug);
        if (!$event || (int) ($event['status'] ?? 0) !== 1) {
            $this->notFound('Event not found.');
        }

        $this->frontendView('frontend.events.show', [
            'event' => $event,
        ]);
    }
}
