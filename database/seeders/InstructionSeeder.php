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
    // Trick 1: Creating a responsive navbar pure HTML5, CSS3, and JS
    Instruction::create([
        'title_en' => 'HTML structure',
        'title_ar' => 'تركيبة HTML',
        'title_fr' => 'structure HTML',
        'description_en' => 'Basic structure with a <nav> element for navigation links and a <div> for the burger menu.',
        'description_ar' => 'الهيكل الأساسي مع عنصر <nav> لروابط التنقل و <div> لقائمة البرجر.',
        'description_fr' => 'Structure de base avec un élément <nav> pour les liens de navigation et un <div> pour le menu burger.',
        'code' => '<nav class="navbar">\n<ul class="nav-links">\n<li>Home</li>\n<li>Services</li>\n<li>About</li>\n<li>Contact</li>\n</ul>\n<div class="burger">\n<div class="line"></div>\n<div class="line"></div>\n<div class="line"></div>\n</div>\n</nav>',
        'language' => 'html',
        'premium' => false,
        'user_id' => 1,
        'trick_id' => 1,
    ]);
    Instruction::create([
        'title_en' => 'CSS styles',
        'title_ar' => 'واجهة CSS',
        'title_fr' => 'styles CSS',
        'description_en' => "✓ Uses Flexbox for layout.\n✓ Hides the menu on mobile and shows it with .nav-active.\n✓ Smooth transitions for a better user experience.",
        'description_ar' => "✓ يستخدم Flexbox للتصميم.\n✓ يخفي القائمة على الأجهزة المحمولة ويظهرها باستخدام .nav-active.\n✓ انتقالات سلسة لتجربة مستخدم أفضل.",
        'description_fr' => "✓ Utilise Flexbox pour la mise en page.\n✓ Masque le menu sur mobile et l'affiche avec .nav-active.\n✓ Transitions fluides pour une meilleure expérience utilisateur.",
        'code' => '/* Reset */\n* {\n    margin: 0;\n    padding: 0;\n    box-sizing: border-box;\n}\n\n/* Navbar */\n.navbar {\n    display: flex;\n    justify-content: space-between;\n    align-items: center;\n    background: #333;\n    color: white;\n    padding: 15px 20px;\n    position: fixed;\n    width: 100%;\n    top: 0;\n    left: 0;\n    z-index: 1000;\n}\n\n/* Responsive */\n@media screen and (max-width: 768px) {\n    .nav-links {\n        display: none;\n    }\n    .burger {\n        display: block;\n    }\n}',
        'language' => 'css',
        'premium' => false,
        'user_id' => 1,
        'trick_id' => 1,
    ]);
    Instruction::create([
        'title_en' => 'JavaScript',
        'title_ar' => 'جافاسكريبت',
        'title_fr' => 'JavaScript',
        'description_en' => 'Adds/removes the .nav-active class when the burger menu is clicked.',
        'description_ar' => 'يضيف/يُزيل فئة .nav-active عندما يتم النقر على قائمة البرجر.',
        'description_fr' => 'Ajoute/supprime la classe .nav-active lorsque le menu burger est cliqué.',
        'code' => 'document.addEventListener("DOMContentLoaded", () => {\n    const burger = document.querySelector(".burger");\n    const nav = document.querySelector(".nav-links");\n\n    burger.addEventListener("click", () => {\n        nav.classList.toggle("nav-active");\n    });\n});',
        'language' => 'javascript',
        'premium' => false,
        'user_id' => 1,
        'trick_id' => 1,
    ]);

    // Trick 2: Setup Laravel Voyager
    Instruction::create([
        'title_en' => 'Install Laravel',
        'title_ar' => 'تثبيت لارافيل',
        'title_fr' => 'Installer Laravel',
        'description_en' => 'Set up a new Laravel 9 project with Composer.',
        'description_ar' => 'قم بإعداد مشروع جديد بلارافيل 9 باستخدام Composer.',
        'description_fr' => 'Installez un nouveau projet Laravel 9 avec Composer.',
        'code' => 'composer create-project --prefer-dist laravel/laravel:^9.0 name',
        'language' => 'bash',
        'premium' => false,
        'user_id' => 1,
        'trick_id' => 2,
    ]);
    Instruction::create([
        'title_en' => 'Add Voyager Package',
        'title_ar' => 'إضافة حزمة Voyager',
        'title_fr' => 'Ajouter le paquet Voyager',
        'description_en' => 'Install Voyager package for admin panel functionality.',
        'description_ar' => 'قم بتثبيت حزمة Voyager لوظائف لوحة التحكم.',
        'description_fr' => 'Installez le paquet Voyager pour les fonctionnalités du panneau d\'administration.',
        'code' => 'composer require tcg/voyager -W',
        'language' => 'bash',
        'premium' => false,
        'user_id' => 1,
        'trick_id' => 2,
    ]);
    Instruction::create([
        'title_en' => 'Configure .env',
        'title_ar' => 'إعداد ملف .env',
        'title_fr' => 'Configurer .env',
        'description_en' => 'Set application URL and database connection parameters.',
        'description_ar' => 'قم بضبط عنوان التطبيق وبارامترات اتصال قاعدة البيانات.',
        'description_fr' => 'Définissez l\'URL de l\'application et les paramètres de connexion à la base de données.',
        'code' => "APP_URL=http://localhost:8000\nDB_HOST=127.0.0.1\nDB_PORT=3306\nDB_DATABASE=db_name\nDB_USERNAME=root\nDB_PASSWORD=",
        'language' => 'plaintext',
        'premium' => false,
        'user_id' => 1,
        'trick_id' => 2,
    ]);
    Instruction::create([
        'title_en' => 'Install Voyager with Dummy Data',
        'title_ar' => 'تثبيت Voyager مع بيانات تجريبية',
        'title_fr' => 'Installer Voyager avec des données fictives',
        'description_en' => 'Set up Voyager with sample data for testing.',
        'description_ar' => 'قم بإعداد Voyager مع بيانات تجريبية للاختبار.',
        'description_fr' => 'Installez Voyager avec des données fictives pour les tests.',
        'code' => 'php artisan voyager:install --with-dummy',
        'language' => 'bash',
        'premium' => false,
        'user_id' => 1,
        'trick_id' => 2,
    ]);

    // Trick 3: Vanilla JavaScript TODO Application with LocalStorage
    Instruction::create([
        'title_en' => 'SETUP Project',
        'title_ar' => 'إعداد المشروع',
        'title_fr' => 'Configuration du projet',
        'description_en' => "Create a folder named 'TODO Application'. Inside this folder, create the following three files:\n\t✔️index.html\n\t✔️style.css\n\t✔️script.js",
        'description_ar' => "إنشاء مجلد باسم 'TODO Application'. داخل هذا المجلد، إنشاء الملفات الثلاثة التالية:\n\t✔️index.html\n\t✔️style.css\n\t✔️script.js",
        'description_fr' => "Créez un dossier nommé 'TODO Application'. À l'intérieur de ce dossier, créez les trois fichiers suivants:\n\t✔️index.html\n\t✔️style.css\n\t✔️script.js",
        'code' => '',
        'language' => 'plaintext',
        'premium' => false,
        'user_id' => 1,
        'trick_id' => 3,
    ]);
    Instruction::create([
        'title_en' => 'HTML Structure',
        'title_ar' => 'تركيبة HTML',
        'title_fr' => 'structure HTML',
        'description_en' => 'Create the basic structure of the TODO application with an input field and a button.',
        'description_ar' => 'إنشاء الهيكل الأساسي لتطبيق TODO مع حقل إدخال وزر.',
        'description_fr' => 'Créer la structure de base de l\'application TODO avec un champ de saisie et un bouton.',
        'code' => '<!DOCTYPE html>\n<html lang="en">\n<head>\n    <meta charset="UTF-8">\n    <meta name="viewport" content="width=device-width, initial-scale=1.0">\n    <title>TODO App</title>\n    <link rel="stylesheet" href="style.css">\n</head>\n<body>\n    <div class="todo-container">\n        <input type="text" id="taskInput" placeholder="Enter a task">\n        <button id="addTask">Add Task</button>\n        <ul id="taskList"></ul>\n    </div>\n    <script src="script.js"></script>\n</body>\n</html>',
        'language' => 'html',
        'premium' => false,
        'user_id' => 1,
        'trick_id' => 3,
    ]);
    Instruction::create([
        'title_en' => 'CSS Styling',
        'title_ar' => 'واجهة CSS',
        'title_fr' => 'styles CSS',
        'description_en' => 'Style the TODO application with a clean and modern design.',
        'description_ar' => 'تصميم تطبيق TODO بنمط نظيف ومعاصر.',
        'description_fr' => 'Styler l\'application TODO avec un design propre et moderne.',
        'code' => 'body {\n    font-family: Arial, sans-serif;\n    background-color: #f4f4f4;\n    margin: 0;\n    padding: 0;\n    display: flex;\n    justify-content: center;\n    align-items: center;\n    height: 100vh;\n}\n.todo-container {\n    background: #fff;\n    padding: 20px;\n    border-radius: 8px;\n    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);\n}\n#taskInput {\n    width: 100%;\n    padding: 10px;\n    margin-bottom: 10px;\n    border: 1px solid #ccc;\n    border-radius: 4px;\n}\n#addTask {\n    padding: 10px 20px;\n    background: #007bff;\n    color: #fff;\n    border: none;\n    border-radius: 4px;\n    cursor: pointer;\n}\n#addTask:hover {\n    background: #0056b3;\n}',
        'language' => 'css',
        'premium' => false,
        'user_id' => 1,
        'trick_id' => 3,
    ]);
    Instruction::create([
        'title_en' => 'JavaScript Functionality',
        'title_ar' => 'وظائف جافاسكريبت',
        'title_fr' => 'Fonctionnalités JavaScript',
        'description_en' => 'Add tasks dynamically and store them in LocalStorage.',
        'description_ar' => 'أضف المهام ديناميكيًا واحفظها في LocalStorage.',
        'description_fr' => 'Ajoutez des tâches dynamiquement et stockez-les dans LocalStorage.',
        'code' => 'document.addEventListener("DOMContentLoaded", () => {\n    const taskInput = document.getElementById("taskInput");\n    const addTaskButton = document.getElementById("addTask");\n    const taskList = document.getElementById("taskList");\n\n    // Load tasks from LocalStorage\n    const savedTasks = JSON.parse(localStorage.getItem("tasks")) || [];\n    savedTasks.forEach(task => addTaskToList(task));\n\n    addTaskButton.addEventListener("click", () => {\n        const taskText = taskInput.value.trim();\n        if (taskText !== "") {\n            addTaskToList(taskText);\n            saveTaskToLocalStorage(taskText);\n            taskInput.value = "";\n        }\n    });\n\n    function addTaskToList(taskText) {\n        const listItem = document.createElement("li");\n        listItem.textContent = taskText;\n        taskList.appendChild(listItem);\n    }\n\n    function saveTaskToLocalStorage(taskText) {\n        let tasks = JSON.parse(localStorage.getItem("tasks")) || [];\n        tasks.push(taskText);\n        localStorage.setItem("tasks", JSON.stringify(tasks));\n    }\n});',
        'language' => 'javascript',
        'premium' => false,
        'user_id' => 1,
        'trick_id' => 3,
    ]);

    // Trick 4: Simple CRUD operations with Laravel
