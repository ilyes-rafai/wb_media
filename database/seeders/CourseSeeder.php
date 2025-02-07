<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $html = Topic::where('name', 'HTML5')->first();
        $css = Topic::where('name', 'CSS3')->first();
        $js = Topic::where('name', 'Javascript')->first();
        $laravel = Topic::where('name', 'Laravel')->first();
        $databases = Topic::where('name', 'Databases')->first();
        $react = Topic::where('name', 'React')->first();
        $ui = Topic::where('name', 'UI Design')->first();
        $tailwindcss = Topic::where('name', 'Tailwindcss')->first();

        $courses = [
            [
                'title' => 'Building Modern Web Pages',
                'description' => 'Learn how to create responsive and modern web pages using HTML5, CSS3, and Javascript.',
                'topics' => [$html->id, $css->id, $js->id],
            ],
            [
                'title' => 'Mastering React for Frontend Development',
                'description' => 'Dive into React fundamentals and build powerful single-page applications.',
                'topics' => [$react->id, $js->id, $css->id],
            ],
            [
                'title' => 'Full-Stack Web Development with Laravel',
                'description' => 'A comprehensive guide to building full-stack applications using Laravel and React.',
                'topics' => [$laravel->id, $react->id, $databases->id],
            ],
            [
                'title' => 'UI/UX Design with TailwindCSS',
                'description' => 'Create beautiful and intuitive user interfaces using TailwindCSS.',
                'topics' => [$ui->id, $tailwindcss->id],
            ],
            [
                'title' => 'Database Design and Management',
                'description' => 'Learn the principles of database design, normalization, and query optimization.',
                'topics' => [$databases->id],
            ],
            [
                'title' => 'Advanced JavaScript Techniques',
                'description' => 'Level up your JavaScript skills with ES6+ features and advanced concepts.',
                'topics' => [$js->id],
            ],
            [
                'title' => 'Responsive Design with TailwindCSS',
                'description' => 'Master responsive design principles using the TailwindCSS framework.',
                'topics' => [$css->id, $tailwindcss->id],
            ],
            [
                'title' => 'Building a CMS with Laravel',
                'description' => 'Step-by-step guide to creating a content management system using Laravel.',
                'topics' => [$laravel->id, $databases->id],
            ],
            [
                'title' => 'Frontend Framework Showdown: React vs. Vue',
                'description' => 'Explore the similarities and differences between React and Vue.js.',
                'topics' => [$react->id],
            ],
            [
                'title' => 'JavaScript and the DOM',
                'description' => 'Understand how JavaScript interacts with the DOM to create dynamic web pages.',
                'topics' => [$js->id, $html->id],
            ],
        ];

        foreach ($courses as $course) {
            $newCourse = Course::create([
                'user_id' => rand(1, 4),
                'title' => $course['title'],
                'description' => $course['description'],
                'premium' => 1,
            ]);

            $newCourse->topics()->attach($course['topics']);
        }
    }
}
