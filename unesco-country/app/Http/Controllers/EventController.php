<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $query = Event::latest('event_date');

        // Filter by event type
        if ($type = request()->query('type')) {
            if (in_array($type, ['conference', 'workshop', 'webinar', 'meeting'])) {
                $query->where('event_type', $type);
            }
        }

        $events = $query->paginate(10)->withQueryString();

        return view('events.index', compact('events'));
    }

    public function show(string $slug): View
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        // Fetch other events as related
        $relatedEvents = Event::where('id', '!=', $event->id)
            ->latest('event_date')
            ->limit(3)
            ->get();

        return view('events.show', compact('event', 'relatedEvents'));
    }
}
