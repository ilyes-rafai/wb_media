<?php

namespace Database\Seeders;

use App\Models\Trick;
use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrickSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Assuming you already have the topics fetched
        $html = Topic::where('name', 'HTML5')->first();
        $css = Topic::where('name', 'CSS3')->first();
        $tailwindcss = Topic::where('name', 'Tailwindcss')->first();
        $js = Topic::where('name', 'Javascript')->first();
        $laravel = Topic::where('name', 'Laravel')->first();
        $databases = Topic::where('name', 'Databases')->first();
        $react = Topic::where('name', 'React')->first();
        $ui = Topic::where('name', 'UI Design')->first();
        $php = Topic::where('name', 'PHP')->first();
        $voyager = Topic::where('name', 'Laravel Voyager')->first();
        $vscode = Topic::where('name', 'VS Code')->first();
        $mysql = Topic::where('name', 'MySQL')->first();
        $xampp = Topic::where('name', 'XAMPP')->first();
        $terminal = Topic::where('name', 'TERMINAL')->first();



        $trick1 = Trick::create([
            'user_id' => 1,
            'title' => 'Creating a responsive navbar pure HTML5, CSS3 et JS',
        ]);
        $trick1->topics()->attach([$html->id, $css->id, $js->id, $vscode->id]);

        $trick2 = Trick::create([
            'user_id' => 1,
            'title' => 'Setup Laravel Voyager',
        ]);
        $trick2->topics()->attach([$php->id, $laravel->id, $voyager->id, $mysql->id, $databases->id, $vscode->id, $xampp->id, $terminal->id]);

        $trick3 = Trick::create([
            'user_id' => 1,
            'title' => 'Vanilla JavaScript TODO Application with LocalStorage',
        ]);
        $trick3->topics()->attach([$html->id, $css->id, $js->id, $vscode->id]);

        $trick3 = Trick::create([
            'user_id' => 1,
            'title' => 'Vanilla Javascript Tic Tac Toe Game',
        ]);
        $trick3->topics()->attach([$html->id, $css->id, $js->id, $vscode->id]);






        function createTrickWithTopics($userId, $title, $premium, $topicIds)
        {
            // Create the trick
            $trick = Trick::create([
                'user_id' => $userId,
                'title' => $title,
                'premium' => $premium,
            ]);

            // Attach topics to the trick
            $trick->topics()->attach($topicIds);

            return $trick;
        }

        // Creating tricks with the respective topics
        createTrickWithTopics(1, 'Simple CRUD operations with Laravel', 1, [$php->id, $laravel->id, $mysql->id, $databases->id]);
        createTrickWithTopics(1, 'Building a dynamic form with React and Laravel API', 1, [$react->id, $laravel->id, $databases->id]);
        createTrickWithTopics(4, 'Creating a Portfolio Website with TailwindCSS and React', 1, [$react->id, $ui->id, $tailwindcss->id]);
        createTrickWithTopics(1, 'Real-time Chat Application using WebSockets in Laravel', 1, [$laravel->id, $databases->id]);
        createTrickWithTopics(1, 'Building an E-commerce Website with Laravel and React', 1, [$laravel->id, $react->id, $databases->id, $ui->id]);
        createTrickWithTopics(1, 'Responsive Blog Website with HTML5, CSS3, and Javascript', 1, [$html->id, $css->id, $js->id]);
    }
}
