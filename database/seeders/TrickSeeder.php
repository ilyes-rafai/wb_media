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
        $nodejs = Topic::where('name', 'Node.js')->first();
        $express = Topic::where('name', 'Express.js')->first();
        $git = Topic::where('name', 'Git')->first();
        $docker = Topic::where('name', 'Docker')->first();
        $python = Topic::where('name', 'Python')->first();
        $flask = Topic::where('name', 'Flask')->first();
        $graphql = Topic::where('name', 'GraphQL')->first();
        $nextjs = Topic::where('name', 'Next.js')->first();
        $prisma = Topic::where('name', 'Prisma')->first();

        // Create tricks using the createTrickWithTopics method
        $this->createTrickWithTopics(
            1,
            'Creating a responsive navbar pure HTML5, CSS3 et JS',
            'إنشاء شريط تصفح متجاوب باستخدام HTML5 و CSS3 و JS',
            'Création d\'une barre de navigation réactive avec HTML5, CSS3 et JS',
            false,
            [$html->id, $css->id, $js->id, $vscode->id]
        );

        $this->createTrickWithTopics(
            1,
            'Setup Laravel Voyager',
            'إعداد لارافيل فوياجر',
            'Configurer Laravel Voyager',
            false,
            [$php->id, $laravel->id, $voyager->id, $mysql->id, $databases->id, $vscode->id, $xampp->id, $terminal->id]
        );

        $this->createTrickWithTopics(
            1,
            'Vanilla JavaScript TODO Application with LocalStorage',
            'تطبيق TODO بسيط باستخدام جافاسكريبت و LocalStorage',
            'Application TODO simple avec JavaScript Vanilla et LocalStorage',
            false,
            [$html->id, $css->id, $js->id, $vscode->id]
        );

        $this->createTrickWithTopics(
            1,
            'Vanilla Javascript Tic Tac Toe Game',
            'لعبة XOXO باستخدام جافاسكريبت بسيط',
            'Jeu Tic Tac Toe avec JavaScript Vanilla',
            false,
            [$html->id, $css->id, $js->id, $vscode->id]
        );

        // Creating more tricks with respective topics
        $this->createTrickWithTopics(
            1,
            'Simple CRUD operations with Laravel',
            'عمليات CRUD بسيطة باستخدام لارافيل',
            'Opérations CRUD simples avec Laravel',
            true,
            [$php->id, $laravel->id, $mysql->id, $databases->id]
        );

        $this->createTrickWithTopics(
            1,
            'Building a dynamic form with React and Laravel API',
            'إنشاء نموذج ديناميكي باستخدام React و API Laravel',
            'Créer un formulaire dynamique avec React et l\'API Laravel',
            true,
            [$react->id, $laravel->id, $databases->id]
        );

        $this->createTrickWithTopics(
            4,
            'Creating a Portfolio Website with TailwindCSS and React',
            'إنشاء موقع محفظة باستخدام TailwindCSS و React',
            'Créer un site de portfolio avec TailwindCSS et React',
            true,
            [$react->id, $ui->id, $tailwindcss->id]
        );

        $this->createTrickWithTopics(
            1,
            'Real-time Chat Application using WebSockets in Laravel',
            'تطبيق دردشة في الوقت الفعلي باستخدام WebSockets في لارافيل',
            'Application de chat en temps réel utilisant WebSockets dans Laravel',
            true,
            [$laravel->id, $databases->id]
        );

        $this->createTrickWithTopics(
            1,
            'Building an E-commerce Website with Laravel and React',
            'إنشاء موقع تجارة إلكترونية باستخدام لارافيل و React',
            'Créer un site de commerce électronique avec Laravel et React',
            true,
            [$laravel->id, $react->id, $databases->id, $ui->id]
        );

        $this->createTrickWithTopics(
            1,
            'Responsive Blog Website with HTML5, CSS3, and Javascript',
            'موقع مدونة متجاوب باستخدام HTML5 و CSS3 و جافاسكريبت',
            'Site de blog responsive avec HTML5, CSS3 et JavaScript',
            true,
            [$html->id, $css->id, $js->id]
        );

        $this->createTrickWithTopics(
            1,
            'Creating a Responsive Login Form with TailwindCSS',
            'إنشاء نموذج تسجيل دخول متجاوب باستخدام TailwindCSS',
            'Création d\'un formulaire de connexion réactif avec TailwindCSS',
            false,
            [$tailwindcss->id, $html->id, $css->id]
        );

        $this->createTrickWithTopics(
            4,
            'Deploying Laravel Applications with Docker',
            'نشر تطبيقات Laravel باستخدام Docker',
            'Déploiement d\'applications Laravel avec Docker',
            true,
            [$laravel->id, $docker->id, $php->id]
        );

        $this->createTrickWithTopics(
            4,
            'Version Control with Git and GitHub',
            'التحكم في الإصدارات باستخدام Git و GitHub',
            'Contrôle de version avec Git et GitHub',
            false,
            [$git->id]
        );

        $this->createTrickWithTopics(
            4,
            'Building a Weather Application with React and OpenWeather API',
            'إنشاء تطبيق طقس باستخدام React و OpenWeather API',
            'Créer une application météo avec React et OpenWeather API',
            true,
            [$react->id, $js->id]
        );

        $this->createTrickWithTopics(
            4,
            'Creating a Multi-Language Website with Laravel Localization',
            'إنشاء موقع متعدد اللغات باستخدام ترجمة Laravel',
            'Créer un site multilingue avec la localisation Laravel',
            true,
            [$laravel->id, $php->id]
        );

        $this->createTrickWithTopics(
            4,
            'Optimizing MySQL Queries for Better Performance',
            'تحسين استعلامات MySQL للحصول على أداء أفضل',
            'Optimisation des requêtes MySQL pour un meilleur rendement',
            true,
            [$mysql->id, $databases->id]
        );

        $this->createTrickWithTopics(
            3,
            'Designing a Modern Dashboard with TailwindCSS',
            'تصميم لوحة تحكم حديثة باستخدام TailwindCSS',
            'Conception d\'un tableau de bord moderne avec TailwindCSS',
            false,
            [$tailwindcss->id, $ui->id]
        );

        $this->createTrickWithTopics(
            4,
            'Implementing Authentication in React Applications',
            'تنفيذ المصادقة في تطبيقات React',
            'Implémenter l\'authentification dans les applications React',
            true,
            [$react->id, $js->id]
        );

        $this->createTrickWithTopics(
            2,
            'Managing State in React with Redux',
            'إدارة الحالة في React باستخدام Redux',
            'Gestion de l\'état dans React avec Redux',
            true,
            [$react->id, $js->id]
        );

        $this->createTrickWithTopics(
            1,
            'Creating a File Upload System with Laravel',
            'إنشاء نظام رفع ملفات باستخدام Laravel',
            'Création d\'un système de téléchargement de fichiers avec Laravel',
            true,
            [$laravel->id, $php->id]
        );

        $this->createTrickWithTopics(
            4,
            'Automating Tasks with Laravel Queues',
            'توفير مهام أوتوماتيكية باستخدام صفوف Laravel',
            'Automatisation des tâches avec les files d\'attente Laravel',
            true,
            [$laravel->id, $php->id]
        );

        $this->createTrickWithTopics(
            2,
            'Creating a Dynamic Dashboard with Laravel Charts',
            'إنشاء لوحة تحكم ديناميكية باستخدام Laravel Charts',
            'Créer un tableau de bord dynamique avec Laravel Charts',
            true,
            [$laravel->id, $php->id, $databases->id]
        );
    }

    /**
     * Helper method to create tricks with topics
     */
    private function createTrickWithTopics($userId, $title_en, $title_ar, $title_fr, $premium, $topicIds)
    {
        // Create the trick
        $trick = Trick::create([
            'user_id' => $userId,
            'title_en' => $title_en,
            'title_ar' => $title_ar,
            'title_fr' => $title_fr,
            'premium' => $premium,
        ]);

        // Attach topics to the trick
        $trick->topics()->attach($topicIds);

        return $trick;
    }
}