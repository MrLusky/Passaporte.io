<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        $events = auth()->user()
            ->events()
            ->latest()
            ->paginate(10);

        return view('events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:20'],
            'date_time' => ['required', 'date', 'after:now'],
            'location' => ['required', 'max:255'],
            'capacity' => ['required', 'integer', 'min:1'],
            'category_id' => ['required', 'exists:categories,id'],

            'banner' => [
                'required',
                'image',
                'max:2048',
            ],
        ]);

        $bannerPath = $request
            ->file('banner')
            ->store('events', 'public');

        auth()->user()->events()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date_time' => $validated['date_time'],
            'location' => $validated['location'],
            'capacity' => $validated['capacity'],
            'category_id' => $validated['category_id'],
            'banner_path' => $bannerPath,
        ]);

        return redirect()
            ->route('events.index')
            ->with('success', 'Evento criado com sucesso.');
    }

    public function edit(Event $event)
    {
        abort_if($event->user_id !== auth()->id(), 403);

        $categories = Category::orderBy('name')->get();

        return view('events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event)
    {
        abort_if($event->user_id !== auth()->id(), 403);

        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'description' => ['required', 'min:20'],
            'date_time' => ['required', 'date', 'after:now'],
            'location' => ['required', 'max:255'],
            'capacity' => ['required', 'integer', 'min:1'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $event->update($validated);

        return redirect()
            ->route('events.index')
            ->with('success', 'Evento atualizado com sucesso.');
    }

    public function destroy(Event $event)
    {
        abort_if($event->user_id !== auth()->id(), 403);

        $event->delete();

        return redirect()
            ->route('events.index')
            ->with('success', 'Evento removido com sucesso.');
    }

    public function checkinForm()
    {
        return view('events.checkin');
    }

    public function checkin(Request $request)
    {
        $request->validate([
            'ticket_code' => ['required'],
        ]);

        $registration = DB::table('event_user')
            ->where(
                'ticket_code',
                $request->ticket_code
            )
            ->first();

        if (! $registration) {

            return back()->with(
                'error',
                'Ingresso não encontrado.'
            );
        }

        if ($registration->status === 'used') {

            return back()->with(
                'error',
                'Ingresso já utilizado.'
            );
        }

        DB::table('event_user')
            ->where('ticket_code', $request->ticket_code)
            ->update([
                'status' => 'used',
            ]);

        return back()->with(
            'success',
            'Check-in realizado com sucesso.'
        );
    }
}