Instruction::create([
    'title_en' => 'Set Up a New Laravel Project',
    'title_ar' => 'إعداد مشروع لارافيل جديد',
    'title_fr' => 'Configurer un nouveau projet Laravel',
    'description_en' => 'Create a new Laravel project using Composer.',
    'description_ar' => 'قم بإنشاء مشروع لارافيل جديد باستخدام Composer.',
    'description_fr' => 'Créez un nouveau projet Laravel avec Composer.',
    'code' => 'composer create-project --prefer-dist laravel/laravel:^9.0 project-name',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 4,
]);
Instruction::create([
    'title_en' => 'Create a Database Table',
    'title_ar' => 'إنشاء جدول قاعدة بيانات',
    'title_fr' => 'Créer une table de base de données',
    'description_en' => 'Generate a migration file and define the structure of the "products" table.',
    'description_ar' => 'قم بإنشاء ملف الهجرة وتحديد هيكل جدول "المنتجات".',
    'description_fr' => 'Générez un fichier de migration et définissez la structure du tableau "produits".',
    'code' => 'php artisan make:migration create_products_table --create=products',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 4,
]);
Instruction::create([
    'title_en' => 'Define Migration Fields',
    'title_ar' => 'تعريف حقول الهجرة',
    'title_fr' => 'Définir les champs de migration',
    'description_en' => 'Add fields like name, price, and description to the products table.',
    'description_ar' => 'أضف حقولًا مثل الاسم، السعر، والوصف إلى جدول المنتجات.',
    'description_fr' => 'Ajoutez des champs comme le nom, le prix et la description au tableau des produits.',
    'code' => '$table->id();\n$table->string("name");\n$table->decimal("price", 8, 2);\n$table->text("description")->nullable();\n$table->timestamps();',
    'language' => 'php',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 4,
]);
Instruction::create([
    'title_en' => 'Run the Migration',
    'title_ar' => 'تشغيل الهجرة',
    'title_fr' => 'Exécuter la migration',
    'description_en' => 'Apply the migration to create the "products" table in the database.',
    'description_ar' => 'قم بتطبيق الهجرة لإنشاء جدول "المنتجات" في قاعدة البيانات.',
    'description_fr' => 'Appliquez la migration pour créer le tableau "produits" dans la base de données.',
    'code' => 'php artisan migrate',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 4,
]);
Instruction::create([
    'title_en' => 'Create a Model',
    'title_ar' => 'إنشاء نموذج',
    'title_fr' => 'Créer un modèle',
    'description_en' => 'Generate a Product model to interact with the "products" table.',
    'description_ar' => 'قم بإنشاء نموذج Product للتفاعل مع جدول "المنتجات".',
    'description_fr' => 'Générez un modèle Produit pour interagir avec le tableau "produits".',
    'code' => 'php artisan make:model Product',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 4,
]);
Instruction::create([
    'title_en' => 'Build CRUD Controllers',
    'title_ar' => 'إنشاء متحكمين CRUD',
    'title_fr' => 'Créer des contrôleurs CRUD',
    'description_en' => 'Generate a controller with methods for Create, Read, Update, and Delete operations.',
    'description_ar' => 'قم بإنشاء متحكم مع طرق لإنشاء، قراءة، تحديث، وحذف العمليات.',
    'description_fr' => 'Générez un contrôleur avec des méthodes pour les opérations Créer, Lire, Mettre à jour et Supprimer.',
    'code' => 'php artisan make:controller ProductController --resource',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 4,
]);
Instruction::create([
    'title_en' => 'Define Routes',
    'title_ar' => 'تحديد الروابط',
    'title_fr' => 'Définir les routes',
    'description_en' => 'Set up resourceful routes for the ProductController.',
    'description_ar' => 'قم بإعداد الروابط الموارد لـ ProductController.',
    'description_fr' => 'Configurez les routes ressources pour le ProductController.',
    'code' => 'Route::resource("products", ProductController::class);',
    'language' => 'php',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 4,
]);
Instruction::create([
    'title_en' => 'Build Blade Views',
    'title_ar' => 'إنشاء عروض Blade',
    'title_fr' => 'Créer des vues Blade',
    'description_en' => 'Create views for displaying, adding, editing, and deleting products.',
    'description_ar' => 'قم بإنشاء العروض لعرض، إضافة، تعديل، وحذف المنتجات.',
    'description_fr' => 'Créez des vues pour afficher, ajouter, modifier et supprimer des produits.',
    'code' => '@extends("layouts.app")\n\n@section("content")\n<h1>Products</h1>\n<ul>\n@foreach($products as $product)\n    <li>{{ $product->name }} - {{ $product->price }}</li>\n@endforeach\n</ul>\n@endsection',
    'language' => 'blade',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 4,
]);

