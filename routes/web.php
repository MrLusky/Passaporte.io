<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventParticipantController;
use App\Http\Controllers\OrganizerDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicEventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantDashboardController;
use App\Models\Event;

Route::get('/', function () {

    $events = Event::latest()
        ->take(6)
        ->get();

    return view('welcome', compact('events'));

});

Route::get('/events/{event}', [PublicEventController::class, 'show'])
    ->name('events.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/organizer-test', function () {
    return 'Organizador OK';
})->middleware(['auth', 'organizer']);

Route::get('/participant-test', function () {
    return 'Participante OK';
})->middleware(['auth', 'participant']);

Route::middleware(['auth', 'organizer'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/events', [EventController::class, 'index'])
            ->name('events.index');

        Route::get('/events/create', [EventController::class, 'create'])
            ->name('events.create');

        Route::post('/events', [EventController::class, 'store'])
            ->name('events.store');

        Route::get('/events/{event}/edit', [EventController::class, 'edit'])
            ->name('events.edit');

        Route::put('/events/{event}', [EventController::class, 'update'])
            ->name('events.update');

        Route::delete('/events/{event}', [EventController::class, 'destroy'])
            ->name('events.destroy');

        Route::get('/checkin', [EventController::class, 'checkinForm'])
            ->name('events.checkin.form');

        Route::post('/checkin', [EventController::class, 'checkin'])
            ->name('events.checkin');

        Route::get('/dashboard', [OrganizerDashboardController::class, 'index'])
            ->name('organizer.dashboard');
    });

Route::middleware(['auth', 'participant'])
    ->prefix('participant')
    ->group(function () {

        Route::get('/events', [EventParticipantController::class, 'index'])
            ->name('participant.events.index');

        Route::post('/events/{event}/subscribe', [EventParticipantController::class, 'subscribe'])
            ->name('participant.events.subscribe');

        Route::get('/tickets', [EventParticipantController::class, 'tickets'])
            ->name('participant.tickets.index');

        Route::get('/tickets/{event}', [EventParticipantController::class, 'showTicket'])
            ->name('participant.tickets.show');

        Route::get('/dashboard', [ParticipantDashboardController::class, 'index'])
            ->name('participant.dashboard');
    });

require __DIR__.'/auth.php';
