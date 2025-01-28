<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Instruction::create([
            'title' => 'HTML structure',
            'language' => 'html',
            'description' => 'Basic structure with a <ul> for navigation links and a <div> for the burger menu.',
            'code' => '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Navbar</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>

        <nav className="navbar">
            <div className="logo">MySite</div>
            <ul className="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div className="burger">
                <div className="line"></div>
                <div className="line"></div>
                <div className="line"></div>
            </div>
        </nav>

        <script src="script.js"></script>
    </body>
</html>',
            'user_id' => 1,
            'project_id' => 1,
        ]);

        Instruction::create([
            'title' => 'CSS styles',
            'language' => 'css',
            'description' => "✓ Uses Flexbox for layout.\n✓ Hides the menu on mobile and shows it with .nav-active.\n✓ Smooth transitions for a better user experience.",
            'code' => '/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #333;
    color: white;
    padding: 15px 20px;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1000;
}

/* Logo */
.logo {
    font-size: 1.5rem;
    font-weight: bold;
}

/* Navigation links */
.nav-links {
    list-style: none;
    display: flex;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-size: 1.2rem;
}

/* Burger Menu */
.burger {
    display: none;
    cursor: pointer;
}

.burger .line {
    width: 30px;
    height: 3px;
    background: white;
    margin: 5px;
}

/* Responsive */
@media screen and (max-width: 768px) {
    .nav-links {
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        background: #333;
        flex-direction: column;
        align-items: center;
        display: none;
    }

    .nav-links li {
        margin: 15px 0;
    }

    .burger {
        display: block;
    }
}

/* Active Class */
.nav-active {
    display: flex !important;
}',
            'user_id' => 1,
            'project_id' => 1,
        ]);

        Instruction::create([
            'title' => 'JavaScript',
            'language' => 'javascript',
            'description' => 'Adds/removes the .nav-active class when the burger menu is clicked.',
            'code' => 'document.addEventListener("DOMContentLoaded", () => {
    const burger = document.querySelector(".burger");
    const nav = document.querySelector(".nav-links");

    burger.addEventListener("click", () => {
        nav.classList.toggle("nav-active");
    });
});',
            'user_id' => 1,
            'project_id' => 1,
        ]);

        // project2
        Instruction::create([
            'title' => 'Install Laravel 9',
            'language' => 'bash',
            'description' => 'Set up a new Laravel 9 project with Composer.',
            'code' => 'composer create-project --prefer-dist laravel/laravel:^9.0 name',
            'user_id' => 1,
            'project_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Add Voyager Package',
            'language' => 'bash',
            'description' => 'Install Voyager package for admin panel functionality.',
            'code' => 'composer require tcg/voyager -W',
            'user_id' => 1,
            'project_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Configure .env File',
            'language' => 'javascript',
            'description' => 'Set application URL and database connection parameters.',
            'code' => "APP_URL=http://localhost:8000\nDB_HOST=127.0.0.1\nDB_PORT=3306\nDB_DATABASE=db_name\nDB_USERNAME=root\nDB_PASSWORD=",
            'user_id' => 1,
            'project_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Install Voyager with Dummy Data',
            'language' => 'bash',
            'description' => 'Set up Voyager with sample data for testing.',
            'code' => 'php artisan voyager:install --with-dummy',
            'user_id' => 1,
            'project_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Start Backend Server',
            'language' => 'javascript',
            'description' => 'Run server and open admin panel in the browser.',
            'code' => 'php artisan serve',
            'user_id' => 1,
            'project_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Admin Login Details',
            'language' => 'javascript',
            'description' => 'Default credentials for accessing the admin panel.',
            'code' => "email: admin@admin.com\npassword: password",
            'user_id' => 1,
            'project_id' => 2,
        ]);


        // project3
        Instruction::create([
            'title' => 'Setup and Migration',
            'language' => 'bash',
            'description' => 'Create a Post model and migration:',
            'code' => 'php artisan make:model Post -m',
            'user_id' => 1,
            'project_id' => 3,
        ]);

        Instruction::create([
            'title' => 'Define the schema in the migration file',
            'language' => 'php',
            'description' => '',
            'code' => "Schema::create('posts', function (Blueprint \$table) {\n\t\$table->id();\n\t\$table->string('title');\n\t\$table->text('content');\n\t\$table->timestamps();\n});",
            'user_id' => 1,
            'project_id' => 3,
        ]);

        Instruction::create([
            'title' => 'Run the migration',
            'language' => 'bash',
            'description' => '',
            'code' => "php artisan migrate",
            'user_id' => 1,
            'project_id' => 3,
        ]);

        Instruction::create([
            'title' => 'Routes',
            'language' => 'php',
            'description' => 'Define resourceful routes in routes/web.php:',
            'code' => "use App\Http\Controllers\PostController;\nRoute::resource('posts', PostController::class);",
            'user_id' => 1,
            'project_id' => 3,
        ]);

        Instruction::create([
            'title' => 'Controller',
            'language' => 'bash',
            'description' => 'Generate a controller with resource methods:',
            'code' => "php artisan make:controller PostController --resource",
            'user_id' => 1,
            'project_id' => 3,
        ]);

        Instruction::create([
            'title' => 'Update the PostController with CRUD logic',
            'language' => 'php',
            'description' => '',
            'code' => "namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
            
class PostController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        \$posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('posts.create');
    }
        
    // Store a newly created resource in storage
    public function store(Request \$request)
    {
        \$validated = \$request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        ]);
        
        Post::create(\$validated);
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // Display the specified resource
    public function show(Post \$post)
    {
        return view('posts.show', compact('post'));
    }

    // Show the form for editing the specified resource
    public function edit(Post \$post)
    {
        return view('posts.edit', compact('post'));
    }
        
    // Update the specified resource in storage
    public function update(Request \$request, Post \$post)
    {
        \$validated = \$request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        
        \$post->update(\$validated);
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Post \$post)
    {
        \$post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}",
            'user_id' => 1,
            'project_id' => 3,
        ]);
    }
}