// Trick 5: Building a dynamic form with React and Laravel API
Instruction::create([
    'title_en' => 'Set Up Laravel Backend',
    'title_ar' => 'إعداد الخلفية بلارافيل',
    'title_fr' => 'Configurer l\'API Laravel',
    'description_en' => 'Create a Laravel project and set up an API endpoint for handling form submissions.',
    'description_ar' => 'قم بإنشاء مشروع لارافيل وإعداد نقطة نهاية API لمعالجة إرسال النماذج.',
    'description_fr' => 'Créez un projet Laravel et configurez un point final API pour gérer les soumissions des formulaires.',
    'code' => 'composer create-project --prefer-dist laravel/laravel:^9.0 project-name',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 5,
]);
Instruction::create([
    'title_en' => 'Create an API Route',
    'title_ar' => 'إنشاء رابط API',
    'title_fr' => 'Créer une route API',
    'description_en' => 'Define an API route to handle POST requests from the frontend.',
    'description_ar' => 'حدد رابط API لمعالجة طلبات POST من الجهة الأمامية.',
    'description_fr' => 'Définissez une route API pour gérer les requêtes POST depuis le frontend.',
    'code' => 'Route::post("/api/submit-form", [FormController::class, "store"]);',
    'language' => 'php',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 5,
]);
Instruction::create([
    'title_en' => 'Set Up React Frontend',
    'title_ar' => 'إعداد الجهة الأمامية برياكت',
    'title_fr' => 'Configurer le frontend React',
    'description_en' => 'Create a React app and install necessary dependencies.',
    'description_ar' => 'قم بإنشاء تطبيق React وتثبيت التبعيات اللازمة.',
    'description_fr' => 'Créez une application React et installez les dépendances nécessaires.',
    'code' => 'npx create-react-app my-app\nnpm install axios',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 5,
]);
Instruction::create([
    'title_en' => 'Build the Form Component',
    'title_ar' => 'إنشاء مكون النموذج',
    'title_fr' => 'Créer le composant formulaire',
    'description_en' => 'Create a React component for the dynamic form.',
    'description_ar' => 'قم بإنشاء مكون React لنموذج ديناميكي.',
    'description_fr' => 'Créez un composant React pour le formulaire dynamique.',
    'code' => 'import React, { useState } from "react";\nimport axios from "axios";\n\nfunction App() {\n    const [formData, setFormData] = useState({ name: "", email: "" });\n\n    const handleSubmit = async (e) => {\n        e.preventDefault();\n        await axios.post("/api/submit-form", formData);\n        alert("Form submitted!");\n    };\n\n    return (\n        <form onSubmit={handleSubmit}>\n            <input type="text" value={formData.name} onChange={(e) => setFormData({ ...formData, name: e.target.value })} />\n            <input type="email" value={formData.email} onChange={(e) => setFormData({ ...formData, email: e.target.value })} />\n            <button type="submit">Submit</button>\n        </form>\n    );\n}\n\nexport default App;',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 5,
]);
Instruction::create([
    'title_en' => 'Test the Integration',
    'title_ar' => 'اختبار التكامل',
    'title_fr' => 'Tester l\'intégration',
    'description_en' => 'Run both the Laravel backend and React frontend to test the integration.',
    'description_ar' => 'قم بتشغيل الخلفية بلارافيل والجهة الأمامية برياكت لاختبار التكامل.',
    'description_fr' => 'Exécutez à la fois l\'API Laravel et le frontend React pour tester l\'intégration.',
    'code' => 'php artisan serve\nnpm start',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 5,
]);

