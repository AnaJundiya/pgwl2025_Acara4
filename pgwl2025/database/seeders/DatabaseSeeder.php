<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Anajune',
            'email' => 'anajundiyamuthiahamzah@mail.ugm.ac.id',
            'password' => bcrypt('admin123php'),
        ]);
        User::factory()->create([
            'name' => 'Jundiya',
            'email' => 'jundyaana@gmail.com',
            'password' => bcrypt('user123'),
        ]);
    }
}
