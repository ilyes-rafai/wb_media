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
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(TrickSeeder::class);
        $this->call(InstructionSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(PostSeeder::class);
    }
}