// Trick 6: Real-time chat application using WebSockets in Laravel
Instruction::create([
    'title_en' => 'Install Pusher',
    'title_ar' => 'تثبيت Pusher',
    'title_fr' => 'Installer Pusher',
    'description_en' => 'Set up Pusher for real-time communication.',
    'description_ar' => 'قم بتثبيت Pusher للتواصل الفوري.',
    'description_fr' => 'Installez Pusher pour la communication en temps réel.',
    'code' => 'composer require pusher/pusher-php-server',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 6,
]);
Instruction::create([
    'title_en' => 'Configure .env for Pusher',
    'title_ar' => 'إعداد .env لـ Pusher',
    'title_fr' => 'Configurer .env pour Pusher',
    'description_en' => 'Add Pusher credentials to the .env file.',
    'description_ar' => 'أضف بيانات اعتماد Pusher إلى ملف .env.',
    'description_fr' => 'Ajoutez les identifiants Pusher au fichier .env.',
    'code' => 'PUSHER_APP_ID=your_app_id\nPUSHER_APP_KEY=your_app_key\nPUSHER_APP_SECRET=your_app_secret\nPUSHER_APP_CLUSTER=mt1',
    'language' => 'plaintext',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 6,
]);
Instruction::create([
    'title_en' => 'Set Up Broadcast Driver',
    'title_ar' => 'إعداد محرك البث',
    'title_fr' => 'Configurer le pilote de diffusion',
    'description_en' => 'Enable broadcasting in Laravel using Pusher.',
    'description_ar' => 'مكّن البث في لارافيل باستخدام Pusher.',
    'description_fr' => 'Activez la diffusion dans Laravel en utilisant Pusher.',
    'code' => 'BROADCAST_DRIVER=pusher',
    'language' => 'plaintext',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 6,
]);
Instruction::create([
    'title_en' => 'Create Event Class',
    'title_ar' => 'إنشاء فئة الحدث',
    'title_fr' => 'Créer une classe d\'événement',
    'description_en' => 'Generate an event class for broadcasting chat messages.',
    'description_ar' => 'قم بإنشاء فئة حدث لبث رسائل الدردشة.',
    'description_fr' => 'Générez une classe d\'événement pour diffuser les messages de chat.',
    'code' => 'php artisan make:event MessageSent',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 6,
]);
Instruction::create([
    'title_en' => 'Broadcast the Event',
    'title_ar' => 'بث الحدث',
    'title_fr' => 'Diffuser l\'événement',
    'description_en' => 'Broadcast the chat message event to all connected users.',
    'description_ar' => 'قم ببث حدث رسالة الدردشة إلى جميع المستخدمين المتصلين.',
    'description_fr' => 'Diffusez l\'événement de message de chat à tous les utilisateurs connectés.',
    'code' => 'public function broadcastOn()\n{\n    return new Channel("chat");\n}',
    'language' => 'php',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 6,
]);
Instruction::create([
    'title_en' => 'Frontend Integration',
    'title_ar' => 'تكامل الجهة الأمامية',
    'title_fr' => 'Intégration du frontend',
    'description_en' => 'Listen for incoming chat messages and update the UI dynamically.',
    'description_ar' => 'استمع إلى الرسائل الواردة لتحديث واجهة المستخدم ديناميكيًا.',
    'description_fr' => 'Écoutez les messages de chat entrants et mettez à jour l\'interface utilisateur dynamiquement.',
    'code' => 'Pusher.pusher.subscribe("chat").bind("message-sent", function(data) {\n    console.log(data.message);\n});',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 6,
]);
// Trick 7: Building an E-commerce Website with Laravel and React
Instruction::create([
    'title_en' => 'Set Up Laravel Backend',
    'title_ar' => 'إعداد الخلفية بلارافيل',
    'title_fr' => 'Configurer l\'API Laravel',
    'description_en' => 'Create a Laravel project to handle product data and user authentication.',
    'description_ar' => 'قم بإنشاء مشروع لارافيل لإدارة بيانات المنتجات وتسجيل الدخول للمستخدمين.',
    'description_fr' => 'Créez un projet Laravel pour gérer les données المنتجات et l\'authentification des utilisateurs.',
    'code' => 'composer create-project --prefer-dist laravel/laravel:^9.0 e-commerce',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 7,
]);
Instruction::create([
    'title_en' => 'Generate Product Model and Migration',
    'title_ar' => 'إنشاء نموذج ومigration للمنتج',
    'title_fr' => 'Générer un modèle et une migration pour le produit',
    'description_en' => 'Create a model and migration for the products table.',
    'description_ar' => 'قم بإنشاء نموذج ومigration لجدول المنتجات.',
    'description_fr' => 'Créez un modèle et une migration pour le tableau des produits.',
    'code' => 'php artisan make:model Product -m',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 7,
]);
Instruction::create([
    'title_en' => 'Define Migration Fields',
    'title_ar' => 'تحديد حقول الهجرة',
    'title_fr' => 'Définir les champs de migration',
    'description_en' => 'Add fields like name, price, description, and image_url to the products table.',
    'description_ar' => 'أضف حقولًا مثل الاسم، السعر، الوصف، والصورة إلى جدول المنتجات.',
    'description_fr' => 'Ajoutez des champs comme le nom, le prix, la description et l\'URL de l\'image au tableau des produits.',
    'code' => '$table->id();\n$table->string("name");\n$table->decimal("price", 8, 2);\n$table->text("description")->nullable();\n$table->string("image_url")->nullable();\n$table->timestamps();',
    'language' => 'php',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 7,
]);
Instruction::create([
    'title_en' => 'Run Migrations',
    'title_ar' => 'تشغيل الهجرات',
    'title_fr' => 'Exécuter les migrations',
    'description_en' => 'Apply the migrations to create the products table in the database.',
    'description_ar' => 'قم بتطبيق الهجرات لإنشاء جدول المنتجات في قاعدة البيانات.',
    'description_fr' => 'Appliquez les migrations pour créer le tableau des produits dans la base de données.',
    'code' => 'php artisan migrate',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 7,
]);
Instruction::create([
    'title_en' => 'Set Up React Frontend',
    'title_ar' => 'إعداد الجهة الأمامية برياكت',
    'title_fr' => 'Configurer le frontend React',
    'description_en' => 'Create a React app and install necessary dependencies.',
    'description_ar' => 'قم بإنشاء تطبيق React وتثبيت التبعيات اللازمة.',
    'description_fr' => 'Créez une application React et installez les dépendances nécessaires.',
    'code' => 'npx create-react-app e-commerce-frontend\nnpm install axios react-router-dom',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 7,
]);
Instruction::create([
    'title_en' => 'Build Product Listing Page',
    'title_ar' => 'إنشاء صفحة قائمة المنتجات',
    'title_fr' => 'Créer une page de liste des produits',
    'description_en' => 'Fetch product data from the Laravel API and display it in a grid layout.',
    'description_ar' => 'استرداد بيانات المنتج من API Laravel وإظهارها في تخطيط شبكة.',
    'description_fr' => 'Récupérez les données du produit depuis l\'API Laravel et affichez-les dans un format grille.',
    'code' => 'import React, { useEffect, useState } from "react";\nimport axios from "axios";\n\nfunction ProductList() {\n    const [products, setProducts] = useState([]);\n\n    useEffect(() => {\n        axios.get("/api/products").then((response) => setProducts(response.data));\n    }, []);\n\n    return (\n        <div>\n            {products.map((product) => (\n                <div key={product.id}>\n                    <h3>{product.name}</h3>\n                    <p>{product.price}</p>\n                    <img src={product.image_url} alt={product.name} />\n                </div>\n            ))}\n        </div>\n    );\n}\n\nexport default ProductList;',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 7,
]);
// Trick 8: Responsive Blog Website with HTML5, CSS3, and JavaScript
Instruction::create([
    'title_en' => 'Set Up Project Structure',
    'title_ar' => 'إعداد هيكل المشروع',
    'title_fr' => 'Configurer la structure du projet',
    'description_en' => 'Create a folder named "Blog" and add index.html, style.css, and script.js files.',
    'description_ar' => 'قم بإنشاء مجلد باسم "Blog" وإضافة ملفات index.html، style.css، وscript.js.',
    'description_fr' => 'Créez un dossier nommé "Blog" et ajoutez les fichiers index.html, style.css et script.js.',
    'code' => '',
    'language' => 'plaintext',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 8,
]);
Instruction::create([
    'title_en' => 'HTML Structure',
    'title_ar' => 'تركيبة HTML',
    'title_fr' => 'structure HTML',
    'description_en' => 'Create the basic structure of the blog website.',
    'description_ar' => 'إنشاء الهيكل الأساسي لموقع المدونة.',
    'description_fr' => 'Créer la structure de base du site de blog.',
    'code' => '<!DOCTYPE html>\n<html lang="en">\n<head>\n    <meta charset="UTF-8">\n    <meta name="viewport" content="width=device-width, initial-scale=1.0">\n    <title>My Blog</title>\n    <link rel="stylesheet" href="style.css">\n</head>\n<body>\n    <header>\n        <h1>My Blog</h1>\n    </header>\n    <main>\n        <article>\n            <h2>First Post</h2>\n            <p>This is my first blog post.</p>\n        </article>\n    </main>\n    <footer>\n        <p>&copy; 2023 My Blog</p>\n    </footer>\n    <script src="script.js"></script>\n</body>\n</html>',
    'language' => 'html',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 8,
]);
Instruction::create([
    'title_en' => 'CSS Styling',
    'title_ar' => 'واجهة CSS',
    'title_fr' => 'styles CSS',
    'description_en' => 'Style the blog website with a clean and modern design.',
    'description_ar' => 'تصميم موقع المدونة بنمط نظيف ومعاصر.',
    'description_fr' => 'Styler le site de blog avec un design propre et moderne.',
    'code' => 'body {\n    font-family: Arial, sans-serif;\n    margin: 0;\n    padding: 0;\n    background-color: #f4f4f4;\n}\nheader {\n    background: #007bff;\n    color: white;\n    text-align: center;\n    padding: 20px;\n}\nmain {\n    max-width: 800px;\n    margin: 20px auto;\n    padding: 20px;\n    background: white;\n    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);\n}\nfooter {\n    text-align: center;\n    padding: 10px;\n    background: #007bff;\n    color: white;\n}',
    'language' => 'css',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 8,
]);
Instruction::create([
    'title_en' => 'JavaScript Interactivity',
    'title_ar' => 'تفاعل جافاسكريبت',
    'title_fr' => 'Interactivité JavaScript',
    'description_en' => 'Add interactive features like dark mode toggle.',
    'description_ar' => 'أضف ميزات تفاعلية مثل تشغيل/إيقاف الوضع المظلم.',
    'description_fr' => 'Ajoutez des fonctionnalités interactives comme le basculement du mode sombre.',
    'code' => 'document.addEventListener("DOMContentLoaded", () => {\n    const toggleButton = document.createElement("button");\n    toggleButton.textContent = "Toggle Dark Mode";\n    document.body.appendChild(toggleButton);\n\n    toggleButton.addEventListener("click", () => {\n        document.body.classList.toggle("dark-mode");\n    });\n});',
    'language' => 'javascript',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 8,
]);
Instruction::create([
    'title_en' => 'Responsive Design',
    'title_ar' => 'تصميم متجاوب',
    'title_fr' => 'Design responsive',
    'description_en' => 'Make the blog website responsive for mobile devices.',
    'description_ar' => 'اجعل موقع المدونة متجاوبًا للأجهزة المحمولة.',
    'description_fr' => 'Rendez le site de blog responsive pour les appareils mobiles.',
    'code' => '@media (max-width: 600px) {\n    header h1 {\n        font-size: 1.5rem;\n    }\n    main {\n        padding: 10px;\n    }\n}',
    'language' => 'css',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 8,
]);
// Trick 9: Creating a Portfolio Website with TailwindCSS and React
Instruction::create([
    'title_en' => 'Set Up React App',
    'title_ar' => 'إعداد تطبيق React',
    'title_fr' => 'Configurer une application React',
    'description_en' => 'Create a new React app and install TailwindCSS.',
    'description_ar' => 'قم بإنشاء تطبيق React جديد وتثبيت TailwindCSS.',
    'description_fr' => 'Créez une nouvelle application React et installez TailwindCSS.',
    'code' => 'npx create-react-app portfolio\nnpm install -D tailwindcss postcss autoprefixer\nnpx tailwindcss init',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 9,
]);
Instruction::create([
    'title_en' => 'Configure TailwindCSS',
    'title_ar' => 'إعداد TailwindCSS',
    'title_fr' => 'Configurer TailwindCSS',
    'description_en' => 'Set up TailwindCSS by modifying the configuration file.',
    'description_ar' => 'قم بإعداد TailwindCSS عن طريق تعديل ملف التكوين.',
    'description_fr' => 'Configurez TailwindCSS en modifiant le fichier de configuration.',
    'code' => 'module.exports = {\n    content: [\n        "./src/**/*.{js,jsx,ts,tsx}",\n    ],\n    theme: {\n        extend: {},\n    },\n    plugins: [],\n};',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 9,
]);
Instruction::create([
    'title_en' => 'Build Home Page',
    'title_ar' => 'إنشاء الصفحة الرئيسية',
    'title_fr' => 'Créer la page d\'accueil',
    'description_en' => 'Design the home page using TailwindCSS classes.',
    'description_ar' => 'تصميم الصفحة الرئيسية باستخدام فئات TailwindCSS.',
    'description_fr' => 'Concevez la page d\'accueil à l\'aide des classes TailwindCSS.',
    'code' => 'import React from "react";\n\nfunction HomePage() {\n    return (\n        <div className="min-h-screen bg-gray-100 flex flex-col justify-center items-center">\n            <h1 className="text-4xl font-bold text-blue-600">My Portfolio</h1>\n            <p className="text-lg text-gray-600 mt-4">Welcome to my portfolio website!</p>\n        </div>\n    );\n}\n\nexport default HomePage;',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 9,
]);
Instruction::create([
    'title_en' => 'Add Projects Section',
    'title_ar' => 'إضافة قسم المشاريع',
    'title_fr' => 'Ajouter une section projets',
    'description_en' => 'Display a list of your projects with images and descriptions.',
    'description_ar' => 'عرض قائمة بمشاريعك مع الصور والوصف.',
    'description_fr' => 'Affichez une liste de vos projets avec des images et des descriptions.',
    'code' => 'function ProjectsSection() {\n    const projects = [\n        { title: "Project 1", description: "Description of project 1", image: "project1.jpg" },\n        { title: "Project 2", description: "Description of project 2", image: "project2.jpg" },\n    ];\n\n    return (\n        <div className="container mx-auto py-10">\n            <h2 className="text-3xl font-bold mb-6">My Projects</h2>\n            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">\n                {projects.map((project) => (\n                    <div key={project.title} className="bg-white shadow-md rounded-lg p-6">\n                        <img src={project.image} alt={project.title} className="w-full rounded-md mb-4" />\n                        <h3 className="text-xl font-semibold">{project.title}</h3>\n                        <p>{project.description}</p>\n                    </div>\n                ))}\n            </div>\n        </div>\n    );\n}',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 9,
]);
// Trick ID 11: Creating a Responsive Login Form with TailwindCSS
Instruction::create([
    'title_en' => 'Set Up Basic HTML Structure',
    'title_ar' => 'إعداد هيكل HTML الأساسي',
    'title_fr' => 'Configurer la structure HTML de base',
    'description_en' => 'Create a basic HTML file with a form element.',
    'description_ar' => 'إنشاء ملف HTML أساسي مع عنصر النموذج.',
    'description_fr' => 'Créez un fichier HTML de base avec un élément de formulaire.',
    'code' => '<!DOCTYPE html>\n<html lang="en">\n<head>\n    <meta charset="UTF-8">\n    <meta name="viewport" content="width=device-width, initial-scale=1.0">\n    <title>Login Form</title>\n    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">\n</head>\n<body class="bg-gray-100">\n    <div class="flex justify-center items-center min-h-screen">\n        <form class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">\n            <!-- Form fields will go here -->\n        </form>\n    </div>\n</body>\n</html>',
    'language' => 'html',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 11,
]);

