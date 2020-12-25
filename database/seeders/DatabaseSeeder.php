<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\Event;
use App\Models\Inscription;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE users RESTART IDENTITY CASCADE");
        DB::statement("TRUNCATE TABLE clubs RESTART IDENTITY CASCADE");
        DB::statement("TRUNCATE TABLE inscriptions RESTART IDENTITY CASCADE");
        DB::statement("TRUNCATE TABLE events RESTART IDENTITY CASCADE");
       User::truncate();
       Club::truncate();
       Inscription::truncate();
       Event::truncate();

       $usersQuantity = 1;
       $clubQuantity = 20;
       $inscriptionQuantity = 50;
       $eventQuantity = 10;

        User::factory()->count($usersQuantity)->create();
        Club::factory()->count($clubQuantity)->create();
        // Inscription::factory()->count($inscriptionQuantity)->create();
        Event::factory()->count($eventQuantity)->create();
    }
}
