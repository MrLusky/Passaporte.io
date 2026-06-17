<?php

namespace App\Http\Controllers;

class ParticipantDashboardController extends Controller
{
    public function index()
    {
        $events = auth()->user()
            ->subscribedEvents()
            ->orderBy('date_time')
            ->get();

        $totalEvents = $events->count();

        $nextEvent = $events
            ->where('date_time', '>', now())
            ->first();

        return view(
            'dashboard.participant',
            compact(
                'events',
                'totalEvents',
                'nextEvent'
            )
        );
    }
}