Instruction::create([
    'title_en' => 'Add Input Fields',
    'title_ar' => 'إضافة حقول الإدخال',
    'title_fr' => 'Ajouter des champs de saisie',
    'description_en' => 'Add email and password input fields to the form.',
    'description_ar' => 'إضافة حقول إدخال البريد الإلكتروني وكلمة المرور إلى النموذج.',
    'description_fr' => 'Ajoutez des champs de saisie pour l\'e-mail et le mot de passe au formulaire.',
    'code' => '<div>\n    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>\n    <input type="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com">\n</div>\n<div class="mt-4">\n    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>\n    <input type="password" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">\n</div>',
    'language' => 'html',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 11,
]);

Instruction::create([
    'title_en' => 'Add Submit Button',
    'title_ar' => 'إضافة زر إرسال',
    'title_fr' => 'Ajouter un bouton d\'envoi',
    'description_en' => 'Add a submit button to the form.',
    'description_ar' => 'إضافة زر إرسال إلى النموذج.',
    'description_fr' => 'Ajoutez un bouton d\'envoi au formulaire.',
    'code' => '<div class="mt-6">\n    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">\n        Sign In\n    </button>\n</div>',
    'language' => 'html',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 11,
]);

// Trick ID 12: Building a RESTful API with Node.js and Express.js
Instruction::create([
    'title_en' => 'Initialize Node.js Project',
    'title_ar' => 'تهيئة مشروع Node.js',
    'title_fr' => 'Initialiser un projet Node.js',
    'description_en' => 'Create a new Node.js project and install necessary packages.',
    'description_ar' => 'إنشاء مشروع Node.js جديد وإعادة تثبيت الحزم اللازمة.',
    'description_fr' => 'Créer un nouveau projet Node.js et installer les paquets nécessaires.',
    'code' => 'mkdir my-api\n cd my-api\n npm init -y\n npm install express mongoose dotenv',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 12,
]);

Instruction::create([
    'title_en' => 'Set Up Express Server',
    'title_ar' => 'إعداد خادم Express',
    'title_fr' => 'Configurer le serveur Express',
    'description_en' => 'Create an Express server and define routes.',
    'description_ar' => 'إنشاء خادم Express وتحديد المسارات.',
    'description_fr' => 'Créer un serveur Express et définir les itinéraires.',
    'code' => 'const express = require("express");\nconst app = express();\nconst PORT = process.env.PORT || 3000;\n\napp.use(express.json());\n\napp.get("/", (req, res) => {\n    res.send("Hello World!");\n});\n\napp.listen(PORT, () => {\n    console.log(`Server is running on port ${PORT}`);\n});',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 12,
]);

Instruction::create([
    'title_en' => 'Connect to MongoDB',
    'title_ar' => 'الاتصال بـ MongoDB',
    'title_fr' => 'Se connecter à MongoDB',
    'description_en' => 'Connect your Express app to a MongoDB database.',
    'description_ar' => 'ربط تطبيق Express الخاص بك بقاعدة بيانات MongoDB.',
    'description_fr' => 'Connectez votre application Express à une base de données MongoDB.',
    'code' => 'const mongoose = require("mongoose");\nrequire("dotenv").config();\n\nmongoose.connect(process.env.MONGODB_URI, {\n    useNewUrlParser: true,\n    useUnifiedTopology: true,\n}).then(() => {\n    console.log("Connected to MongoDB");\n}).catch(err => {\n    console.error("Error connecting to MongoDB", err);\n});',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 12,
]);

