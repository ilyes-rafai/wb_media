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


        User::create([
            'fullname' => 'Webily Media',
            'username' => 'webilymedia',
            'email' => 'webily@wb.com',
            'password' => bcrypt('password'),
            'avatar' => "img/users/webilymedia-1/avatar_678d6f10370640.39602155.png",
        ]);

        User::create([
            'fullname' => 'Imad Rafai',
            'username' => 'imad_rafai',
            'email' => 'imad@wb.com',
            'password' => bcrypt('password'),
            'verified' => 1,
            'avatar' => 'img/users/imad_rafai-2/avatar_678d6f773c3f72.18160871.jpg',
        ]);

        User::create([
            'fullname' => 'Ilyes Rafai',
            'username' => 'ilyes_rafai',
            'email' => 'ilyes@wb.com',
            'password' => bcrypt('password'),
            'verified' => 1,
            'avatar' => 'img/users/ilyes_rafai-3/avatar_678edc6e5ec1d8.91669062.jpeg',
        ]);

        User::create([
            'fullname' => 'Mohamed Moussaoui',
            'username' => 'purple_orca',
            'email' => 'purple_orca@wb.com',
            'password' => bcrypt('password'),
            'verified' => 1,
            'avatar' => 'img/users/purple_orca-4/avatar_678eac8f3124b3.52891265.jpg',
        ]);

        User::create([
            'fullname' => 'member',
            'username' => 'member',
            'email' => 'member@wb.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'fullname' => 'subscriber',
            'username' => 'subscriber',
            'email' => 'subscriber@wb.com',
            'gender' => true,
            'password' => bcrypt('password'),
        ]);

        $this->call(RoleSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(InstructionSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(PostSeeder::class);
    }
}
