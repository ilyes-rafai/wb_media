<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            'fullname' => 'Mohamed El Moussaoui',
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

        $names = [
            ['name' => 'Kacem Bensaadoun', 'gender' => false],
            ['name' => 'Zakaria Sghir', 'gender' => false],
            ['name' => 'Bouamama Abderahmane', 'gender' => false],
            ['name' => 'Haitam Maani', 'gender' => false],
            ['name' => 'Ayyadi Aymane', 'gender' => false],
            ['name' => 'Saad Ihedrane', 'gender' => false],
            ['name' => 'Oussama Grioui', 'gender' => false],
            ['name' => 'Yassamine Boukhana', 'gender' => true],
            ['name' => 'Khaoula Rezzouq', 'gender' => true],
            ['name' => 'Kaoutar Missaoui', 'gender' => true],
            ['name' => 'Massmoudi Yasmina', 'gender' => true],
            ['name' => 'Hayat Eltifouri', 'gender' => true],
            ['name' => 'Rihane Chebab', 'gender' => true],
            ['name' => 'Nassiri Wissal', 'gender' => true],
            ['name' => 'Leila Souiyeh', 'gender' => true],
        ];

        foreach ($names as $entry) {
            // Split the name into first and last name
            $nameParts = explode(' ', $entry['name']);

            // Create a username by lowercasing and replacing spaces with underscores
            $username = strtolower(implode('_', $nameParts));

            // Create an email by appending "@wb.com" to the username
            $email = $username . '@wb.com';

            // Create the user, including the gender field
            User::create([
                'fullname' => $entry['name'],
                'username' => $username,
                'email' => $email,
                'password' => bcrypt('password'), // You can change the password as needed
                'gender' => $entry['gender'],  // Include gender field
            ]);
        }
    }
}