// Trick ID 13: Deploying Laravel Applications with Docker
Instruction::create([
    'title_en' => 'Create Dockerfile',
    'title_ar' => 'إنشاء ملف Dockerfile',
    'title_fr' => 'Créer un fichier Dockerfile',
    'description_en' => 'Create a Dockerfile to define the environment for your Laravel app.',
    'description_ar' => 'إنشاء ملف Dockerfile لتحديد البيئة لنظام تطبيق Laravel الخاص بك.',
    'description_fr' => 'Créer un fichier Dockerfile pour définir l\'environnement de votre application Laravel.',
    'code' => 'FROM php:8.1-fpm\n\n# Install system dependencies\nRUN apt-get update && apt-get install -y \n    git \n    curl \n    libpng-dev \n    libonig-dev \n    libxml2-dev \n    zip \n    unzip\n\n# Clear cache\nRUN apt-get clean && rm -rf /var/lib/apt/lists/*\n\n# Install PHP extensions\nRUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd\n\n# Get latest Composer\nCOPY --from=composer:latest /usr/bin/composer /usr/bin/composer\n\n# Set working directory\nWORKDIR /var/www\n\n# Install dependencies (for production)\nCOPY composer.json composer.lock ./\nRUN composer install --no-dev --no-scripts --optimize-autoloader\n\n# Copy existing application directory contents\nCOPY . ./\n\n# Expose port 9000 and start php-fpm server\nEXPOSE 9000\nCMD ["php-fpm"]',
    'language' => 'dockerfile',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 13,
]);

Instruction::create([
    'title_en' => 'Create docker-compose.yml',
    'title_ar' => 'إنشاء ملف docker-compose.yml',
    'title_fr' => 'Créer un fichier docker-compose.yml',
    'description_en' => 'Define services in docker-compose.yml to run your Laravel app.',
    'description_ar' => 'تحديد الخدمات في ملف docker-compose.yml لتشغيل تطبيق Laravel الخاص بك.',
    'description_fr' => 'Définissez les services dans docker-compose.yml pour exécuter votre application Laravel.',
    'code' => 'version: "3.8"\nservices:\n  app:\n    build:\n      context: .\n    volumes:\n      - .:/var/www\n    ports:\n      - "9000:9000"\n    environment:\n      - APP_KEY=\n      - DB_CONNECTION=mysql\n      - DB_HOST=db\n      - DB_PORT=3306\n      - DB_DATABASE=homestead\n      - DB_USERNAME=root\n      - DB_PASSWORD=\n  db:\n    image: mysql:5.7\n    volumes:\n      - dbdata:/var/lib/mysql\n    environment:\n      - MYSQL_ROOT_PASSWORD=\n      - MYSQL_DATABASE=homestead\nvolumes:\n  dbdata:',
    'language' => 'yaml',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 13,
]);

Instruction::create([
    'title_en' => 'Run Docker Containers',
    'title_ar' => 'تشغيل عبارة Docker',
    'title_fr' => 'Exécuter les conteneurs Docker',
    'description_en' => 'Build and run your Docker containers.',
    'description_ar' => 'بناء وتشغيل عبارات Docker الخاصة بك.',
    'description_fr' => 'Construire et exécuter vos conteneurs Docker.',
    'code' => 'docker-compose up --build',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 13,
]);

// Trick ID 14: Version Control with Git and GitHub
Instruction::create([
    'title_en' => 'Initialize Git Repository',
    'title_ar' => 'تهيئة مستودع Git',
    'title_fr' => 'Initialiser un dépôt Git',
    'description_en' => 'Initialize a new Git repository in your project directory.',
    'description_ar' => 'تهيئة مستودع Git جديد في دليل المشروع الخاص بك.',
    'description_fr' => 'Initialiser un nouveau dépôt Git dans votre répertoire de projet.',
    'code' => 'git init',
    'language' => 'bash',
    'premium' => false,
    'user_id' => 4,
    'trick_id' => 14,
]);

Instruction::create([
    'title_en' => 'Add Remote Repository',
    'title_ar' => 'إضافة مستودع بعيد',
    'title_fr' => 'Ajouter un dépôt distant',
    'description_en' => 'Add a remote repository on GitHub.',
    'description_ar' => 'إضافة مستودع بعيد على GitHub.',
    'description_fr' => 'Ajoutez un dépôt distant sur GitHub.',
    'code' => 'git remote add origin https://github.com/yourusername/your-repo.git',
    'language' => 'bash',
    'premium' => false,
    'user_id' => 4,
    'trick_id' => 14,
]);

Instruction::create([
    'title_en' => 'Commit and Push Changes',
    'title_ar' => 'التزام والتزام التغييرات',
    'title_fr' => 'Engager et pousser les changements',
    'description_en' => 'Commit your changes and push them to the remote repository.',
    'description_ar' => 'التزام التغييرات وتوصيلها بالمستودع البعيد.',
    'description_fr' => 'Engagez vos modifications et poussez-les vers le dépôt distant.',
    'code' => 'git add .\ngit commit -m "Initial commit"\ngit push -u origin master',
    'language' => 'bash',
    'premium' => false,
    'user_id' => 4,
    'trick_id' => 14,
]);

// Trick ID 15: Building a Weather Application with React and OpenWeather API
Instruction::create([
    'title_en' => 'Set Up React App',
    'title_ar' => 'إعداد تطبيق React',
    'title_fr' => 'Configurer une application React',
    'description_en' => 'Create a new React app and install Axios for HTTP requests.',
    'description_ar' => 'إنشاء تطبيق React جديد وتثبيت Axios لإرسال طلبات HTTP.',
    'description_fr' => 'Créez une nouvelle application React et installez Axios pour les requêtes HTTP.',
    'code' => 'npx create-react-app weather-app\ncd weather-app\nnpm install axios',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 15,
]);

Instruction::create([
    'title_en' => 'Fetch Weather Data',
    'title_ar' => 'استرجاع بيانات الطقس',
    'title_fr' => 'Récupérer les données météorologiques',
    'description_en' => 'Fetch weather data from the OpenWeather API.',
    'description_ar' => 'استرجاع بيانات الطقس من واجهة برمجة تطبيقات OpenWeather.',
    'description_fr' => 'Récupérer les données météorologiques depuis l\'API OpenWeather.',
    'code' => 'import React, { useState } from "react";\nimport axios from "axios";\n\nfunction WeatherApp() {\n    const [weather, setWeather] = useState(null);\n    const [city, setCity] = useState("");\n\n    const fetchWeather = async () => {\n        const response = await axios.get(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=YOUR_API_KEY&units=metric`);\n        setWeather(response.data);\n    };\n\n    return (\n        <div>\n            <input type="text" value={city} onChange={(e) => setCity(e.target.value)} placeholder="Enter city" />\n            <button onClick={fetchWeather}>Get Weather</button>\n            {weather && (\n                <div>\n                    <h1>{weather.name}</h1>\n                    <p>Temperature: {weather.main.temp}°C</p>\n                    <p>Condition: {weather.weather[0].main}</p>\n                </div>\n            )}\n        </div>\n    );\n}\n\nexport default WeatherApp;',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 15,
]);

Instruction::create([
    'title_en' => 'Style the Application',
    'title_ar' => 'تنسيق التطبيق',
    'title_fr' => 'Styliser l\'application',
    'description_en' => 'Add some basic styling to your weather app.',
    'description_ar' => 'إضافة بعض التصميم الأساسي لموقعك الجوي.',
    'description_fr' => 'Ajoutez quelques styles de base à votre application météo.',
    'code' => 'import "./WeatherApp.css";\n\n/* WeatherApp.css */\ndiv {\n    text-align: center;\n    margin-top: 50px;\n}\n\ninput {\n    padding: 10px;\n    margin-right: 10px;\n}\n\nbutton {\n    padding: 10px 20px;\n    background-color: #007bff;\n    color: white;\n    border: none;\n    cursor: pointer;\n}\n\nbutton:hover {\n    background-color: #0056b3;\n}',
    'language' => 'css',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 15,
]);

