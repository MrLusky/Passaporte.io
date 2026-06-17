<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Organizador Teste',
            'email' => 'organizer@passaporte.com',
            'password' => '12345678',
            'role' => 'organizer'
        ]);

        User::create([
            'name' => 'Participante Teste',
            'email' => 'participant@passaporte.com',
            'password' => '12345678',
            'role' => 'participant'
        ]);
    }
}