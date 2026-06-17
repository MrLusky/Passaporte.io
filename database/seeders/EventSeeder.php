<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Laravel Summit 2026',
            'description' => 'Evento voltado para desenvolvimento web com Laravel.',
            'date_time' => now()->addDays(15),
            'location' => 'São Paulo',
            'capacity' => 150,
            'banner_path' => 'public/images/default.jpg',
        ]);

        Event::create([
            'user_id' => 1,
            'category_id' => 5,
            'title' => 'Campeonato Gamer',
            'description' => 'Torneio presencial com diversas modalidades.',
            'date_time' => now()->addDays(30),
            'location' => 'Campinas',
            'capacity' => 200,
            'banner_path' => 'public/images/default.jpg',
        ]);
    }
}