// Trick ID 16: Creating a Multi-Language Website with Laravel Localization
Instruction::create([
    'title_en' => 'Install Laravel Lang Package',
    'title_ar' => 'تركيب حزمة ترجمة Laravel',
    'title_fr' => 'Installer le package de traduction Laravel',
    'description_en' => 'Install the Laravel Lang package for localization.',
    'description_ar' => 'تركيب حزمة ترجمة Laravel للترجيم.',
    'description_fr' => 'Installez le package de traduction Laravel pour la localisation.',
    'code' => 'composer require laravel-lang/lang',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 16,
]);

Instruction::create([
    'title_en' => 'Configure Supported Languages',
    'title_ar' => 'تكوين اللغات المدعومة',
    'title_fr' => 'Configurer les langues prises en charge',
    'description_en' => 'Configure supported languages in config/app.php.',
    'description_ar' => 'تكوين اللغات المدعومة في ملف config/app.php.',
    'description_fr' => 'Configurer les langues prises en charge dans config/app.php.',
    'code' => "'locale' => 'en',\n'fallback_locale' => 'en',\n'supported_locales' => ['en', 'ar', 'fr'],",
    'language' => 'php',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 16,
]);

Instruction::create([
    'title_en' => 'Create Language Files',
    'title_ar' => 'إنشاء ملفات اللغة',
    'title_fr' => 'Créer des fichiers de langue',
    'description_en' => 'Create language files for each supported language.',
    'description_ar' => 'إنشاء ملفات لغة لكل لغة مدعومة.',
    'description_fr' => 'Créer des fichiers de langue pour chaque langue prise en charge.',
    'code' => 'resources/lang/en/messages.php\nresources/lang/ar/messages.php\nresources/lang/fr/messages.php',
    'language' => 'plaintext',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 16,
]);

// Trick ID 17: Optimizing MySQL Queries for Better Performance
Instruction::create([
    'title_en' => 'Use Indexes',
    'title_ar' => 'استخدام مؤشرات',
    'title_fr' => 'Utiliser des index',
    'description_en' => 'Add indexes to frequently queried columns.',
    'description_ar' => 'إضافة مؤشرات لأعمدة يتم الاستعلام عنها بشكل متكرر.',
    'description_fr' => 'Ajoutez des index aux colonnes fréquemment interrogées.',
    'code' => 'ALTER TABLE users ADD INDEX idx_email (email);',
    'language' => 'sql',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 17,
]);

Instruction::create([
    'title_en' => 'Optimize Joins',
    'title_ar' => 'تحسين الاندماجات',
    'title_fr' => 'Optimiser les jointures',
    'description_en' => 'Ensure that joins are optimized by using appropriate keys.',
    'description_ar' => 'تأكد من أن الاندماجات محسنة باستخدام المفاتيح المناسبة.',
    'description_fr' => 'Assurez-vous que les jointures sont optimisées en utilisant les clés appropriées.',
    'code' => 'SELECT * FROM orders INNER JOIN customers ON orders.customer_id = customers.id;',
    'language' => 'sql',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 17,
]);

Instruction::create([
    'title_en' => 'Limit Result Sets',
    'title_ar' => 'حد النتائج',
    'title_fr' => 'Limiter les ensembles de résultats',
    'description_en' => 'Limit the number of results returned by queries.',
    'description_ar' => 'حد عدد النتائج التي يتم عودتها بواسطة الاستعلامات.',
    'description_fr' => 'Limitez le nombre de résultats retournés par les requêtes.',
    'code' => 'SELECT * FROM products LIMIT 10 OFFSET 20;',
    'language' => 'sql',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 17,
]);

// Trick ID 18: Designing a Modern Dashboard with TailwindCSS
Instruction::create([
    'title_en' => 'Set Up Basic HTML Structure',
    'title_ar' => 'إعداد هيكل HTML الأساسي',
    'title_fr' => 'Configurer la structure HTML de base',
    'description_en' => 'Create a basic HTML file with a dashboard layout.',
    'description_ar' => 'إنشاء ملف HTML أساسي مع تخطيط لوحة التحكم.',
    'description_fr' => 'Créez un fichier HTML de base avec un plan de tableau de bord.',
    'code' => '<!DOCTYPE html>\n<html lang="en">\n<head>\n    <meta charset="UTF-8">\n    <meta name="viewport" content="width=device-width, initial-scale=1.0">\n    <title>Modern Dashboard</title>\n    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">\n</head>\n<body class="bg-gray-100">\n    <div class="flex h-screen">\n        <!-- Sidebar -->\n        <div class="bg-gray-800 text-white w-64">\n            <!-- Sidebar content -->\n        </div>\n        <!-- Main Content -->\n        <div class="flex-1 p-4">\n            <!-- Main content -->\n        </div>\n    </div>\n</body>\n</html>',
    'language' => 'html',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 18,
]);

Instruction::create([
    'title_en' => 'Add Cards for Data Visualization',
    'title_ar' => 'إضافة بطاقات لتصور البيانات',
    'title_fr' => 'Ajouter des cartes pour la visualisation des données',
    'description_en' => 'Add cards to display data in a visually appealing way.',
    'description_ar' => 'إضافة بطاقات لعرض البيانات بطريقة جذابة بصرياً.',
    'description_fr' => 'Ajoutez des cartes pour afficher les données de manière visuellement attrayante.',
    'code' => '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">\n    <div class="bg-white p-6 rounded-lg shadow-md">\n        <h2 class="text-xl font-bold mb-4">Total Users</h2>\n        <p class="text-4xl font-bold text-blue-600">1,234</p>\n    </div>\n    <div class="bg-white p-6 rounded-lg shadow-md">\n        <h2 class="text-xl font-bold mb-4">Active Users</h2>\n        <p class="text-4xl font-bold text-green-600">876</p>\n    </div>\n    <div class="bg-white p-6 rounded-lg shadow-md">\n        <h2 class="text-xl font-bold mb-4">Inactive Users</h2>\n        <p class="text-4xl font-bold text-red-600">358</p>\n    </div>\n</div>',
    'language' => 'html',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 18,
]);

Instruction::create([
    'title_en' => 'Style the Dashboard',
    'title_ar' => 'تنسيق لوحة التحكم',
    'title_fr' => 'Styliser le tableau de bord',
    'description_en' => 'Add some custom styles to enhance the dashboard appearance.',
    'description_ar' => 'إضافة بعض الأنماط المخصصة لتحسين مظهر لوحة التحكم.',
    'description_fr' => 'Ajoutez quelques styles personnalisés pour améliorer l\'apparence du tableau de bord.',
    'code' => '/* Custom styles */\nbody {\n    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;\n}\n\n.sidebar {\n    height: 100vh;\n    overflow-y: auto;\n}\n\n.card {\n    transition: transform 0.2s ease;\n}\n\n.card:hover {\n    transform: translateY(-5px);\n}',
    'language' => 'css',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 18,
]);

// Trick ID 19: Implementing Authentication in React Applications
Instruction::create([
    'title_en' => 'Set Up React App',
    'title_ar' => 'إعداد تطبيق React',
    'title_fr' => 'Configurer une application React',
    'description_en' => 'Create a new React app and install necessary packages.',
    'description_ar' => 'إنشاء تطبيق React جديد وتثبيت الحزم اللازمة.',
    'description_fr' => 'Créer une nouvelle application React et installer les paquets nécessaires.',
    'code' => 'npx create-react-app auth-app\ncd auth-app\nnpm install react-router-dom axios',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 19,
]);

