<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class PublicEventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::with([
            'organizer',
            'category'
        ])
        ->when(
            $request->category,
            fn ($query) =>
                $query->where(
                    'category_id',
                    $request->category
                )
        )
        ->latest()
        ->paginate(12);

        $categories = Category::orderBy('name')->get();

        return view(
            'public.index',
            compact('events', 'categories')
        );
    }

    public function show(Event $event)
    {
        $event->load([
            'organizer',
            'category'
        ]);

        return view(
            'public.show',
            compact('event')
        );
    }
}