<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;

class EventParticipantController extends Controller
{
    public function index()
    {
        $events = Event::with('category')
            ->withCount('participants')
            ->latest()
            ->paginate(10);

        return view('participant.events.index', compact('events'));
    }

    public function subscribe(Event $event)
    {
        $alreadySubscribed = auth()
            ->user()
            ->subscribedEvents()
            ->where('event_id', $event->id)
            ->exists();

        if ($alreadySubscribed) {
            return back()->with(
                'error',
                'Você já está inscrito neste evento.'
            );
        }

        if (
            $event->participants()->count()
            >=
            $event->capacity
        ) {
            return back()->with(
                'error',
                'Evento lotado.'
            );
        }

        auth()->user()
            ->subscribedEvents()
            ->attach($event->id, [
                'ticket_code' => strtoupper(Str::random(10)),
                'status' => 'confirmed',
            ]);

        return back()->with(
            'success',
            'Inscrição realizada com sucesso.'
        );
    }

    public function tickets()
    {
        $events = auth()->user()
            ->subscribedEvents()
            ->withPivot([
                'ticket_code',
                'status',
            ])
            ->get();

        return view(
            'participant.tickets.index',
            compact('events')
        );
    }

    public function showTicket(Event $event)
    {
        $ticket = auth()
            ->user()
            ->subscribedEvents()
            ->where('event_id', $event->id)
            ->firstOrFail();

        return view(
            'participant.tickets.show',
            compact('ticket')
        );
    }

    public function unsubscribe(Event $event)
    {
        $isSubscribed = auth()
            ->user()
            ->subscribedEvents()
            ->where('event_id', $event->id)
            ->exists();

        if (! $isSubscribed) {
            return back()->with('error', 'Você não está inscrito neste evento.');
        }

        auth()->user()
            ->subscribedEvents()
            ->detach($event->id);

        return back()->with('success', 'Inscrição cancelada com sucesso.');
    }
}