Instruction::create([
    'title_en' => 'Create Authentication Context',
    'title_ar' => 'إنشاء سياق المصادقة',
    'title_fr' => 'Créer un contexte d\'authentification',
    'description_en' => 'Create an authentication context to manage user state.',
    'description_ar' => 'إنشاء سياق للمصادقة لإدارة حالة المستخدم.',
    'description_fr' => 'Créer un contexte d\'authentification pour gérer l\'état de l\'utilisateur.',
    'code' => 'import React, { createContext, useState } from "react";\n\nexport const AuthContext = createContext();\n\nexport const AuthProvider = ({ children }) => {\n    const [user, setUser] = useState(null);\n\n    const login = (userData) => {\n        setUser(userData);\n    };\n\n    const logout = () => {\n        setUser(null);\n    };\n\n    return (\n        <AuthContext.Provider value={{ user, login, logout }}>\n            {children}\n        </AuthContext.Provider>\n    );\n};',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 19,
]);

Instruction::create([
    'title_en' => 'Protect Routes',
    'title_ar' => 'حماية المسارات',
    'title_fr' => 'Protéger les itinéraires',
    'description_en' => 'Protect routes to ensure only authenticated users can access them.',
    'description_ar' => 'حماية المسارات لضمان الوصول فقط للمستخدمين المصادق عليهم.',
    'description_fr' => 'Protégez les itinéraires pour vous assurer que seuls les utilisateurs authentifiés y ont accès.',
    'code' => 'import React, { useContext } from "react";\nimport { Redirect, Route } from "react-router-dom";\nimport { AuthContext } from "./AuthContext";\n\nconst PrivateRoute = ({ component: Component, ...rest }) => {\n    const { user } = useContext(AuthContext);\n\n    return (\n        <Route\n            {...rest}\n            render={(props) =>\n                user ? <Component {...props} /> : <Redirect to="/login" />\n            }\n        />\n    );\n};\n\nexport default PrivateRoute;',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 19,
]);

// Trick ID 20: Managing State in React with Redux
Instruction::create([
    'title_en' => 'Set Up React App',
    'title_ar' => 'إعداد تطبيق React',
    'title_fr' => 'Configurer une application React',
    'description_en' => 'Create a new React app and install Redux and React-Redux.',
    'description_ar' => 'إنشاء تطبيق React جديد وتثبيت Redux و React-Redux.',
    'description_fr' => 'Créer une nouvelle application React et installer Redux et React-Redux.',
    'code' => 'npx create-react-app redux-app\ncd redux-app\nnpm install redux react-redux',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 20,
]);

Instruction::create([
    'title_en' => 'Create Redux Store',
    'title_ar' => 'إنشاء متجر Redux',
    'title_fr' => 'Créer un magasin Redux',
    'description_en' => 'Create a Redux store to manage the state of your application.',
    'description_ar' => 'إنشاء متجر Redux لإدارة حالة تطبيقك.',
    'description_fr' => 'Créer un magasin Redux pour gérer l\'état de votre application.',
    'code' => 'import { createStore } from "redux";\nimport rootReducer from "./reducers";\n\nconst store = createStore(rootReducer);\n\nexport default store;',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 20,
]);

Instruction::create([
    'title_en' => 'Connect Redux to React',
    'title_ar' => 'ربط Redux بـ React',
    'title_fr' => 'Connecter Redux à React',
    'description_en' => 'Connect your React app to the Redux store.',
    'description_ar' => 'ربط تطبيق React الخاص بك بمتجر Redux.',
    'description_fr' => 'Connectez votre application React au magasin Redux.',
    'code' => 'import React from "react";\nimport ReactDOM from "react-dom";\nimport { Provider } from "react-redux";\nimport store from "./store";\nimport App from "./App";\n\nReactDOM.render(\n    <Provider store={store}>\n        <App />\n    </Provider>,\n    document.getElementById("root")\n);',
    'language' => 'javascript',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 20,
]);

// Trick ID 21: Creating a File Upload System with Laravel
Instruction::create([
    'title_en' => 'Set Up Laravel Project',
    'title_ar' => 'إعداد مشروع Laravel',
    'title_fr' => 'Configurer un projet Laravel',
    'description_en' => 'Create a new Laravel project and configure file storage.',
    'description_ar' => 'إنشاء مشروع Laravel جديد وتكوين تخزين الملفات.',
    'description_fr' => 'Créer un nouveau projet Laravel et configurer le stockage de fichiers.',
    'code' => 'composer create-project --prefer-dist laravel/laravel file-upload\nphp artisan storage:link',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 21,
]);

Instruction::create([
    'title_en' => 'Create Upload Form',
    'title_ar' => 'إنشاء نموذج تحميل',
    'title_fr' => 'Créer un formulaire de téléchargement',
    'description_en' => 'Create a form to upload files.',
    'description_ar' => 'إنشاء نموذج لتحميل الملفات.',
    'description_fr' => 'Créer un formulaire de téléchargement de fichiers.',
    'code' => '<form action="{{ route(\'upload\') }}" method="POST" enctype="multipart/form-data">\n    @csrf\n    <input type="file" name="file" required>\n    <button type="submit">Upload</button>\n</form>',
    'language' => 'blade',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 21,
]);

Instruction::create([
    'title_en' => 'Handle File Upload in Controller',
    'title_ar' => 'معالجة تحميل الملف في المتحكم',
    'title_fr' => 'Gérer le téléchargement de fichiers dans le contrôleur',
    'description_en' => 'Handle file upload logic in a controller method.',
    'description_ar' => 'معالجة منطق تحميل الملف في طريقة المتحكم.',
    'description_fr' => 'Gérer la logique de téléchargement de fichiers dans une méthode de contrôleur.',
    'code' => 'public function upload(Request $request)\n{\n    $request->validate([\n        \'file\' => \'required|mimes:jpg,jpeg,png,pdf|max:2048\',\n    ]);\n\n    $path = $request->file(\'file\')->store(\'uploads\', \'public\');\n\n    return back()->with(\'success\', \'File has been uploaded.\');\n}',
    'language' => 'php',
    'premium' => true,
    'user_id' => 1,
    'trick_id' => 21,
]);

// Trick ID 22: Automating Tasks with Laravel Queues
Instruction::create([
    'title_en' => 'Configure Queue Driver',
    'title_ar' => 'تكوين محرك الطوابير',
    'title_fr' => 'Configurer le pilote de file d\'attente',
    'description_en' => 'Configure a queue driver in .env file.',
    'description_ar' => 'تكوين محرك طوابير في ملف .env.',
    'description_fr' => 'Configurer un pilote de file d\'attente dans le fichier .env.',
    'code' => 'QUEUE_CONNECTION=database',
    'language' => 'plaintext',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 22,
]);

Instruction::create([
    'title_en' => 'Create Job Class',
    'title_ar' => 'إنشاء فصل الوظيفة',
    'title_fr' => 'Créer une classe de travail',
    'description_en' => 'Create a job class to handle asynchronous tasks.',
    'description_ar' => 'إنشاء فصل وظيفة لإدارة المهام غير المتزامنة.',
    'description_fr' => 'Créer une classe de travail pour gérer les tâches asynchrones.',
    'code' => 'php artisan make:job ProcessPodcast',
    'language' => 'bash',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 22,
]);

Instruction::create([
    'title_en' => 'Dispatch Job',
    'title_ar' => 'إرسال الوظيفة',
    'title_fr' => 'Envoyer le travail',
    'description_en' => 'Dispatch the job from a controller or event listener.',
    'description_ar' => 'إرسال الوظيفة من المتحكم أو مستمع الأحداث.',
    'description_fr' => 'Envoyer le travail à partir d\'un contrôleur ou d\'écouteur d\'événements.',
    'code' => 'use App\\Jobs\\ProcessPodcast;\n\nProcessPodcast::dispatch($podcast);',
    'language' => 'php',
    'premium' => true,
    'user_id' => 4,
    'trick_id' => 22,
]);
}
}
