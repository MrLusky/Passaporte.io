<?php

namespace App\Http\Controllers;

class OrganizerDashboardController extends Controller
{
    public function index()
    {
        $events = auth()->user()
            ->events()
            ->withCount('participants')
            ->get();

        $totalEvents = $events->count();

        $totalParticipants = $events->sum(
            'participants_count'
        );

        $remainingSpots = $events->sum(function ($event) {
            return $event->capacity
                - $event->participants_count;
        });

        return view(
            'dashboard.organizer',
            compact(
                'events',
                'totalEvents',
                'totalParticipants',
                'remainingSpots'
            )
        );
    }
}