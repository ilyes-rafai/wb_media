<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'member']);
        Role::create(['name' => 'subscriber']);
        Role::create(['name' => 'mentor']);


        // Roles
        $admin = Role::where('name', 'admin')->first();
        $member = Role::where('name', 'member')->first();
        $subscriber = Role::where('name', 'subscriber')->first();
        $mentor = Role::where('name', 'mentor')->first();

        // Users
        $wemilia = User::where('username', 'wemilia')->first();
        $ilyes = User::where('username', 'ilyes_rafai')->first();
        $imad = User::where('username', 'imad_rafai')->first();
        $moussaoui = User::where('username', 'purple_orca')->first();
        $memberUser = User::where('username', 'member')->first();
        $subscriberUser = User::where('username', 'subscriber')->first();

        // Attach users to roles
        $wemilia->roles()->attach($admin);
        $wemilia->roles()->attach($mentor);

        $imad->roles()->attach($admin);
        $imad->roles()->attach($mentor);

        $ilyes->roles()->attach($mentor);

        $moussaoui->roles()->attach($mentor);

        $memberUser->roles()->attach($member);

        $subscriberUser->roles()->attach($subscriber);
    }
}
