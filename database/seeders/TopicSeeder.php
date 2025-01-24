<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 'name' => 'HTML5',
        Topic::create([
            'user_id' => 1,
            'name' => 'HTML5',
            'description' => 'Web page structure',
            'svg' => 'img/topics/html5.png',
        ]);

        // 'name' => 'CSS3',
        Topic::create([
            'user_id' => 1,
            'name' => 'CSS3',
            'description' => 'Web page styling',
            'svg' => 'img/topics/css3.png',
        ]);

        // 'name' => 'Javascript',
        Topic::create([
            'user_id' => 1,
            'name' => 'Javascript',
            'description' => 'Interactive web features',
            'svg' => 'img/topics/js.png',
        ]);

        // 'name' => 'PHP',
        Topic::create([
            'user_id' => 1,
            'name' => 'PHP',
            'description' => 'Server-side scripting language',
            'svg' => 'img/topics/php.png',
        ]);

        // 'name' => 'Python',
        Topic::create([
            'user_id' => 1,
            'name' => 'Python',
            'description' => 'Versatile programming language',
            'svg' => 'img/topics/python.png',
        ]);

        // 'name' => 'Databases',
        Topic::create([
            'user_id' => 1,
            'name' => 'Databases',
            'description' => 'Organized data storage',
            'svg' => 'img/topics/database.png',
        ]);

        // 'name' => 'React',
        Topic::create([
            'user_id' => 1,
            'name' => 'React',
            'description' => 'JavaScript UI library',
            'svg' => 'img/topics/react.png',
        ]);

        // 'name' => 'Laravel',
        Topic::create([
            'user_id' => 1,
            'name' => 'Laravel',
            'description' => 'PHP web framework',
            'svg' => 'img/topics/laravel.png',
        ]);

        // 'name' => 'Bootstrap',
        Topic::create([
            'user_id' => 1,
            'name' => 'Bootstrap',
            'description' => 'Responsive CSS framework',
            'svg' => 'img/topics/bootstrap.png',
        ]);

        Topic::create([
            'user_id' => 1,
            'name' => 'Tailwindcss',
            'description' => 'A utility-first CSS framework',
            'svg' => 'img/topics/tailwindcss.png',
        ]);

        // 'name' => 'C Language',
        Topic::create([
            'user_id' => 1,
            'name' => 'C Language',
            'description' => 'Low-level programming',
            'svg' => 'img/topics/c.png',
        ]);

        // 'name' => 'Algorithms',
        Topic::create([
            'user_id' => 1,
            'name' => 'Algorithms',
            'description' => 'Problem-solving techniques',
            'svg' => 'img/topics/algo.png',
        ]);

        // 'name' => 'Sass',
        Topic::create([
            'user_id' => 1,
            'name' => 'Sass',
            'description' => 'CSS preprocessor',
            'svg' => 'img/topics/sass.png',
        ]);

        // 'name' => 'Windows',
        Topic::create([
            'user_id' => 1,
            'name' => 'Windows',
            'description' => 'Operating System',
            'svg' => 'img/topics/windows.png',
        ]);

        // 'name' => 'Linux',
        Topic::create([
            'user_id' => 1,
            'name' => 'Linux',
            'description' => 'Open Source System',
            'svg' => 'img/topics/linux.png',
        ]);

        // 'name' => 'Node-js',
        Topic::create([
            'user_id' => 1,
            'name' => 'Node-js',
            'description' => 'JavaScript backend runtime',
            'svg' => 'img/topics/node.png',
        ]);

        // 'name' => 'UI Design',
        Topic::create([
            'user_id' => 1,
            'name' => 'UI Design',
            'description' => 'User interface aesthetics',
            'svg' => 'img/topics/ui.png',
        ]);

        Topic::create([
            'user_id' => 1,
            'name' => 'Django',
            'description' => 'Python web framework',
            'svg' => 'img/topics/django.png',
        ]);

        Topic::create([
            'user_id' => 1,
            'name' => 'NEXT.js',
            'description' => 'React server rendering',
            'svg' => 'img/topics/next.png',
        ]);

        Topic::create([
            'user_id' => 1,
            'name' => 'C Sharp',
            'description' => 'Object-oriented language',
            'svg' => 'img/topics/csharp.png',
        ]);

        Topic::create([
            'user_id' => 1,
            'name' => 'Laravel Voyager',
            'description' => 'Admin panel builder',
            'svg' => 'img/topics/voyager.png',
        ]);

        Topic::create([
            'user_id' => 1,
            'name' => 'Laravel Livewire',
            'description' => 'Dynamic PHP components',
            'svg' => 'img/topics/livewire.png',
        ]);

        Topic::create([
            'user_id' => 1,
            'name' => 'VITE',
            'description' => 'Fast bundler tool',
            'svg' => 'img/topics/vite.png',
        ]);

        Topic::create([
            'user_id' => 1,
            'name' => 'Inertia.js',
            'description' => 'SPA without APIs',
            'svg' => 'img/topics/inertia.png',
        ]);
    }
}
