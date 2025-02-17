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

       // trick1
Instruction::create([
    'title_en' => 'HTML structure',
    'title_ar' => 'تركيبة HTML',
    'title_fr' => 'structure HTML',
    'description_en' => 'Basic structure with a  for navigation links and a   for the burger menu.',
    'description_ar' => 'الهيكل الأساسي مع   لروابط التنقل و   لقائمة البرجر.',
    'description_fr' => 'Structure de base avec un   pour les liens de navigation et un   pour le menu burger.',
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

// trick2
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
    'language' => 'javascript',
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

// trick3
Instruction::create([
    'title_en' => 'SETUP Project',
    'title_ar' => 'إعداد المشروع',
    'title_fr' => 'Configuration du projet',
    'description_en' => "Create a folder named 'TODO Application'. Inside this folder, create the following three files:\n\t✔️index.html\n\t✔️style.css\n\t✔️script.js",
    'description_ar' => "إنشاء مجلد باسم 'TODO Application'. داخل هذا المجلد، إنشاء الملفات الثلاثة التالية:\n\t✔️index.html\n\t✔️style.css\n\t✔️script.js",
    'description_fr' => "Créez un dossier nommé 'TODO Application'. À l'intérieur de ce dossier, créez les trois fichiers suivants:\n\t✔️index.html\n\t✔️style.css\n\t✔️script.js",
    'code' => '',
    'language' => '',
    'premium' => false,
    'user_id' => 1,
    'trick_id' => 3,
]);

    }
}
