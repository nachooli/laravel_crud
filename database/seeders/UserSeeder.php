<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Seeder para User
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(5)->create();
    }
}
