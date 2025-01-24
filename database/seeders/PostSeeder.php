<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'body' => 'Talk is cheap. Show me the code 😍. – Linus Torvalds',
            'user_id' => 1,
        ]);

        Post::create([
            'body' => 'Programs must be written for people to read, and only incidentally for machines to execute. – Harold Abelson',
            'user_id' => 2,
        ]);

        Post::create([
            'body' => 'Code is like humor. When you have to explain it, it’s bad. – Cory House',
            'user_id' => 3,
        ]);

        Post::create([
            'body' => 'Any fool can write code that a computer can understand. Good programmers write code that humans can understand. – Martin Fowler',
            'user_id' => 5,
        ]);
    }
}
