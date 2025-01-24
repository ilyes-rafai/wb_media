<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Assuming you already have the topics fetched
        $html = Topic::where('name', 'HTML5')->first();
        $css = Topic::where('name', 'CSS3')->first();
        $js = Topic::where('name', 'Javascript')->first();
        $laravel = Topic::where('name', 'Laravel')->first();
        $databases = Topic::where('name', 'Databases')->first();
        $react = Topic::where('name', 'React')->first();
        $ui = Topic::where('name', 'UI Design')->first();

        $project1 = Project::create([
            'user_id' => 1,
            'title' => 'Creating a responsive navbar pure HTML5, CSS3 et JS',
        ]);
        $project1->topics()->attach([$html->id, $css->id, $js->id]);

        $project2 = Project::create([
            'user_id' => 1,
            'title' => 'Simple CRUD operations with Laravel',
            'premium' => 1,
        ]);
        $project2->topics()->attach([$laravel->id, $databases->id]);

        $project3 = Project::create([
            'user_id' => 1,
            'title' => 'Building a dynamic form with React and Laravel API',
            'premium' => 1,
        ]);
        $project3->topics()->attach([$react->id, $laravel->id, $databases->id]);

        $project4 = Project::create([
            'user_id' => 4,
            'title' => 'Creating a Portfolio Website with TailwindCSS and React',
        ]);
        $project4->topics()->attach([$react->id, $ui->id]);

        $project5 = Project::create([
            'user_id' => 1,
            'title' => 'Real-time Chat Application using WebSockets in Laravel',
            'premium' => 1,
        ]);
        $project5->topics()->attach([$laravel->id, $databases->id]);

        $project6 = Project::create([
            'user_id' => 1,
            'title' => 'Building an E-commerce Website with Laravel and React',
            'premium' => 1,
        ]);
        $project6->topics()->attach([$laravel->id, $react->id, $databases->id, $ui->id]);

        $project7 = Project::create([
            'user_id' => 1,
            'title' => 'Responsive Blog Website with HTML5, CSS3, and Javascript',
        ]);
        $project7->topics()->attach([$html->id, $css->id, $js->id]);
    }
}
