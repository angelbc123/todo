<?php

namespace Database\Seeders;

use App\Models\TodoStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

         foreach (['todo', 'done'] as $status) {
             TodoStatus::create([
                 'name' => $status
             ]);
         }

    }
}
