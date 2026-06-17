<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventParticipantController;
use App\Http\Controllers\OrganizerDashboardController;
use App\Http\Controllers\ParticipantDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicEventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicEventController::class, 'index'])
    ->name('home');

Route::get('/events/{event}', [PublicEventController::class, 'show'])
    ->name('events.show');

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'organizer') {
        return redirect()->route('organizer.dashboard');
    }

    return redirect()->route('participant.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::middleware(['auth', 'organizer'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [OrganizerDashboardController::class, 'index'])
            ->name('organizer.dashboard');

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
    });

Route::middleware(['auth', 'participant'])
    ->prefix('participant')
    ->group(function () {
        Route::get('/dashboard', [ParticipantDashboardController::class, 'index'])
            ->name('participant.dashboard');

        Route::get('/events', [EventParticipantController::class, 'index'])
            ->name('participant.events.index');

        Route::post('/events/{event}/subscribe', [EventParticipantController::class, 'subscribe'])
            ->name('participant.events.subscribe');

        Route::get('/tickets', [EventParticipantController::class, 'tickets'])
            ->name('participant.tickets.index');

        Route::get('/tickets/{event}', [EventParticipantController::class, 'showTicket'])
            ->name('participant.tickets.show');

        Route::delete('/events/{event}/unsubscribe', [EventParticipantController::class, 'unsubscribe'])
            ->name('participant.events.unsubscribe');
    });

require __DIR__.'/auth.php';