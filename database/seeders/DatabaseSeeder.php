<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Seeder centralizado
 */
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
