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
            'trick_id' => 1,
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
            'trick_id' => 1,
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
            'trick_id' => 1,
        ]);

        // trick2
        Instruction::create([
            'title' => 'Install Laravel 9',
            'language' => 'bash',
            'description' => 'Set up a new Laravel 9 trick with Composer.',
            'code' => 'composer create-trick --prefer-dist laravel/laravel:^9.0 name',
            'user_id' => 1,
            'trick_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Add Voyager Package',
            'language' => 'bash',
            'description' => 'Install Voyager package for admin panel functionality.',
            'code' => 'composer require tcg/voyager -W',
            'user_id' => 1,
            'trick_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Configure .env File',
            'language' => 'javascript',
            'description' => 'Set application URL and database connection parameters.',
            'code' => "APP_URL=http://localhost:8000\nDB_HOST=127.0.0.1\nDB_PORT=3306\nDB_DATABASE=db_name\nDB_USERNAME=root\nDB_PASSWORD=",
            'user_id' => 1,
            'trick_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Install Voyager with Dummy Data',
            'language' => 'bash',
            'description' => 'Set up Voyager with sample data for testing.',
            'code' => 'php artisan voyager:install --with-dummy',
            'user_id' => 1,
            'trick_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Start Backend Server',
            'language' => 'javascript',
            'description' => 'Run server and open admin panel in the browser.',
            'code' => 'php artisan serve',
            'user_id' => 1,
            'trick_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Admin Login Details',
            'language' => 'javascript',
            'description' => 'Default credentials for accessing the admin panel.',
            'code' => "email: admin@admin.com\npassword: password",
            'user_id' => 1,
            'trick_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Activing GD Extention',
            'language' => 'javascript',
            'description' => "1. Open XAMPP\n2. Click on Config under Apache.\n3. Select php.ini.\n4. Search for ;extension=gd and remove the ; at the beginning of the line to activate the extension.",
            'code' => "",
            'user_id' => 1,
            'trick_id' => 2,
        ]);

        Instruction::create([
            'title' => 'Update the config/filesystems.php file',
            'language' => 'php',
            'description' => "Replace the public configuration with the following:",
            'code' => "'public' => [\n\t'driver' => 'local',\n\t'root' => storage_path('../public/img'),\n\t'url' => env('APP_URL') . '/img',\n\t'visibility' => 'public',\n],",
            'user_id' => 1,
            'trick_id' => 2,
        ]);

        // trick3
        Instruction::create([
            'title' => 'SETUP Project',
            'language' => '',
            'description' => "Create a folder named 'TODO Application'. Inside this folder, create the following three files:\n\t✔️index.html\n\t✔️style.css\n\t✔️script.js",
            'code' => '',
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'Link the style and script files in the HTML file',
            'language' => 'html',
            'description' => "",
            'code' => "<link rel=\"stylesheet\" href=\"style.css\" />\n<script src=\"script.js\"></script>",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'HTML PART',
            'language' => 'html',
            'description' => "Add the following code inside the <body> tag:",
            'code' => "<header class=\"navbar\">\n\t<h2> TODO Application </h2>\n\t<span class=\"btn btn-p\" id=\"btnCreate\"> Create new task </span>\n</header>\n\n<main class=\"tasks_wrapper\" id=\"tasks_wrapper\"></main>",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'CSS PART : Global Styles',
            'language' => 'css',
            'description' => "",
            'code' => "* {\n\tmargin: 0;\n\tpadding: 0;\n\tbox-sizing: border-box;\n}\n:root {\n\t--darken: #0e0e0e;\n\t--dark: #1f1f1f;\n\t--text: #cbcbcb;\n\t--body-text: #eaeaea;\n}\nbody {\n\tbackground-color: var(--darken);\n\tcolor: var(--body-text);\n\tpadding: 1rem;\n\tfont-family: Poppins;\n}\n\n.navbar {\n\tpadding: 1rem;\n\tbackground-color: var(--dark);\n\tdisplay: flex;\n\talign-items: center;\n\tjustify-content: space-between;\n\tborder-radius: 0.5rem;\n\tflex-wrap: wrap;\n\tgap: 1rem;\n}",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'CSS PART : Grid System',
            'language' => 'css',
            'description' => "",
            "code" => ".tasks_wrapper {\n\tpadding: 1rem;\n\tmargin: 2rem 0;\n\tdisplay: grid;\n\tgrid-template-columns: repeat(4, 1fr);\n\tgap: 2rem;\n}\n\n@media (max-width: 900px) {\n\t.tasks_wrapper {\n\t\tgrid-template-columns: repeat(3, 1fr);\n\t}\n}\n\n@media (max-width: 700px) {\n\t.tasks_wrapper {\n\t\tgrid-template-columns: repeat(2, 1fr);\n\t}\n}\n\n@media (max-width: 500px) {\n\t.tasks_wrapper {\n\t\tgrid-template-columns: repeat(1, 1fr);\n\t}\n}",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'CSS PART : Cards Design',
            'language' => 'css',
            'description' => "",
            "code" => ".tasks_wrapper .task {\n\theight: fit-content;\n\tbackground-color: var(--dark);\n\tborder-radius: 0.5rem;\n\tpadding: 1rem;\n}\n\n.tasks_wrapper .task .task_header {\n\tdisplay: flex;\n\tjustify-content: space-between;\n\talign-items: center;\n\tmargin-bottom: 1rem;\n\tcolor: var(--text);\n}\n\n.tasks_wrapper .task .tastk_title {\n\tmargin-bottom: 2rem;\n}\n\n.tasks_wrapper .task .task_stat {\n\tdisplay: flex;\n\talign-items: center;\n\tgap: 0.5rem;\n\tcursor: pointer;\n}\n\n.tasks_wrapper .task .task_stat span {\n\tfont-size: 0.9rem;\n}\n\n.task_actions {\n\tdisplay: flex;\n\tjustify-content: center;\n\tgap: 0.5rem;\n\tflex-wrap: wrap;\n}",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'JS PART : Variables initialisation',
            'language' => 'javascript',
            'description' => "",
            "code" => "// Get the HTML element that will contain the tasks (inside the main section of the page)\nlet tasksWrapper = document.getElementById(\"tasks_wrapper\");\n// Get the \"Create new task\" button from the HTML element with the ID \"btnCreate\"\nlet btnCreate = document.getElementById(\"btnCreate\");\n// Initialize an empty array to store tasks\nlet tasks = [];\n// Retrieve stored tasks from localStorage if available, otherwise initialize with an empty array\ntasks = JSON.parse(localStorage.getItem(\"pe_tasks\")) ?? [];",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'JS PART : function fillData()',
            'language' => 'javascript',
            'description' => "",
            "code" => "// Function to fill the task data into the tasksWrapper\nfunction fillData() {\n\t// Clear the current content of tasksWrapper\nt\ttasksWrapper.innerHTML = \"\";\n\t// Initialize the index to track each task's position\n\tlet index = 0;\n\t// Loop through each task in the tasks array\n\tfor (let task of tasks) {\n\t\t// Generate the HTML content for each task card (taskCard) using the task's data and its index\n\t\tlet taskCard = `\n\t\t\t<div class=\"task\">\n\t\t\t\t<div class=\"task_header\">\n\t\t\t\t\t<span class=\"task_stat\" onclick=\"handleStat(\${index})\"> \${ task.isDone ? \"Done\" : \"In progress...\" } </span>\n\t\t\t\t</div>\n\t\t\t\t<h5 class=\"task_title\">\${task.title}</h5>\n\t\t\t\t<div class=\"task_actions\">\n\t\t\t\t\t<span class=\"btn btn-d\" onclick=\"deleteTask(\${index})\"> Delete task </span>\n\t\t\t\t\t<span class=\"btn btn-s\" onclick=\"editTask(\${index})\"> Edit task </span>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t`;\n\t\t// Add the task card to the tasksWrapper\n\t\ttasksWrapper.innerHTML += taskCard;\n\t\t// Increment index for the next task position\n\t\tindex++;\n\t}\n}",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'JS PART : Create new Task',
            'language' => 'javascript',
            'description' => "",
            "code" => "// Set up an event handler for the 'Create new task' button click\nbtnCreate.onclick = () => {\n\t// Ask the user to enter the title of the new task\n\tlet newTaskTitle = prompt(\"Enter the title of the task\");\n\t// Check if the user entered a valid title and didn't cancel\n\tif (newTaskTitle != null && newTaskTitle != \"\") {\n\t\t// Create a new task object with the entered title and isDone set to false\n\t\tlet newTaskObject = {\n\t\t\ttitle: newTaskTitle,\n\t\t\tisDone: false,\n\t\t};\n\t\t// Add the new task object to the tasks array\n\t\ttasks.push(newTaskObject);\n\t\t// Store the updated tasks in localStorage\n\t\tstoreTasksToLocalStorage();\n\t\t// Update the display to reflect the changes in tasks\n\t\tfillData();\n\t}\n};",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'JS PART : Edit Task',
            'language' => 'javascript',
            'description' => "",
            "code" => "// Define the editTask function that takes an index parameter to identify the task to edit\nfunction editTask(index) {\n\t// Retrieve the task from the tasks array using the specified index\n\tlet task = tasks[index];\n\t// Ask the user to enter the new title for the task, showing the current title as the default value\n\tlet newTaskTitle = prompt(\"Enter the new title\", task.title);\n\t// Check if the user entered a valid title and didn't cancel the input\n\tif (newTaskTitle != null && newTaskTitle != \"\") {\n\t\t// Update the task's title with the new title entered by the user\n\t\ttask.title = newTaskTitle;\n\t\t// Store the updated tasks in localStorage\n\t\tstoreTasksToLocalStorage();\n\t\t// Update the display to reflect the changes in tasks\n\t\tfillData();\n\t}\n};",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'JS PART : Delete Task',
            'language' => 'javascript',
            'description' => "",
            "code" => "// Define the deleteTask function that takes an index parameter to identify the task to delete\nfunction deleteTask(index) {\n\t// Retrieve the task from the tasks array using the specified index\n\tlet task = tasks[index];\n\t// Show a confirmation dialog to confirm the deletion of the task\n\tlet isConfirm = confirm(`Are you sure you want to delete the task: \${task.title} ?`);\n\t// Check if the user confirmed the deletion of the task\n\tif (isConfirm) {\n\t\t// Remove the task from the tasks array using splice() to remove one element at the specified index\n\t\ttasks.splice(index, 1);\n\t\t// Store the updated tasks in localStorage\n\t\tstoreTasksToLocalStorage();\n\t\t// Update the display to reflect the changes in tasks\n\t\tfillData();\n\t}\n};",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'JS PART : Manage task status',
            'language' => 'javascript',
            'description' => "",
            "code" => "// Handle the task status (done or in progress)\nfunction handleStat(index) {\n\t// Retrieve the task from the tasks array using the specified index\n\tlet task = tasks[index];\n\t// Toggle the task's isDone status (from true to false or vice versa)\n\ttask.isDone = !task.isDone;\n\t// Store the updated tasks in localStorage\n\tstoreTasksToLocalStorage();\n\t// Update the display to reflect the changes in task status\n\tfillData();\n};",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        Instruction::create([
            'title' => 'JS PART : LocalStorage',
            'language' => 'javascript',
            'description' => "",
            "code" => "// Function to store tasks in localStorage\nfunction storeTasksToLocalStorage() {\n\t// Convert the tasks array to JSON format and store it in localStorage with the key \"pe_tasks\"\n\tlocalStorage.setItem(\"pe_tasks\", JSON.stringify(tasks));\n};",
            'user_id' => 1,
            'trick_id' => 3,
        ]);

        // trick4
        Instruction::create([
            'title' => 'SETUP Project',
            'language' => '',
            'description' => "Create a folder named 'Tic Tac Toe Game'. Inside this folder, create the following three files:\n\t✔️index.html\n\t✔️style.css\n\t✔️script.js",
            'code' => '',
            'user_id' => 1,
            'trick_id' => 4,
        ]);

        Instruction::create([
            'title' => 'Link the style and script files in the HTML file',
            'language' => 'html',
            'description' => "",
            'code' => "<link rel=\"stylesheet\" href=\"style.css\" />\n<script src=\"script.js\"></script>",
            'user_id' => 1,
            'trick_id' => 4,
        ]);

        Instruction::create([
            'title' => 'HTML PART',
            'language' => 'html',
            'description' => "Add the following code inside the <body> tag:",
            "code" => "<div class=\"game\" id=\"game\">\n\t<div class=\"counts\">\n\t\t<div class=\"count\">\n\t\t\tPlayer x :\n\t\t\t<span id=\"countX\">0</span>\n\t\t</div>\n\t\t<div class=\"count\">\n\t\t\tPlayer o :\n\t\t\t<span id=\"countO\">0</span>\n\t\t</div>\n\t</div>\n\t<div class=\"game_header\">\n\t\t<h2>\n\t\t\t<span>x</span>\n\t\t\tTurn\n\t\t</h2>\n\t</div>\n\t<div class=\"game_board\">\n\t\t<div class=\"cell\" order=\"0\"></div>\n\t\t<div class=\"cell\" order=\"1\"></div>\n\t\t<div class=\"cell\" order=\"2\"></div>\n\t\t<div class=\"cell\" order=\"3\"></div>\n\t\t<div class=\"cell\" order=\"4\"></div>\n\t\t<div class=\"cell\" order=\"5\"></div>\n\t\t<div class=\"cell\" order=\"6\"></div>\n\t\t<div class=\"cell\" order=\"7\"></div>\n\t\t<div class=\"cell\" order=\"8\"></div>\n\t</div>\n\t<div class=\"game_footer\">\n\t\t<span class=\"btn\" id=\"btnRestart\">\n\t\t\tRestart the game\n\t\t\t<span class=\"material-icons\"> refresh </span>\n\t\t</span>\n\t</div>\n</div>",
            'user_id' => 1,
            'trick_id' => 4,
        ]);

        Instruction::create([
            'title' => 'CSS PART : Global Styles',
            'language' => 'css',
            'description' => "",
            "code" => "*,\n*::after,\n*::before {\n\tmargin: 0;\n\tpadding: 0;\n\tbox-sizing: border-box;\n}\n\n:root {\n\t--size: 6rem;\n\t--darken: #0e0e0e;\n\t--dark: #1f1f1f;\n\t--text: #cbcbcb;\n\t--body-text: #eaeaea;\n}\nbody {\n\tbackground-color: var(--darken);\n\tcolor: var(--body-text);\n\tfont-family: Poppins;\n\tpadding: 2rem 0;\n\tdisplay: grid;\n\tplace-items: center;\n\tfont-family: \"shantell sans\";\n}",
            'user_id' => 1,
            'trick_id' => 4,
        ]);

        Instruction::create([
            'title' => 'CSS PART : Buttons Styles',
            'language' => 'css',
            'description' => "",
            "code" => ".btn {\n\tbackground-color: var(--dark);\n\tpadding: 0.5rem 2rem;\n\tborder-radius: 0.5rem;\n\ttransition: 0.5s;\n\tcursor: pointer;\n\tdisplay: flex;\n\talign-items: center;\n\tgap: 0.5rem;\n\twidth: fit-content;\n\tmargin: 0 auto;\n}\n\n.btn:hover {\n\tbackground-color: #0d6efd;\n\tcolor: #fff;\n}",
            'user_id' => 1,
            'trick_id' => 4,
        ]);

        Instruction::create([
            'title' => 'CSS PART : Game Board Styles',
            'language' => 'css',
            'description' => "",
            "code" => ".game {\n\tdisplay: flex;\n\tflex-direction: column;\n\tjustify-content: center;\n\talign-content: center;\n\tgap: 2rem;\n\twidth: 20rem;\n}\n\n.counts {\n\tdisplay: flex;\n\tjustify-content: space-evenly;\n}\n.game_header,\n.counts {\n\tbackground-color: var(--dark);\n\ttext-align: center;\n\tpadding: 1rem;\n\tborder-radius: 0.5rem;\n\t/* width: 100%; */\n}\n\n.game_board {\n\tdisplay: grid;\n\tgrid-template-columns: repeat(3, 1fr);\n}",
            'user_id' => 1,
            'trick_id' => 4,
        ]);

        Instruction::create([
            'title' => 'CSS PART : Cells Design',
            'language' => 'css',
            'description' => "",
            "code" => ".cell {\n\tdisplay: flex;\n\tjustify-content: center;\n\talign-items: center;\n\tbackground-color: var(--dark);\n\tborder: 2px solid var(--darken);\n\t/* width: var(--size); */\n\theight: var(--size);\n\tfont-size: 6rem;\n\tcolor: var(--text);\n\tcursor: pointer;\n\tborder-radius: 0.5rem;\n\ttransition: 0.5s;\n}\n\n.cell:hover {\n\topacity: 0.7;\n}",
            'user_id' => 1,
            'trick_id' => 4,
        ]);

        Instruction::create([
            'title' => 'JS PART : Variables initialisation ',
            'language' => 'javascript',
            'description' => "",
            "code" => "// Select all HTML elements with the class \"cell\" and store them in the variable cells\nlet cells = document.getElementsByClassName(\"cell\");\n\n// Select the first <span> inside the element with the class \"game_header h2\" and store it in the variable span\nlet span = document.querySelector(\".game_header h2 span\");\n\n// Initialize an arrayBoard to represent the current state of the game board with 9 empty cells\nlet arrayBoard = [\"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\"]; \n\n// Define a variable isDraw to indicate if the game ends in a draw (initialized to false)\nlet isDraw = false;\n\n// Define a variable gameIsFinished to indicate if the game is over (initialized to false)\nlet gameIsFinished = false;\n\n// Define a variable turn to indicate the current player's turn (initialized to \"x\", indicating Player X's turn)\nlet turn = \"x\";\n\n// Select the HTML element with the id \"countX\" and store it in the variable countX\nlet countX = document.getElementById(\"countX\");\n\n// Select the HTML element with the id \"countO\" and store it in the variable countO\nlet countO = document.getElementById(\"countO\");",
            'user_id' => 1,
            'trick_id' => 4,
        ]);

        Instruction::create([
            'title' => 'JS PART : Game Logic ',
            'language' => 'javascript',
            'description' => "",
            "code" => "// Loop through each element (cell) in the cells list\nfor (let e of cells) {\n\t// Set an event handler for clicking on each cell\n\te.onclick = () => {\n\t\t// Check if the game is already finished; if yes, exit the function\n\t\tif (gameIsFinished) {\n\t\t\treturn;\n\t\t}\n\n\t\t// Get the \"order\" attribute of the clicked cell\n\t\tlet order = e.getAttribute(\"order\");\n\n\t\t// Check if the cell is already marked (\"x\" or \"o\"); if yes, exit the function\n\t\tif (arrayBoard[order] == \"x\" || arrayBoard[order] == \"o\") {\n\t\t\treturn;\n\t\t}\n\n\t\t// Select the HTML element corresponding to the clicked cell by its \"order\" attribute\n\t\tlet cellContent = document.querySelector(`.cell[order='\${order}']`);\n\n\t\t// Update the arrayBoard with the current player's symbol (turn) at the specified index\n\t\tarrayBoard[order] = turn;\n\n\t\t// Check for a winner after each move\n\t\tcheckWinners();\n\n\t\t// Update the display of the clicked cell with the current player's symbol (turn)\n\t\tif (turn == \"x\") {\n\t\t\tcellContent.innerHTML = \"x\";\n\t\t\tturn = \"o\";\n\t\t\tspan.innerHTML = turn;\n\t\t} else {\n\t\t\tcellContent.innerHTML = \"o\";\n\t\t\tturn = \"x\";\n\t\t\tspan.innerHTML = turn;\n\t\t}\n\t};\n}",
            'user_id' => 1,
            'trick_id' => 4,
        ]);

        Instruction::create([
            'title' => 'JS PART : function checkWinners() ',
            'language' => 'javascript',
            'description' => "",
            "code" => "// Function to check if there's a winner or if it's a draw\nfunction checkWinners() {\n\t// Check rows\n\tif (\n\t\t(arrayBoard[0] == turn && arrayBoard[1] == turn && arrayBoard[2] == turn) || // First row\n\t\t(arrayBoard[3] == turn && arrayBoard[4] == turn && arrayBoard[5] == turn) || // Second row\n\t\t(arrayBoard[6] == turn && arrayBoard[7] == turn && arrayBoard[8] == turn)   // Third row\n\t) {\n\t\t// If one player has aligned three symbols in a row, the game is over\n\t\tgameIsFinished = true;\n\t\talert(`\${turn} is the winner`); // Display winner message\n\n\t\t// Update the winner's victory count\n\t\tif (turn == \"x\") {\n\t\t\tcountX.innerHTML = Number(countX.innerHTML) + 1;\n\t\t} else if (turn == \"o\") {\n\t\t\tcountO.innerHTML = Number(countO.innerHTML) + 1;\n\t\t}\n\t} else {\n\t\t// Check for draw\n\t\tisDraw = true;\n\t\tfor (let e of arrayBoard) {\n\t\t\tif (e == \"\") {\n\t\t\t\tisDraw = false; // If there's at least one empty cell, it's not a draw\n\t\t\t}\n\t\t}\n\t\t// If all cells are filled and no player won, it's a draw\n\t\tif (isDraw) {\n\t\t\tgameIsFinished = true;\n\t\t\talert(\"It's a draw\"); // Display draw message\n\t\t}\n\t}\n}",
            'user_id' => 1,
            'trick_id' => 4,
        ]);

        Instruction::create([
            'title' => 'JS PART : Restart the game',
            'language' => 'javascript',
            'description' => "",
            "code" => "// Set an event handler for the click on the button with the id \"btnRestart\"\ndocument.getElementById(\"btnRestart\").onclick = function () {\n\t// Reset the content of each cell (HTML element) in the cells list to an empty string (\"\")\n\tfor (let e of cells) {\n\t\te.innerHTML = \"\";\n\t}\n\n\t// Reset the arrayBoard to its initial state (all empty cells)\n\tarrayBoard = [\"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\"]; \n\n\t// Reset the gameIsFinished variable to false (game is not finished)\n\tgameIsFinished = false;\n\n\t// Reset the turn to \"x\" (Player X always starts after restart)\n\tturn = \"x\";\n\n\t// Update the turn display in the <span> element with Player X's turn\n\tspan.innerHTML = turn;\n};",
            'user_id' => 1,
            'trick_id' => 4,
        ]);

        // trick5
        Instruction::create([
            'title' => 'Setup and Migration',
            'language' => 'bash',
            'description' => 'Create a Post model and migration:',
            'code' => 'php artisan make:model Post -m',
            'user_id' => 1,
            'trick_id' => 5,
        ]);

        Instruction::create([
            'title' => 'Define the schema in the migration file',
            'language' => 'php',
            'description' => '',
            'code' => "Schema::create('posts', function (Blueprint \$table) {\n\t\$table->id();\n\t\$table->string('title');\n\t\$table->text('content');\n\t\$table->timestamps();\n});",
            'user_id' => 1,
            'trick_id' => 5,
        ]);

        Instruction::create([
            'title' => 'Run the migration',
            'language' => 'bash',
            'description' => '',
            'code' => "php artisan migrate",
            'user_id' => 1,
            'trick_id' => 5,
        ]);

        Instruction::create([
            'title' => 'Routes',
            'language' => 'php',
            'description' => 'Define resourceful routes in routes/web.php:',
            'code' => "use App\Http\Controllers\PostController;\nRoute::resource('posts', PostController::class);",
            'user_id' => 1,
            'trick_id' => 5,
        ]);

        Instruction::create([
            'title' => 'Controller',
            'language' => 'bash',
            'description' => 'Generate a controller with resource methods:',
            'code' => "php artisan make:controller PostController --resource",
            'user_id' => 1,
            'trick_id' => 5,
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
            'trick_id' => 5,
        ]);
    }
}
