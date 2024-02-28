<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'email' => 'test@example.com',
        ]);

        foreach ($users as $user) {
            $events = \App\Models\Event::factory(1)->create(['created_by' => $user->id]);

            foreach ($events as $event) {
                \App\Models\Registration::factory(1)->create([
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                ]);
            }
        }
    }
}

