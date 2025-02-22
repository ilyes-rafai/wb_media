<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    {
        // Ensure topics are created first
        $topics = [
            'HTML5',
            'CSS3',
            'JavaScript',
            'Laravel',
            'Python',
            'Bootstrap',
            'C Language',
            'OOP',
            'Node-js',
            'Express.js',
            'Git',
            'Tailwindcss',
            'React',
        ];

        $topicIds = [];

        foreach ($topics as $topicName) {
            $topic = Topic::firstOrCreate(
                ['name' => $topicName],
                [
                    'user_id' => 4,
                    'description' => 'Description for ' . $topicName,
                    'svg' => 'img/topics/' . strtolower(str_replace(' ', '-', $topicName)) . '.png',
                ]
            );
            $topicIds[$topicName] = $topic->id;
        }

        $quizzes = [
            // C Language Quizzes
            [
                'title_en' => 'C Language Basics',
                'title_ar' => 'أساسيات لغة البرمجة C',
                'title_fr' => 'Bases du langage de programmation C',
                'description_en' => 'Test your fundamental knowledge of C programming language.',
                'description_ar' => 'اختبار معرفتك الأساسية في لغة البرمجة C.',
                'description_fr' => 'Testez vos connaissances fondamentales en langage de programmation C.',
                'difficulty' => 1,
                'topic' => $topicIds['C Language'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'Which symbol is used to end a statement in C?',
                        'title_ar' => 'ما هو الرمز المستخدم لإنهاء جملة في C؟',
                        'title_fr' => 'Quel symbole est utilisé pour terminer une instruction en C ?',
                        'options' => [
                            ['title_en' => ';', 'title_ar' => ';', 'title_fr' => ';', 'is_correct' => true],
                            ['title_en' => ':', 'title_ar' => ':', 'title_fr' => ':', 'is_correct' => false],
                            ['title_en' => '.', 'title_ar' => '.', 'title_fr' => '.', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which function is used to display output in C?',
                        'title_ar' => 'ما هي الوظيفة المستخدمة لإظهار الإخراج في C؟',
                        'title_fr' => 'Quelle fonction est utilisée pour afficher la sortie en C ?',
                        'options' => [
                            ['title_en' => 'printf()', 'title_ar' => 'printf()', 'title_fr' => 'printf()', 'is_correct' => true],
                            ['title_en' => 'cout', 'title_ar' => 'cout', 'title_fr' => 'cout', 'is_correct' => false],
                            ['title_en' => 'echo()', 'title_ar' => 'echo()', 'title_fr' => 'echo()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the correct syntax for a single-line comment in C?',
                        'title_ar' => 'ما هي بنية تعليق سطر واحد في C؟',
                        'title_fr' => 'Quelle est la syntaxe d’un commentaire sur une ligne en C ?',
                        'options' => [
                            ['title_en' => '// Comment', 'title_ar' => '// تعليق', 'title_fr' => '// Commentaire', 'is_correct' => true],
                            ['title_en' => '/* Comment */', 'title_ar' => '/* تعليق */', 'title_fr' => '/* Commentaire */', 'is_correct' => false],
                            ['title_en' => '# Comment', 'title_ar' => '# تعليق', 'title_fr' => '# Commentaire', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used to declare an integer variable in C?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لประกาศ متغير صحيح في C؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour déclarer une variable entière en C ?',
                        'options' => [
                            ['title_en' => 'int', 'title_ar' => 'int', 'title_fr' => 'int', 'is_correct' => true],
                            ['title_en' => 'float', 'title_ar' => 'float', 'title_fr' => 'float', 'is_correct' => false],
                            ['title_en' => 'char', 'title_ar' => 'char', 'title_fr' => 'char', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which operator is used for multiplication in C?',
                        'title_ar' => 'ما هو المشغل المستخدم للضرب في C؟',
                        'title_fr' => 'Quel opérateur est utilisé pour la multiplication en C ?',
                        'options' => [
                            ['title_en' => '*', 'title_ar' => '*', 'title_fr' => '*', 'is_correct' => true],
                            ['title_en' => '+', 'title_ar' => '+', 'title_fr' => '+', 'is_correct' => false],
                            ['title_en' => '/', 'title_ar' => '/', 'title_fr' => '/', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which loop is used to execute a block of code a specific number of times?',
                        'title_ar' => 'ما هو الحلقة المستخدمة لتنفيذ كتلة من التعليمات عددًا محددًا من المرات؟',
                        'title_fr' => 'Quelle boucle est utilisée pour exécuter un bloc de code un nombre spécifique de fois ?',
                        'options' => [
                            ['title_en' => 'for loop', 'title_ar' => 'حلقة for', 'title_fr' => 'boucle for', 'is_correct' => true],
                            ['title_en' => 'while loop', 'title_ar' => 'حلقة while', 'title_fr' => 'boucle while', 'is_correct' => false],
                            ['title_en' => 'do-while loop', 'title_ar' => 'حلقة do-while', 'title_fr' => 'boucle do-while', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used to exit a loop prematurely in C?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة للخروج من حلقة مبكرًا في C؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour sortir d’une boucle prématurément en C ?',
                        'options' => [
                            ['title_en' => 'break', 'title_ar' => 'break', 'title_fr' => 'break', 'is_correct' => true],
                            ['title_en' => 'continue', 'title_ar' => 'continue', 'title_fr' => 'continue', 'is_correct' => false],
                            ['title_en' => 'exit', 'title_ar' => 'exit', 'title_fr' => 'exit', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title_en' => 'C Pointers and Memory Management',
                'title_ar' => 'المؤشرات وإدارة الذاكرة في C',
                'title_fr' => 'Pointeurs et gestion de la mémoire en C',
                'description_en' => 'Test your knowledge of pointers and memory allocation in C.',
                'description_ar' => 'اختبار معرفتك المؤشرات وإدارة الذاكرة في C.',
                'description_fr' => 'Testez vos connaissances sur les pointeurs et la gestion de la mémoire en C.',
                'difficulty' => 2,
                'topic' => $topicIds['C Language'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'What does a pointer store?',
                        'title_ar' => 'ماذا تخزن مؤشر؟',
                        'title_fr' => 'Ce que stocke un pointeur ?',
                        'options' => [
                            ['title_en' => 'Memory address of a variable', 'title_ar' => 'عنوان ذاكرة لمتغير', 'title_fr' => 'Adresse mémoire d’une variable', 'is_correct' => true],
                            ['title_en' => 'Value of a variable', 'title_ar' => 'قيمة المتغير', 'title_fr' => 'Valeur d’une variable', 'is_correct' => false],
                            ['title_en' => 'Reference to a function', 'title_ar' => 'مرجع إلى وظيفة', 'title_fr' => 'Référence à une fonction', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which function is used to dynamically allocate memory in C?',
                        'title_ar' => 'ما هي الوظيفة المستخدمة لتخصيص الذاكرة الديناميكية في C؟',
                        'title_fr' => 'Quelle fonction est utilisée pour allouer dynamiquement de la mémoire en C ?',
                        'options' => [
                            ['title_en' => 'malloc()', 'title_ar' => 'malloc()', 'title_fr' => 'malloc()', 'is_correct' => true],
                            ['title_en' => 'alloc()', 'title_ar' => 'alloc()', 'title_fr' => 'alloc()', 'is_correct' => false],
                            ['title_en' => 'new()', 'title_ar' => 'new()', 'title_fr' => 'new()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which function is used to free dynamically allocated memory in C?',
                        'title_ar' => 'ما هي الوظيفة المستخدمة لتحرير الذاكرة المحجوزة ديناميكياً في C؟',
                        'title_fr' => 'Quelle fonction est utilisée pour libérer la mémoire allouée dynamiquement en C ?',
                        'options' => [
                            ['title_en' => 'free()', 'title_ar' => 'free()', 'title_fr' => 'free()', 'is_correct' => true],
                            ['title_en' => 'delete()', 'title_ar' => 'delete()', 'title_fr' => 'delete()', 'is_correct' => false],
                            ['title_en' => 'release()', 'title_ar' => 'release()', 'title_fr' => 'release()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `sizeof` operator in C?',
                        'title_ar' => 'ما هو الغرض من عامل `sizeof` في C؟',
                        'title_fr' => 'Quel est le but de l’opérateur `sizeof` en C ?',
                        'options' => [
                            ['title_en' => 'Returns the size of a data type or variable', 'title_ar' => 'يعيد حجم نوع البيانات أو المتغير', 'title_fr' => 'Retourne la taille d’un type de données ou d’une variable', 'is_correct' => true],
                            ['title_en' => 'Allocates memory for a variable', 'title_ar' => 'خصص ذاكرة لمتغير', 'title_fr' => 'Alloue de la mémoire pour une variable', 'is_correct' => false],
                            ['title_en' => 'Releases memory for a variable', 'title_ar' => 'تحرير ذاكرة لمتغير', 'title_fr' => 'Libère de la mémoire pour une variable', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title_en' => 'Advanced C Programming',
                'title_ar' => 'برمجة C المتقدمة',
                'title_fr' => 'Programmation C avancée',
                'description_en' => 'Challenge yourself with advanced C programming concepts.',
                'description_ar' => 'احدي نفسك مع مفاهيم برمجة C المتقدمة.',
                'description_fr' => 'Défiez-vous avec des concepts de programmation C avancés.',
                'difficulty' => 3,
                'topic' => $topicIds['C Language'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'Which of the following is a correct way to define a structure in C?',
                        'title_ar' => 'أي من التالي صحيح لتعريف هيكل في C؟',
                        'title_fr' => 'Quelle est la manière correcte de définir une structure en C ?',
                        'options' => [
                            ['title_en' => 'struct { int x; float y; } data;', 'title_ar' => 'struct { int x; float y; } data;', 'title_fr' => 'struct { int x; float y; } data;', 'is_correct' => false],
                            ['title_en' => 'struct data { int x; float y; };', 'title_ar' => 'struct data { int x; float y; };', 'title_fr' => 'struct data { int x; float y; };', 'is_correct' => true],
                            ['title_en' => 'define struct { int x; float y; }', 'title_ar' => 'define struct { int x; float y; }', 'title_fr' => 'define struct { int x; float y; }', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used for defining a macro in C?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لتعريف ماكرو في C؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour définir une macro en C ?',
                        'options' => [
                            ['title_en' => '#define', 'title_ar' => '#define', 'title_fr' => '#define', 'is_correct' => true],
                            ['title_en' => 'macro', 'title_ar' => 'macro', 'title_fr' => 'macro', 'is_correct' => false],
                            ['title_en' => 'const', 'title_ar' => 'const', 'title_fr' => 'const', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which of the following is a correct way to declare a union in C?',
                        'title_ar' => 'أي من الآتي صحيح لتعريف اتحاد في C؟',
                        'title_fr' => 'Quelle est la manière correcte de déclarer une union en C ?',
                        'options' => [
                            ['title_en' => 'union { int i; float f; } u;', 'title_ar' => 'union { int i; float f; } u;', 'title_fr' => 'union { int i; float f; } u;', 'is_correct' => true],
                            ['title_en' => 'struct { int i; float f; } u;', 'title_ar' => 'struct { int i; float f; } u;', 'title_fr' => 'struct { int i; float f; } u;', 'is_correct' => false],
                            ['title_en' => 'enum { int i; float f; } u;', 'title_ar' => 'enum { int i; float f; } u;', 'title_fr' => 'enum { int i; float f; } u;', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used to declare a function prototype in C?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لتعريف نموذج وظيفة في C؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour déclarer un prototype de fonction en C ?',
                        'options' => [
                            ['title_en' => 'void', 'title_ar' => 'void', 'title_fr' => 'void', 'is_correct' => false],
                            ['title_en' => 'extern', 'title_ar' => 'extern', 'title_fr' => 'extern', 'is_correct' => true],
                            ['title_en' => 'inline', 'title_ar' => 'inline', 'title_fr' => 'inline', 'is_correct' => false],
                        ],
                    ],
                ],
            ],

            // HTML5 Quizzes
            [
                'title_en' => 'HTML Advanced Elements',
                'title_ar' => 'عناصر HTML المتقدمة',
                'title_fr' => 'Éléments HTML avancés',
                'description_en' => 'Challenge yourself with advanced HTML5 elements like semantic tags and forms.',
                'description_ar' => 'احدي نفسك مع عناصر HTML5 المتقدمة مثل العلامات السياقية والأشكال.',
                'description_fr' => 'Défiez-vous avec des éléments HTML5 avancés comme les balises sémانتiques et les formulaires.',
                'difficulty' => 3,
                'topic' => $topicIds['HTML5'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'Which HTML5 tag represents a section of navigation links?',
                        'title_ar' => 'ما هو علامة HTML5 تمثل قسمًا من روابط التنقل؟',
                        'title_fr' => 'Quelle balise HTML5 représente une section de liens de navigation ?',
                        'options' => [
                            ['title_en' => '<nav>', 'title_ar' => '<nav>', 'title_fr' => '<nav>', 'is_correct' => true],
                            ['title_en' => '<header>', 'title_ar' => '<header>', 'title_fr' => '<header>', 'is_correct' => false],
                            ['title_en' => '<footer>', 'title_ar' => '<footer>', 'title_fr' => '<footer>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `<figure>` tag in HTML5?',
                        'title_ar' => 'ما هو الغرض من علامة `<figure>` في HTML5؟',
                        'title_fr' => 'Quel est le but de la balise `<figure>` en HTML5 ?',
                        'options' => [
                            ['title_en' => 'To group media elements like images and captions', 'title_ar' => 'لجمع عناصر الوسائط مثل الصور والCaptions', 'title_fr' => 'Pour regrouper des éléments multimédias comme des images et des légendes', 'is_correct' => true],
                            ['title_en' => 'To display tabular data', 'title_ar' => 'لعرض البيانات الجدولية', 'title_fr' => 'Pour afficher des données tabulaires', 'is_correct' => false],
                            ['title_en' => 'To define a section of text', 'title_ar' => 'لتعريف قسم نصي', 'title_fr' => 'Pour définir une section de texte', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to define a section of content that is slightly apart from the main content?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لتعريف قسم من المحتوى يبعد قليلاً عن المحتوى الرئيسي؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour définir une section de contenu légèreماً سeparée du contenu principal ?',
                        'options' => [
                            ['title_en' => '<aside>', 'title_ar' => '<aside>', 'title_fr' => '<aside>', 'is_correct' => true],
                            ['title_en' => '<main>', 'title_ar' => '<main>', 'title_fr' => '<main>', 'is_correct' => false],
                            ['title_en' => '<article>', 'title_ar' => '<article>', 'title_fr' => '<article>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `<article>` tag in HTML5?',
                        'title_ar' => 'ما هو الغرض من علامة `<article>` في HTML5؟',
                        'title_fr' => 'Quel est le but de la balise `<article>` en HTML5 ?',
                        'options' => [
                            ['title_en' => 'To represent a self-contained piece of content', 'title_ar' => 'لتمثيل قطعة محتوى مستقلة', 'title_fr' => 'Pour représenter une pièce de contenu indépendante', 'is_correct' => true],
                            ['title_en' => 'To define a section of navigation links', 'title_ar' => 'لتعريف قسم من روابط التنقل', 'title_fr' => 'Pour définir une section de liens de navigation', 'is_correct' => false],
                            ['title_en' => 'To group media elements like images and captions', 'title_ar' => 'لجمع عناصر الوسائط مثل الصور والCaptions', 'title_fr' => 'Pour regrouper des éléments multimédias comme des images et des légendes', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to define a section of content that is independent from the main content?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لتعريف قسم من المحتوى المستقل عن المحتوى الرئيسي؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour définir une section de contenu indépendante du contenu الرئيسي ?',
                        'options' => [
                            ['title_en' => '<section>', 'title_ar' => '<section>', 'title_fr' => '<section>', 'is_correct' => false],
                            ['title_en' => '<article>', 'title_ar' => '<article>', 'title_fr' => '<article>', 'is_correct' => true],
                            ['title_en' => '<main>', 'title_ar' => '<main>', 'title_fr' => '<main>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `<main>` tag in HTML5?',
                        'title_ar' => 'ما هو الغرض من علامة `<main>` في HTML5؟',
                        'title_fr' => 'Quel est le but de la balise `<main>` en HTML5 ?',
                        'options' => [
                            ['title_en' => 'To represent the dominant content of the document', 'title_ar' => 'لتمثيل المحتوى الرئيسي للمستند', 'title_fr' => 'Pour représenter le contenu dominant du document', 'is_correct' => true],
                            ['title_en' => 'To define a section of navigation links', 'title_ar' => 'لتعريف قسم من روابط التنقل', 'title_fr' => 'Pour définir une section de liens de navigation', 'is_correct' => false],
                            ['title_en' => 'To group media elements like images and captions', 'title_ar' => 'لجمع عناصر الوسائط مثل الصور والCaptions', 'title_fr' => 'Pour regrouper des éléments multimédias مثل الصور والCaptions', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to define a section of content that is related to the main content but can be distributed independently?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لتعريف قسم من المحتوى ذات صلة بالمحتوى الرئيسي ولكن يمكن توزيعه بشكل مستقل؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour définir une section de contenu liée au contenu principal mais qui peut être distribuée indépendamment ?',
                        'options' => [
                            ['title_en' => '<aside>', 'title_ar' => '<aside>', 'title_fr' => '<aside>', 'is_correct' => true],
                            ['title_en' => '<main>', 'title_ar' => '<main>', 'title_fr' => '<main>', 'is_correct' => false],
                            ['title_en' => '<article>', 'title_ar' => '<article>', 'title_fr' => '<article>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to define a progress bar?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لتعريف شريط التقدم؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour définir une barre de progression ?',
                        'options' => [
                            ['title_en' => '<progress>', 'title_ar' => '<progress>', 'title_fr' => '<progress>', 'is_correct' => true],
                            ['title_en' => '<meter>', 'title_ar' => '<meter>', 'title_fr' => '<mètre>', 'is_correct' => false],
                            ['title_en' => '<bar>', 'title_ar' => '<bar>', 'title_fr' => '<barre>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `<time>` tag in HTML5?',
                        'title_ar' => 'ما هو الغرض من علامة `<time>` في HTML5؟',
                        'title_fr' => 'Quel est le but de la balise `<time>` en HTML5 ?',
                        'options' => [
                            ['title_en' => 'To represent a specific period in time', 'title_ar' => 'لتمثيل فترة زمنية محددة', 'title_fr' => 'Pour représenter une période spécifique dans le temps', 'is_correct' => true],
                            ['title_en' => 'To display a countdown timer', 'title_ar' => 'لعرض مؤقت العد التنازلي', 'title_fr' => 'Pour afficher un minuteur de compte à rebours', 'is_correct' => false],
                            ['title_en' => 'To format text as bold', 'title_ar' => 'لتنسيق النص كسميك', 'title_fr' => 'Pour formater le texte en gras', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which attribute is used to specify that an input field must be filled out before submitting a form?',
                        'title_ar' => 'ما هو السمة المستخدمة لتحديد أن حقل الإدخال يجب تعبئته قبل إرسال النموذج؟',
                        'title_fr' => 'Quel attribut est utilisé pour spécifier qu’un champ de saisie doit être rempli avant d’envoyer un formulaire ?',
                        'options' => [
                            ['title_en' => 'required', 'title_ar' => 'مطلوب', 'title_fr' => 'obligatoire', 'is_correct' => true],
                            ['title_en' => 'mandatory', 'title_ar' => 'إجباري', 'title_fr' => 'impératif', 'is_correct' => false],
                            ['title_en' => 'fill', 'title_ar' => 'املأ', 'title_fr' => 'remplir', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to embed a video?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لإدراج فيديو؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour intégrer une vidéo ?',
                        'options' => [
                            ['title_en' => '<video>', 'title_ar' => '<video>', 'title_fr' => '<vidéo>', 'is_correct' => true],
                            ['title_en' => '<embed>', 'title_ar' => '<embed>', 'title_fr' => '<insérer>', 'is_correct' => false],
                            ['title_en' => '<media>', 'title_ar' => '<media>', 'title_fr' => '<média>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which attribute is used to provide alternative text for an image if it cannot be displayed?',
                        'title_ar' => 'ما هو السمة المستخدمة لتوفير نص بديل للصورة إذا لم يمكن عرضها؟',
                        'title_fr' => 'Quel attribut est utilisé pour fournir un texte alternatif pour une image si elle ne peut pas être affichée ?',
                        'options' => [
                            ['title_en' => 'alt', 'title_ar' => 'بدلاً', 'title_fr' => 'alt', 'is_correct' => true],
                            ['title_en' => 'src', 'title_ar' => 'مصدر', 'title_fr' => 'source', 'is_correct' => false],
                            ['title_en' => 'text', 'title_ar' => 'نص', 'title_fr' => 'texte', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to define a set of navigation links?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لتعريف مجموعة من روابط التنقل؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour définir un ensemble de liens de navigation ?',
                        'options' => [
                            ['title_en' => '<nav>', 'title_ar' => '<nav>', 'title_fr' => '<navigation>', 'is_correct' => true],
                            ['title_en' => '<menu>', 'title_ar' => '<menu>', 'title_fr' => '<menu>', 'is_correct' => false],
                            ['title_en' => '<ul>', 'title_ar' => '<ul>', 'title_fr' => '<ul>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to group content that should be hidden until it is revealed by user interaction?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لجمع المحتوى الذي يجب إخفاؤه حتى يتم كشفه بواسطة تفاعل المستخدم؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour regrouper du contenu qui doit être masqué jusqu’à ce qu’il soit révélé par l’interaction de l’utilisateur ?',
                        'options' => [
                            ['title_en' => '<details>', 'title_ar' => '<details>', 'title_fr' => '<détails>', 'is_correct' => true],
                            ['title_en' => '<hidden>', 'title_ar' => '<hidden>', 'title_fr' => '<caché>', 'is_correct' => false],
                            ['title_en' => '<collapse>', 'title_ar' => '<collapse>', 'title_fr' => '<effondrer>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 attribute is used to specify that an element should have focus when the page loads?',
                        'title_ar' => 'ما هو السمة HTML5 المستخدمة لتحديد أن عنصرًا يجب أن يكون له التركيز عند تحميل الصفحة؟',
                        'title_fr' => 'Quel attribut HTML5 est utilisé pour spécifier qu’un élément doit avoir le focus lorsque la page se charge ?',
                        'options' => [
                            ['title_en' => 'autofocus', 'title_ar' => 'تلقائي التركيز', 'title_fr' => 'focus automatique', 'is_correct' => true],
                            ['title_en' => 'focus', 'title_ar' => 'تركيز', 'title_fr' => 'focus', 'is_correct' => false],
                            ['title_en' => 'autohighlight', 'title_ar' => 'تلقائي الظل', 'title_fr' => 'surlignage automatique', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to define a dialog box or popup?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لتعريف صندوق الحوار أو المنبثقة؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour définir une boîte de dialogue ou une fenêtre contextuelle ?',
                        'options' => [
                            ['title_en' => '<dialog>', 'title_ar' => '<dialog>', 'title_fr' => '<dialogue>', 'is_correct' => true],
                            ['title_en' => '<popup>', 'title_ar' => '<popup>', 'title_fr' => '<pop-up>', 'is_correct' => false],
                            ['title_en' => '<modal>', 'title_ar' => '<modal>', 'title_fr' => '<modale>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 attribute is used to define the minimum value for an input field?',
                        'title_ar' => 'ما هو السمة HTML5 المستخدمة لتحديد القيمة الدنيا لحقل الإدخال؟',
                        'title_fr' => 'Quel attribut HTML5 est utilisé pour définir la valeur minimale pour un champ de saisie ?',
                        'options' => [
                            ['title_en' => 'min', 'title_ar' => 'الأدنى', 'title_fr' => 'minimum', 'is_correct' => true],
                            ['title_en' => 'least', 'title_ar' => 'أقل', 'title_fr' => 'moins', 'is_correct' => false],
                            ['title_en' => 'start', 'title_ar' => 'ابدأ', 'title_fr' => 'commencer', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to define a caption for a figure?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لتعريف تسمية لشكل؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour définir une légende pour une figure ?',
                        'options' => [
                            ['title_en' => '<figcaption>', 'title_ar' => '<figcaption>', 'title_fr' => '<légende>', 'is_correct' => true],
                            ['title_en' => '<caption>', 'title_ar' => '<caption>', 'title_fr' => '<légende>', 'is_correct' => false],
                            ['title_en' => '<label>', 'title_ar' => '<label>', 'title_fr' => '<étiquette>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 attribute is used to specify that a form should not be validated before submission?',
                        'title_ar' => 'ما هو السمة HTML5 المستخدمة لتحديد أن النموذج لا ينبغي تحققه قبل الإرسال؟',
                        'title_fr' => 'Quel attribut HTML5 est utilisé pour spécifier qu’un formulaire ne doit pas être validé avant l’envoi ?',
                        'options' => [
                            ['title_en' => 'novalidate', 'title_ar' => 'لا تحقق', 'title_fr' => 'ne pas valider', 'is_correct' => true],
                            ['title_en' => 'skipvalidation', 'title_ar' => 'تخطي التحقق', 'title_fr' => 'sauter validation', 'is_correct' => false],
                            ['title_en' => 'disablevalidation', 'title_ar' => 'تعطيل التحقق', 'title_fr' => 'désactiver validation', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to define a footer for a document or section?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لتعريف تذييل المستند أو القسم؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour définir un pied de page pour un document ou une section ?',
                        'options' => [
                            ['title_en' => '<footer>', 'title_ar' => '<footer>', 'title_fr' => '<pied-de-page>', 'is_correct' => true],
                            ['title_en' => '<end>', 'title_ar' => '<end>', 'title_fr' => '<fin>', 'is_correct' => false],
                            ['title_en' => '<bottom>', 'title_ar' => '<bottom>', 'title_fr' => '<bas>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to define a header for a document or section?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لتعريف رأس المستند أو القسم؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour définir un en-tête pour un document ou une section ?',
                        'options' => [
                            ['title_en' => '<header>', 'title_ar' => '<header>', 'title_fr' => '<en-tête>', 'is_correct' => true],
                            ['title_en' => '<top>', 'title_ar' => '<top>', 'title_fr' => '<haut>', 'is_correct' => false],
                            ['title_en' => '<begin>', 'title_ar' => '<begin>', 'title_fr' => '<début>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 attribute is used to specify the type of an input field?',
                        'title_ar' => 'ما هو السمة HTML5 المستخدمة لتحديد نوع حقل الإدخال؟',
                        'title_fr' => 'Quel attribut HTML5 est utilisé pour spécifier le type d’un champ de saisie ?',
                        'options' => [
                            ['title_en' => 'type', 'title_ar' => 'نوع', 'title_fr' => 'type', 'is_correct' => true],
                            ['title_en' => 'kind', 'title_ar' => 'نوع', 'title_fr' => 'genre', 'is_correct' => false],
                            ['title_en' => 'category', 'title_ar' => 'فئة', 'title_fr' => 'catégorie', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 tag is used to define a block of code?',
                        'title_ar' => 'ما هو علامة HTML5 المستخدمة لتعريف كتلة من التعليمات البرمجية؟',
                        'title_fr' => 'Quelle balise HTML5 est utilisée pour définir un bloc de code ?',
                        'options' => [
                            ['title_en' => '<code>', 'title_ar' => '<code>', 'title_fr' => '<code>', 'is_correct' => true],
                            ['title_en' => '<pre>', 'title_ar' => '<pre>', 'title_fr' => '<pré>', 'is_correct' => false],
                            ['title_en' => '<script>', 'title_ar' => '<script>', 'title_fr' => '<script>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which HTML5 attribute is used to specify the URL of a linked resource?',
                        'title_ar' => 'ما هو السمة HTML5 المستخدمة لتحديد عنوان URL للمورد المرتبط؟',
                        'title_fr' => 'Quel attribut HTML5 est utilisé pour spécifier l’URL d’une ressource liée ?',
                        'options' => [
                            ['title_en' => 'href', 'title_ar' => 'href', 'title_fr' => 'href', 'is_correct' => true],
                            ['title_en' => 'src', 'title_ar' => 'src', 'title_fr' => 'src', 'is_correct' => false],
                            ['title_en' => 'link', 'title_ar' => 'link', 'title_fr' => 'lien', 'is_correct' => false],
                        ],
                    ],
                ],
            ],

            // CSS3 Quizzes
            [
                'title_en' => 'CSS Grid & Flexbox',
                'title_ar' => 'شبكة CSS وـ Flexbox',
                'title_fr' => 'Grille CSS et Flexbox',
                'description_en' => 'Learn about modern layout techniques in CSS.',
                'description_ar' => 'تعلم عن تقنيات التخطيط الحديثة في CSS.',
                'description_fr' => 'Apprenez sur les techniques de mise en page modernes en CSS.',
                'difficulty' => 2,
                'topic' => $topicIds['CSS3'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'Which CSS property is used to create a flex container?',
                        'title_ar' => 'ما هي الخاصية التي تستخدم لإنشاء حاوية مرنة؟',
                        'title_fr' => 'Quelle propriété CSS est utilisée pour créer un conteneur flexible ?',
                        'options' => [
                            ['title_en' => 'display: flex;', 'title_ar' => 'display: flex;', 'title_fr' => 'display: flex;', 'is_correct' => true],
                            ['title_en' => 'position: relative;', 'title_ar' => 'position: relative;', 'title_fr' => 'position: relative;', 'is_correct' => false],
                            ['title_en' => 'grid-template:', 'title_ar' => 'grid-template:', 'title_fr' => 'grid-template:', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What does the `align-items` property do in Flexbox?',
                        'title_ar' => 'ماذا تقوم به الخاصية `align-items` في Flexbox؟',
                        'title_fr' => 'Que fait la propriété `align-items` dans Flexbox ?',
                        'options' => [
                            ['title_en' => 'Aligns items vertically in the flex container', 'title_ar' => 'محاذاة العناصر عموديًا في الحاوية المرنة', 'title_fr' => 'Aligne les éléments verticalement dans le conteneur flexible', 'is_correct' => true],
                            ['title_en' => 'Sets the background color of flex items', 'title_ar' => 'تعيين لون خلفية عناصر الفلكس', 'title_fr' => 'Définit la couleur d’arrière-plan des éléments flex', 'is_correct' => false],
                            ['title_en' => 'Controls the width of flex items', 'title_ar' => 'تحكم في عرض عناصر الفلكس', 'title_fr' => 'Contrôle la largeur des éléments flex', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which CSS property is used to align items horizontally in a flex container?',
                        'title_ar' => 'ما هي الخاصية التي تستخدم لمحاذاة العناصر أفقيًا في حاوية الفلكس؟',
                        'title_fr' => 'Quelle propriété CSS est utilisée pour aligner les éléments horizontalement dans un conteneur flexible ?',
                        'options' => [
                            ['title_en' => 'justify-content', 'title_ar' => 'justify-content', 'title_fr' => 'justify-content', 'is_correct' => true],
                            ['title_en' => 'align-items', 'title_ar' => 'align-items', 'title_fr' => 'align-items', 'is_correct' => false],
                            ['title_en' => 'flex-direction', 'title_ar' => 'flex-direction', 'title_fr' => 'flex-direction', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `grid-template-columns` property in CSS Grid?',
                        'title_ar' => 'ما هو الغرض من الخاصية `grid-template-columns` في شبكة CSS؟',
                        'title_fr' => 'Quel est le but de la propriété `grid-template-columns` en grille CSS ?',
                        'options' => [
                            ['title_en' => 'Defines the size of columns in a grid', 'title_ar' => 'يحدد حجم الأعمدة في الشبكة', 'title_fr' => 'Définit la taille des colonnes dans une grille', 'is_correct' => true],
                            ['title_en' => 'Defines the size of rows in a grid', 'title_ar' => 'يحدد حجم الصفوف في الشبكة', 'title_fr' => 'Définit la taille des lignes dans une grille', 'is_correct' => false],
                            ['title_en' => 'Sets the background color of grid items', 'title_ar' => 'تعيين لون خلفية عناصر الشبكة', 'title_fr' => 'Définit la couleur d’arrière-plan des éléments de grille', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which CSS property is used to specify the gap between grid items?',
                        'title_ar' => 'ما هي الخاصية التي تستخدم لتحديد الفجوة بين عناصر الشبكة؟',
                        'title_fr' => 'Quelle propriété CSS est utilisée pour spécifier l’espacement entre les éléments de grille ?',
                        'options' => [
                            ['title_en' => 'gap', 'title_ar' => 'gap', 'title_fr' => 'gap', 'is_correct' => true],
                            ['title_en' => 'margin', 'title_ar' => 'margin', 'title_fr' => 'margin', 'is_correct' => false],
                            ['title_en' => 'padding', 'title_ar' => 'padding', 'title_fr' => 'padding', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What does the `flex-wrap` property do in Flexbox?',
                        'title_ar' => 'ماذا تقوم به الخاصية `flex-wrap` في Flexbox؟',
                        'title_fr' => 'Que fait la propriété `flex-wrap` dans Flexbox ?',
                        'options' => [
                            ['title_en' => 'Allows items to wrap onto multiple lines', 'title_ar' => 'يسمح للأعناصر بالتحليق على عدة أسطر', 'title_fr' => 'Permet aux éléments de passer sur plusieurs lignes', 'is_correct' => true],
                            ['title_en' => 'Aligns items vertically in the flex container', 'title_ar' => 'محاذاة العناصر عموديًا في الحاوية المرنة', 'title_fr' => 'Aligne les éléments verticalement dans le conteneur flexible', 'is_correct' => false],
                            ['title_en' => 'Controls the width of flex items', 'title_ar' => 'تحكم في عرض عناصر الفلكس', 'title_fr' => 'Contrôle la largeur des éléments flex', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which CSS property is used to define the order of flex items?',
                        'title_ar' => 'ما هي الخاصية التي تستخدم لتحديد ترتيب عناصر الفلكس؟',
                        'title_fr' => 'Quelle propriété CSS est utilisée pour définir l’ordre des éléments flex ?',
                        'options' => [
                            ['title_en' => 'order', 'title_ar' => 'order', 'title_fr' => 'order', 'is_correct' => true],
                            ['title_en' => 'flex-direction', 'title_ar' => 'flex-direction', 'title_fr' => 'flex-direction', 'is_correct' => false],
                            ['title_en' => 'align-items', 'title_ar' => 'align-items', 'title_fr' => 'align-items', 'is_correct' => false],
                        ],
                    ],  
                    [
                        'title_en' => 'Which CSS property is used to create a flex container?',
                        'title_ar' => 'ما هي الخاصية التي تستخدم لإنشاء حاوية مرنة؟',
                        'title_fr' => 'Quelle propriété CSS est utilisée pour créer un conteneur flexible ?',
                        'options' => [
                            ['title_en' => 'display: flex;', 'title_ar' => 'display: flex;', 'title_fr' => 'display: flex;', 'is_correct' => true],
                            ['title_en' => 'position: relative;', 'title_ar' => 'position: relative;', 'title_fr' => 'position: relative;', 'is_correct' => false],
                            ['title_en' => 'grid-template:', 'title_ar' => 'grid-template:', 'title_fr' => 'grid-template:', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What does the `align-items` property do in Flexbox?',
                        'title_ar' => 'ماذا تقوم به الخاصية `align-items` في Flexbox؟',
                        'title_fr' => 'Que fait la propriété `align-items` dans Flexbox ?',
                        'options' => [
                            ['title_en' => 'Aligns items vertically in the flex container', 'title_ar' => 'محاذاة العناصر عموديًا في الحاوية المرنة', 'title_fr' => 'Aligne les éléments verticalement dans le conteneur flexible', 'is_correct' => true],
                            ['title_en' => 'Sets the background color of flex items', 'title_ar' => 'تعيين لون خلفية عناصر الفلكس', 'title_fr' => 'Définit la couleur d’arrière-plan des éléments flex', 'is_correct' => false],
                            ['title_en' => 'Controls the width of flex items', 'title_ar' => 'تحكم في عرض عناصر الفلكس', 'title_fr' => 'Contrôle la largeur des éléments flex', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which CSS property is used to align items horizontally in a flex container?',
                        'title_ar' => 'ما هي الخاصية التي تستخدم لمحاذاة العناصر أفقيًا في حاوية الفلكس؟',
                        'title_fr' => 'Quelle propriété CSS est utilisée pour aligner les éléments horizontalement dans un conteneur flexible ?',
                        'options' => [
                            ['title_en' => 'justify-content', 'title_ar' => 'justify-content', 'title_fr' => 'justify-content', 'is_correct' => true],
                            ['title_en' => 'align-items', 'title_ar' => 'align-items', 'title_fr' => 'align-items', 'is_correct' => false],
                            ['title_en' => 'flex-direction', 'title_ar' => 'flex-direction', 'title_fr' => 'flex-direction', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `grid-template-columns` property in CSS Grid?',
                        'title_ar' => 'ما هو الغرض من الخاصية `grid-template-columns` في شبكة CSS؟',
                        'title_fr' => 'Quel est le but de la propriété `grid-template-columns` en grille CSS ?',
                        'options' => [
                            ['title_en' => 'Defines the size of columns in a grid', 'title_ar' => 'يحدد حجم الأعمدة في الشبكة', 'title_fr' => 'Définit la taille des colonnes dans une grille', 'is_correct' => true],
                            ['title_en' => 'Defines the size of rows in a grid', 'title_ar' => 'يحدد حجم الصفوف في الشبكة', 'title_fr' => 'Définit la taille des lignes dans une grille', 'is_correct' => false],
                            ['title_en' => 'Sets the background color of grid items', 'title_ar' => 'تعيين لون خلفية عناصر الشبكة', 'title_fr' => 'Définit la couleur d’arrière-plan des éléments de grille', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which CSS property is used to specify the gap between grid items?',
                        'title_ar' => 'ما هي الخاصية التي تستخدم لتحديد الفجوة بين عناصر الشبكة؟',
                        'title_fr' => 'Quelle propriété CSS est utilisée pour spécifier l’espacement entre les éléments de grille ?',
                        'options' => [
                            ['title_en' => 'gap', 'title_ar' => 'gap', 'title_fr' => 'gap', 'is_correct' => true],
                            ['title_en' => 'margin', 'title_ar' => 'margin', 'title_fr' => 'margin', 'is_correct' => false],
                            ['title_en' => 'padding', 'title_ar' => 'padding', 'title_fr' => 'padding', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What does the `flex-wrap` property do in Flexbox?',
                        'title_ar' => 'ماذا تقوم به الخاصية `flex-wrap` في Flexbox؟',
                        'title_fr' => 'Que fait la propriété `flex-wrap` dans Flexbox ?',
                        'options' => [
                            ['title_en' => 'Allows items to wrap onto multiple lines', 'title_ar' => 'يسمح للأعناصر بالتحليق على عدة أسطر', 'title_fr' => 'Permet aux éléments de passer sur plusieurs lignes', 'is_correct' => true],
                            ['title_en' => 'Aligns items vertically in the flex container', 'title_ar' => 'محاذاة العناصر عموديًا في الحاوية المرنة', 'title_fr' => 'Aligne les éléments verticalement dans le conteneur flexible', 'is_correct' => false],
                            ['title_en' => 'Controls the width of flex items', 'title_ar' => 'تحكم في عرض عناصر الفلكس', 'title_fr' => 'Contrôle la largeur des éléments flex', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which CSS property is used to define the order of flex items?',
                        'title_ar' => 'ما هي الخاصية التي تستخدم لتحديد ترتيب عناصر الفلكس؟',
                        'title_fr' => 'Quelle propriété CSS est utilisée pour définir l’ordre des éléments flex ?',
                        'options' => [
                            ['title_en' => 'order', 'title_ar' => 'order', 'title_fr' => 'order', 'is_correct' => true],
                            ['title_en' => 'flex-direction', 'title_ar' => 'flex-direction', 'title_fr' => 'flex-direction', 'is_correct' => false],
                            ['title_en' => 'align-items', 'title_ar' => 'align-items', 'title_fr' => 'align-items', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            //JAVASCRIPT QUIZZES
            [
                'title_en' => 'JavaScript Basics',
                'title_ar' => 'أساسيات لغة JavaScript',
                'title_fr' => 'Bases du langage JavaScript',
                'description_en' => 'Test your fundamental knowledge of JavaScript.',
                'description_ar' => 'اختبار معرفتك الأساسية في لغة JavaScript.',
                'description_fr' => 'Testez vos connaissances fondamentales en langage JavaScript.',
                'difficulty' => 1,
                'topic' => $topicIds['JavaScript'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'Which keyword is used to declare a variable in JavaScript?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لتعريف متغير في JavaScript؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour déclarer une variable en JavaScript ?',
                        'options' => [
                            ['title_en' => 'var', 'title_ar' => 'var', 'title_fr' => 'var', 'is_correct' => true],
                            ['title_en' => 'let', 'title_ar' => 'let', 'title_fr' => 'let', 'is_correct' => false],
                            ['title_en' => 'const', 'title_ar' => 'const', 'title_fr' => 'const', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'How do you write a comment in JavaScript?',
                        'title_ar' => 'كيفية كتابة تعليق في JavaScript؟',
                        'title_fr' => 'Comment écrire un commentaire en JavaScript ?',
                        'options' => [
                            ['title_en' => '// This is a comment', 'title_ar' => '// هذا تعليق', 'title_fr' => '// Ceci est un commentaire', 'is_correct' => true],
                            ['title_en' => '/* This is a comment */', 'title_ar' => '/* هذا تعليق */', 'title_fr' => '/* Ceci est un commentaire */', 'is_correct' => true],
                            ['title_en' => '# This is a comment', 'title_ar' => '# هذا تعليق', 'title_fr' => '# Ceci est un commentaire', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to add an element to the end of an array in JavaScript?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإضافة عنصر إلى نهاية المصفوفة في JavaScript؟',
                        'title_fr' => 'Quelle méthode est utilisée pour ajouter un élément à la fin d’un tableau en JavaScript ?',
                        'options' => [
                            ['title_en' => 'push()', 'title_ar' => 'push()', 'title_fr' => 'push()', 'is_correct' => true],
                            ['title_en' => 'pop()', 'title_ar' => 'pop()', 'title_fr' => 'pop()', 'is_correct' => false],
                            ['title_en' => 'shift()', 'title_ar' => 'shift()', 'title_fr' => 'shift()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which operator is used to concatenate strings in JavaScript?',
                        'title_ar' => 'ما هو المشغل المستخدم لدمج السلاسل في JavaScript؟',
                        'title_fr' => 'Quel opérateur est utilisé pour concaténer des chaînes en JavaScript ?',
                        'options' => [
                            ['title_en' => '+', 'title_ar' => '+', 'title_fr' => '+', 'is_correct' => true],
                            ['title_en' => '&', 'title_ar' => '&', 'title_fr' => '&', 'is_correct' => false],
                            ['title_en' => '||', 'title_ar' => '||', 'title_fr' => '||', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which function is used to convert a string to an integer in JavaScript?',
                        'title_ar' => 'ما هي الوظيفة المستخدمة لتحويل السلسلة إلى عدد صحيح في JavaScript؟',
                        'title_fr' => 'Quelle fonction est utilisée pour convertir une chaîne en entier en JavaScript ?',
                        'options' => [
                            ['title_en' => 'parseInt()', 'title_ar' => 'parseInt()', 'title_fr' => 'parseInt()', 'is_correct' => true],
                            ['title_en' => 'parseFloat()', 'title_ar' => 'parseFloat()', 'title_fr' => 'parseFloat()', 'is_correct' => false],
                            ['title_en' => 'Number()', 'title_ar' => 'Number()', 'title_fr' => 'Number()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which loop is used to iterate over the properties of an object in JavaScript?',
                        'title_ar' => 'ما هي الحلقة المستخدمة للتكرار على خصائص الكائن في JavaScript؟',
                        'title_fr' => 'Quelle boucle est utilisée pour itérer sur les propriétés d’un objet en JavaScript ?',
                        'options' => [
                            ['title_en' => 'for...in', 'title_ar' => 'for...in', 'title_fr' => 'for...in', 'is_correct' => true],
                            ['title_en' => 'for...of', 'title_ar' => 'for...of', 'title_fr' => 'for...of', 'is_correct' => false],
                            ['title_en' => 'forEach', 'title_ar' => 'forEach', 'title_fr' => 'forEach', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the result of "3" + 2 in JavaScript?',
                        'title_ar' => 'ما هو نتيجة "3" + 2 في JavaScript؟',
                        'title_fr' => 'Quel est le résultat de "3" + 2 en JavaScript ?',
                        'options' => [
                            ['title_en' => '"32"', 'title_ar' => '"32"', 'title_fr' => '"32"', 'is_correct' => true],
                            ['title_en' => '5', 'title_ar' => '5', 'title_fr' => '5', 'is_correct' => false],
                            ['title_en' => 'Error', 'title_ar' => 'خطأ', 'title_fr' => 'Erreur', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used to declare a constant variable in JavaScript?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لتعريف متغير ثابت في JavaScript؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour déclarer une variable constante en JavaScript ?',
                        'options' => [
                            ['title_en' => 'const', 'title_ar' => 'const', 'title_fr' => 'const', 'is_correct' => true],
                            ['title_en' => 'var', 'title_ar' => 'var', 'title_fr' => 'var', 'is_correct' => false],
                            ['title_en' => 'let', 'title_ar' => 'let', 'title_fr' => 'let', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to remove the last element from an array in JavaScript?',
                        'title_ar' => 'ما هي الطريقة المستخدمة لإزالة العنصر الأخير من المصفوفة في JavaScript؟',
                        'title_fr' => 'Quelle méthode est utilisée pour supprimer le dernier élément d’un tableau en JavaScript ?',
                        'options' => [
                            ['title_en' => 'pop()', 'title_ar' => 'pop()', 'title_fr' => 'pop()', 'is_correct' => true],
                            ['title_en' => 'push()', 'title_ar' => 'push()', 'title_fr' => 'push()', 'is_correct' => false],
                            ['title_en' => 'shift()', 'title_ar' => 'shift()', 'title_fr' => 'shift()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which operator checks for equality in value and type in JavaScript?',
                        'title_ar' => 'ما هو المشغل الذي يتحقق من المساواة في القيمة والنمط في JavaScript؟',
                        'title_fr' => 'Quel opérateur vérifie l’égalité en valeur et en type en JavaScript ?',
                        'options' => [
                            ['title_en' => '===', 'title_ar' => '===', 'title_fr' => '===', 'is_correct' => true],
                            ['title_en' => '==', 'title_ar' => '==', 'title_fr' => '==', 'is_correct' => false],
                            ['title_en' => '!=', 'title_ar' => '!=', 'title_fr' => '!=', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to convert a number to a string in JavaScript?',
                        'title_ar' => 'ما هي الوظيفة المستخدمة لتحويل الرقم إلى سلسلة في JavaScript؟',
                        'title_fr' => 'Quelle fonction est utilisée pour convertir un nombre en chaîne en JavaScript ?',
                        'options' => [
                            ['title_en' => 'String()', 'title_ar' => 'String()', 'title_fr' => 'String()', 'is_correct' => true],
                            ['title_en' => 'toString()', 'title_ar' => 'toString()', 'title_fr' => 'toString()', 'is_correct' => true],
                            ['title_en' => 'convertToString()', 'title_ar' => 'convertToString()', 'title_fr' => 'convertToString()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which function is used to check if a value is NaN in JavaScript?',
                        'title_ar' => 'ما هي الدالة المستخدمة للتحقق مما إذا كانت القيمة NaN في JavaScript؟',
                        'title_fr' => 'Quelle fonction est utilisée pour vérifier si une valeur est NaN en JavaScript ?',
                        'options' => [
                            ['title_en' => 'isNaN()', 'title_ar' => 'isNaN()', 'title_fr' => 'isNaN()', 'is_correct' => true],
                            ['title_en' => 'isFinite()', 'title_ar' => 'isFinite()', 'title_fr' => 'isFinite()', 'is_correct' => false],
                            ['title_en' => 'Number.isNaN()', 'title_ar' => 'Number.isNaN()', 'title_fr' => 'Number.isNaN()', 'is_correct' => true],
                        ],
                    ],
                    [
                        'title_en' => 'What is the result of typeof null in JavaScript?',
                        'title_ar' => 'ما هو نتيجة typeof null في JavaScript؟',
                        'title_fr' => 'Quel est le résultat de typeof null en JavaScript ?',
                        'options' => [
                            ['title_en' => 'object', 'title_ar' => 'object', 'title_fr' => 'objet', 'is_correct' => true],
                            ['title_en' => 'null', 'title_ar' => 'null', 'title_fr' => 'null', 'is_correct' => false],
                            ['title_en' => 'undefined', 'title_ar' => 'undefined', 'title_fr' => 'indéfini', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to find the length of a string in JavaScript?',
                        'title_ar' => 'ما هي الطريقة المستخدمة لاكتشاف طول السلسلة في JavaScript؟',
                        'title_fr' => 'Quelle méthode est utilisée pour trouver la longueur d’une chaîne en JavaScript ?',
                        'options' => [
                            ['title_en' => 'length', 'title_ar' => 'length', 'title_fr' => 'longueur', 'is_correct' => true],
                            ['title_en' => 'size', 'title_ar' => 'size', 'title_fr' => 'taille', 'is_correct' => false],
                            ['title_en' => 'count', 'title_ar' => 'count', 'title_fr' => 'compter', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to reverse the order of elements in an array in JavaScript?',
                        'title_ar' => 'ما هي الطريقة المستخدمة لعكس ترتيب العناصر في المصفوفة في JavaScript؟',
                        'title_fr' => 'Quelle méthode est utilisée pour inverser l’ordre des éléments dans un tableau en JavaScript ?',
                        'options' => [
                            ['title_en' => 'reverse()', 'title_ar' => 'reverse()', 'title_fr' => 'inverse()', 'is_correct' => true],
                            ['title_en' => 'sort()', 'title_ar' => 'sort()', 'title_fr' => 'tri()', 'is_correct' => false],
                            ['title_en' => 'shuffle()', 'title_ar' => 'shuffle()', 'title_fr' => 'mélanger()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to join all elements of an array into a string in JavaScript?',
                        'title_ar' => 'ما هي الطريقة المستخدمة لدمج جميع عناصر المصفوفة في سلسلة في JavaScript؟',
                        'title_fr' => 'Quelle méthode est utilisée pour joindre tous les éléments d’un tableau en une chaîne en JavaScript ?',
                        'options' => [
                            ['title_en' => 'join()', 'title_ar' => 'join()', 'title_fr' => 'joindre()', 'is_correct' => true],
                            ['title_en' => 'concat()', 'title_ar' => 'concat()', 'title_fr' => 'concaténer()', 'is_correct' => false],
                            ['title_en' => 'merge()', 'title_ar' => 'merge()', 'title_fr' => 'fusionner()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used to exit a loop prematurely in JavaScript?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لإخراج الحلقة بشكل مبكر في JavaScript؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour quitter une boucle prématurément en JavaScript ?',
                        'options' => [
                            ['title_en' => 'break', 'title_ar' => 'break', 'title_fr' => 'casser', 'is_correct' => true],
                            ['title_en' => 'continue', 'title_ar' => 'continue', 'title_fr' => 'continuer', 'is_correct' => false],
                            ['title_en' => 'return', 'title_ar' => 'return', 'title_fr' => 'retourner', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which operator is used to perform modulus division in JavaScript?',
                        'title_ar' => 'ما هو المشغل المستخدم لأداء القسمة النسبية في JavaScript؟',
                        'title_fr' => 'Quel opérateur est utilisé pour effectuer une division modulo en JavaScript ?',
                        'options' => [
                            ['title_en' => '%', 'title_ar' => '%', 'title_fr' => '%', 'is_correct' => true],
                            ['title_en' => '/', 'title_ar' => '/', 'title_fr' => '/', 'is_correct' => false],
                            ['title_en' => '//', 'title_ar' => '//', 'title_fr' => '//', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to add an element at the beginning of an array in JavaScript?',
                        'title_ar' => 'ما هي الطريقة المستخدمة لإضافة عنصر في بداية المصفوفة في JavaScript؟',
                        'title_fr' => 'Quelle méthode est utilisée pour ajouter un élément au début d’un tableau en JavaScript ?',
                        'options' => [
                            ['title_en' => 'unshift()', 'title_ar' => 'unshift()', 'title_fr' => 'décalage()', 'is_correct' => true],
                            ['title_en' => 'push()', 'title_ar' => 'push()', 'title_fr' => 'pousser()', 'is_correct' => false],
                            ['title_en' => 'shift()', 'title_ar' => 'shift()', 'title_fr' => 'décaler()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to remove the first element from an array in JavaScript?',
                        'title_ar' => 'ما هي الطريقة المستخدمة لإزالة أول عنصر من المصفوفة في JavaScript؟',
                        'title_fr' => 'Quelle méthode est utilisée pour supprimer le premier élément d’un tableau en JavaScript ?',
                        'options' => [
                            ['title_en' => 'shift()', 'title_ar' => 'shift()', 'title_fr' => 'décaler()', 'is_correct' => true],
                            ['title_en' => 'unshift()', 'title_ar' => 'unshift()', 'title_fr' => 'décalage()', 'is_correct' => false],
                            ['title_en' => 'pop()', 'title_ar' => 'pop()', 'title_fr' => 'pop()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which function is used to generate a random number in JavaScript?',
                        'title_ar' => 'ما هي الدالة المستخدمة لتوليد رقم عشوائي في JavaScript؟',
                        'title_fr' => 'Quelle fonction est utilisée pour générer un nombre aléatoire en JavaScript ?',
                        'options' => [
                            ['title_en' => 'Math.random()', 'title_ar' => 'Math.random()', 'title_fr' => 'Math.random()', 'is_correct' => true],
                            ['title_en' => 'random()', 'title_ar' => 'random()', 'title_fr' => 'aléatoire()', 'is_correct' => false],
                            ['title_en' => 'rand()', 'title_ar' => 'rand()', 'title_fr' => 'rand()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to split a string into an array of substrings in JavaScript?',
                        'title_ar' => 'ما هي الطريقة المستخدمة لتقسيم السلسلة إلى مصفوفة من السلاسل الفرعية في JavaScript؟',
                        'title_fr' => 'Quelle méthode est utilisée pour diviser une chaîne en un tableau de sous-chaînes en JavaScript ?',
                        'options' => [
                            ['title_en' => 'split()', 'title_ar' => 'split()', 'title_fr' => 'diviser()', 'is_correct' => true],
                            ['title_en' => 'slice()', 'title_ar' => 'slice()', 'title_fr' => 'tranche()', 'is_correct' => false],
                            ['title_en' => 'splice()', 'title_ar' => 'splice()', 'title_fr' => 'greffer()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used to define a function in JavaScript?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لتعريف دالة في JavaScript؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour définir une fonction en JavaScript ?',
                        'options' => [
                            ['title_en' => 'function', 'title_ar' => 'function', 'title_fr' => 'fonction', 'is_correct' => true],
                            ['title_en' => 'func', 'title_ar' => 'func', 'title_fr' => 'func', 'is_correct' => false],
                            ['title_en' => 'def', 'title_ar' => 'def', 'title_fr' => 'déf', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title_en' => 'JavaScript Functions and Scope',
                'title_ar' => 'وظائف JavaScript ونطاقها',
                'title_fr' => 'Fonctions JavaScript et portée',
                'description_en' => 'Test your understanding of functions and scope in JavaScript.',
                'description_ar' => 'اختبار فهمك لوظائف JavaScript ونطاقها.',
                'description_fr' => 'Testez votre compréhension des fonctions et de la portée en JavaScript.',
                'difficulty' => 2,
                'topic' => $topicIds['JavaScript'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'What is the difference between `var` and `let` in JavaScript?',
                        'title_ar' => 'ما هو الاختلاف بين `var` و `let` في JavaScript؟',
                        'title_fr' => 'Quelle est la différence entre `var` et `let` en JavaScript ?',
                        'options' => [
                            ['title_en' => '`var` has function scope, `let` has block scope', 'title_ar' => '`var` له نطاق وظيفي، `let` له نطاق كتلة', 'title_fr' => '`var` a un scope de fonction, `let` a un scope de bloc', 'is_correct' => true],
                            ['title_en' => '`var` and `let` have the same scope', 'title_ar' => '`var` و `let` لديهما نفس النطاق', 'title_fr' => '`var` et `let` ont le même scope', 'is_correct' => false],
                            ['title_en' => '`var` has block scope, `let` has function scope', 'title_ar' => '`var` له نطاق كتلة، `let` له نطاق وظيفي', 'title_fr' => '`var` a un scope de bloc, `let` a un scope de fonction', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used to declare a constant variable in JavaScript?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لتعريف متغير ثابت في JavaScript؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour déclarer une variable constante en JavaScript ?',
                        'options' => [
                            ['title_en' => 'const', 'title_ar' => 'const', 'title_fr' => 'const', 'is_correct' => true],
                            ['title_en' => 'var', 'title_ar' => 'var', 'title_fr' => 'var', 'is_correct' => false],
                            ['title_en' => 'let', 'title_ar' => 'let', 'title_fr' => 'let', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `this` keyword in JavaScript?',
                        'title_ar' => 'ما هو الغرض من كلمة `this` في JavaScript؟',
                        'title_fr' => 'Quel est le but du mot-clé `this` en JavaScript ?',
                        'options' => [
                            ['title_en' => 'Refers to the object that the function is a property of', 'title_ar' => 'يشير إلى الكائن الذي تكون فيه الوظيفة خاصية', 'title_fr' => 'Référence à l’objet dont la fonction est une propriété', 'is_correct' => true],
                            ['title_en' => 'Refers to the global object', 'title_ar' => 'يشير إلى الكائن العالمي', 'title_fr' => 'Référence à l’objet global', 'is_correct' => false],
                            ['title_en' => 'Refers to the previous object', 'title_ar' => 'يشير إلى الكائن السابق', 'title_fr' => 'Référence à l’objet précédent', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to call a function with a specified `this` value?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لاستدعاء وظيفة مع قيمة `this` محددة؟',
                        'title_fr' => 'Quelle méthode est utilisée pour appeler une fonction avec une valeur `this` spécifiée ?',
                        'options' => [
                            ['title_en' => 'call()', 'title_ar' => 'call()', 'title_fr' => 'call()', 'is_correct' => true],
                            ['title_en' => 'apply()', 'title_ar' => 'apply()', 'title_fr' => 'apply()', 'is_correct' => false],
                            ['title_en' => 'bind()', 'title_ar' => 'bind()', 'title_fr' => 'bind()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the difference between `call()` and `apply()` methods in JavaScript?',
                        'title_ar' => 'ما هو الاختلاف بين طرق `call()` و `apply()` في JavaScript؟',
                        'title_fr' => 'Quelle est la différence entre les méthodes `call()` et `apply()` en JavaScript ?',
                        'options' => [
                            ['title_en' => '`call()` takes arguments separately, `apply()` takes arguments as an array', 'title_ar' => '`call()` يأخذ الأргومنتات بشكل منفصل، `apply()` يأخذ الأргومنتات كمصفوفة', 'title_fr' => '`call()` prend des arguments séparément, `apply()` prend des arguments sous forme de tableau', 'is_correct' => true],
                            ['title_en' => '`call()` and `apply()` are the same', 'title_ar' => '`call()` و `apply()` هما نفسهما', 'title_fr' => '`call()` et `apply()` sont les mêmes', 'is_correct' => false],
                            ['title_en' => '`call()` takes arguments as an array, `apply()` takes arguments separately', 'title_ar' => '`call()` يأخذ الأرجومنتات كمصفوفة، `apply()` يأخذ الأرجومنتات بشكل منفصل', 'title_fr' => '`call()` prend des arguments sous forme de tableau, `apply()` prend des arguments séparément', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title_en' => 'Advanced JavaScript Concepts',
                'title_ar' => 'مفهوم JavaScript المتقدمة',
                'title_fr' => 'Concepts avancés de JavaScript',
                'description_en' => 'Challenge yourself with advanced JavaScript concepts.',
                'description_ar' => 'احدي نفسك مع مفاهيم JavaScript المتقدمة.',
                'description_fr' => 'Défiez-vous avec des concepts de JavaScript avancés.',
                'difficulty' => 3,
                'topic' => $topicIds['JavaScript'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'What is a closure in JavaScript?',
                        'title_ar' => 'ما هو الإغلاق في JavaScript؟',
                        'title_fr' => 'Qu’est-ce qu’un fermeture en JavaScript ?',
                        'options' => [
                            ['title_en' => 'A function that has access to its lexical scope, even when the function is executed outside that scope', 'title_ar' => 'وظيفة لديها الوصول إلى نطاقها اللغوي، حتى عند تنفيذ الوظيفة خارج ذلك النطاق', 'title_fr' => 'Une fonction qui a accès à son scope lexical, même lorsque la fonction est exécutée en dehors de ce scope', 'is_correct' => true],
                            ['title_en' => 'A function that is defined inside another function', 'title_ar' => 'وظيفة معرفة داخل وظيفة أخرى', 'title_fr' => 'Une fonction définie à l’intérieur d’une autre fonction', 'is_correct' => false],
                            ['title_en' => 'A function that returns another function', 'title_ar' => 'وظيفة ترجع وظيفة أخرى', 'title_fr' => 'Une fonction qui retourne une autre fonction', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `async` keyword in JavaScript?',
                        'title_ar' => 'ما هو الغرض من كلمة `async` في JavaScript؟',
                        'title_fr' => 'Quel est le but du mot-clé `async` en JavaScript ?',
                        'options' => [
                            ['title_en' => 'To declare an asynchronous function', 'title_ar' => 'لإعلان وظيفة غير متزامنة', 'title_fr' => 'Pour déclarer une fonction asynchrone', 'is_correct' => true],
                            ['title_en' => 'To declare a synchronous function', 'title_ar' => 'لإعلان وظيفة متزامنة', 'title_fr' => 'Pour déclarer une fonction synchrone', 'is_correct' => false],
                            ['title_en' => 'To declare a generator function', 'title_ar' => 'لإعلان وظيفة مولد', 'title_fr' => 'Pour déclarer une fonction générateur', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the difference between `==` and `===` operators in JavaScript?',
                        'title_ar' => 'ما هو الاختلاف بين مشغلات `==` و `===` في JavaScript؟',
                        'title_fr' => 'Quelle est la différence entre les opérateurs `==` et `===` en JavaScript ?',
                        'options' => [
                            ['title_en' => '`==` checks for equality of values only, `===` checks for equality of values and types', 'title_ar' => '`==` يتحقق من تساوي القيم فقط، `===` يتحقق من تساوي القيم والأنواع', 'title_fr' => '`==` vérifie l’égalité des valeurs uniquement, `===` vérifie l’égalité des valeurs et des types', 'is_correct' => true],
                            ['title_en' => '`==` checks for equality of values and types, `===` checks for equality of values only', 'title_ar' => '`==` يتحقق من تساوي القيم والأنواع، `===` يتحقق من تساوي القيم فقط', 'title_fr' => '`==` vérifie l’égalité des valeurs et des types, `===` vérifie l’égalité des valeurs uniquement', 'is_correct' => false],
                            ['title_en' => '`==` and `===` are the same', 'title_ar' => '`==` و `===` هما نفسهما', 'title_fr' => '`==` et `===` sont les mêmes', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is a promise in JavaScript?',
                        'title_ar' => 'ما هو وعد في JavaScript؟',
                        'title_fr' => 'Qu’est-ce qu’une promesse en JavaScript ?',
                        'options' => [
                            ['title_en' => 'An object representing the eventual completion (or failure) of an asynchronous operation and its resulting value', 'title_ar' => 'كائن يمثل الانتهاء النهائي (أو الفشل) لعملية غير متزامنة وقيمتها الناتجة', 'title_fr' => 'Un objet représentant la fin éventuelle (ou l’échec) d’une opération asynchrone et sa valeur résultante', 'is_correct' => true],
                            ['title_en' => 'A function that returns a boolean value', 'title_ar' => 'وظيفة ترجع قيمة منطقية', 'title_fr' => 'Une fonction qui retourne une valeur booléenne', 'is_correct' => false],
                            ['title_en' => 'A variable that holds a value', 'title_ar' => 'متغير يحتفظ بقيمة', 'title_fr' => 'Une variable qui contient une valeur', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to handle errors in a promise chain?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لمعالجة الأخطاء في سلسلة وعد؟',
                        'title_fr' => 'Quelle méthode est utilisée pour gérer les erreurs dans une chaîne de promesses ?',
                        'options' => [
                            ['title_en' => 'catch()', 'title_ar' => 'catch()', 'title_fr' => 'catch()', 'is_correct' => true],
                            ['title_en' => 'then()', 'title_ar' => 'then()', 'title_fr' => 'then()', 'is_correct' => false],
                            ['title_en' => 'finally()', 'title_ar' => 'finally()', 'title_fr' => 'finally()', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            //LARAVEL QUIZZES
            [
                'title_en' => 'Laravel Basics',
                'title_ar' => 'أساسيات Laravel',
                'title_fr' => 'Bases de Laravel',
                'description_en' => 'Test your fundamental knowledge of Laravel framework.',
                'description_ar' => 'اختبار معرفتك الأساسية في إطار عمل Laravel.',
                'description_fr' => 'Testez vos connaissances fondamentales sur le cadre Laravel.',
                'difficulty' => 1,
                'topic' => $topicIds['Laravel'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'What is the default template engine used in Laravel?',
                        'title_ar' => 'ما هو محرك القوالب الافتراضي المستخدم في Laravel؟',
                        'title_fr' => 'Quel est le moteur de modèle par défaut utilisé dans Laravel ?',
                        'options' => [
                            ['title_en' => 'Blade', 'title_ar' => 'Blade', 'title_fr' => 'Blade', 'is_correct' => true],
                            ['title_en' => 'Twig', 'title_ar' => 'Twig', 'title_fr' => 'Twig', 'is_correct' => false],
                            ['title_en' => 'EJS', 'title_ar' => 'EJS', 'title_fr' => 'EJS', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to create a new Laravel project?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء مشروع Laravel جديد؟',
                        'title_fr' => 'Quelle commande est utilisée pour créer un nouveau projet Laravel ?',
                        'options' => [
                            ['title_en' => 'composer create-project --prefer-dist laravel/laravel blog', 'title_ar' => 'composer create-project --prefer-dist laravel/laravel blog', 'title_fr' => 'composer create-project --prefer-dist laravel/laravel blog', 'is_correct' => true],
                            ['title_en' => 'laravel new blog', 'title_ar' => 'laravel new blog', 'title_fr' => 'laravel new blog', 'is_correct' => true],
                            ['title_en' => 'npm install laravel', 'title_ar' => 'npm install laravel', 'title_fr' => 'npm install laravel', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `.env` file in a Laravel project?',
                        'title_ar' => 'ما هو الغرض من ملف `.env` في مشروع Laravel؟',
                        'title_fr' => 'Quel est le but du fichier `.env` dans un projet Laravel ?',
                        'options' => [
                            ['title_en' => 'To store environment-specific configuration settings', 'title_ar' => 'لتخزين إعدادات التكوين الخاصة بيئتها', 'title_fr' => 'Pour stocker les paramètres de configuration spécifiques à l’environnement', 'is_correct' => true],
                            ['title_en' => 'To store database credentials', 'title_ar' => 'لتخزين بيانات اعتماد قاعدة البيانات', 'title_fr' => 'Pour stocker les informations d’identification de la base de données', 'is_correct' => false],
                            ['title_en' => 'To store user data', 'title_ar' => 'لتخزين بيانات المستخدم', 'title_fr' => 'Pour stocker les données utilisateur', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to migrate the database in Laravel?',
                        'title_ar' => 'ما هو الأمر المستخدم لنقل قاعدة البيانات في Laravel؟',
                        'title_fr' => 'Quelle commande est utilisée pour migrer la base de données dans Laravel ?',
                        'options' => [
                            ['title_en' => 'php artisan migrate', 'title_ar' => 'php artisan migrate', 'title_fr' => 'php artisan migrate', 'is_correct' => true],
                            ['title_en' => 'php artisan db:migrate', 'title_ar' => 'php artisan db:migrate', 'title_fr' => 'php artisan db:migrate', 'is_correct' => true],
                            ['title_en' => 'php artisan make:migration', 'title_ar' => 'php artisan make:migration', 'title_fr' => 'php artisan make:migration', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is a route in Laravel?',
                        'title_ar' => 'ما هو المسار في Laravel؟',
                        'title_fr' => 'Qu’est-ce qu’un route en Laravel ?',
                        'options' => [
                            ['title_en' => 'A URL endpoint that maps to a controller method', 'title_ar' => 'نقطة نهاية URL تربط بمетод في المتحكم', 'title_fr' => 'Un point de terminaison d’URL qui mappe à une méthode de contrôleur', 'is_correct' => true],
                            ['title_en' => 'A database table', 'title_ar' => 'جدول قاعدة بيانات', 'title_fr' => 'Une table de base de données', 'is_correct' => false],
                            ['title_en' => 'A middleware', 'title_ar' => 'وسطاء', 'title_fr' => 'Un middleware', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which directory contains the controllers in a Laravel project?',
                        'title_ar' => 'ما هو الدليل الذي يحتوي على المتحكمات في مشروع Laravel؟',
                        'title_fr' => 'Dans quel répertoire se trouvent les contrôleurs dans un projet Laravel ?',
                        'options' => [
                            ['title_en' => 'app/Http/Controllers', 'title_ar' => 'app/Http/Controllers', 'title_fr' => 'app/Http/Controllers', 'is_correct' => true],
                            ['title_en' => 'app/Models', 'title_ar' => 'app/Models', 'title_fr' => 'app/Models', 'is_correct' => false],
                            ['title_en' => 'app/Routes', 'title_ar' => 'app/Routes', 'title_fr' => 'app/Routes', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the default ORM used in Laravel?',
                        'title_ar' => 'ما هو نظام إدارة العلاقات الافتراضي المستخدم في Laravel؟',
                        'title_fr' => 'Quel est l’ORM par défaut utilisé dans Laravel ?',
                        'options' => [
                            ['title_en' => 'Eloquent', 'title_ar' => 'Eloquent', 'title_fr' => 'Eloquent', 'is_correct' => true],
                            ['title_en' => 'Doctrine', 'title_ar' => 'Doctrine', 'title_fr' => 'Doctrine', 'is_correct' => false],
                            ['title_en' => 'Sequelize', 'title_ar' => 'Sequelize', 'title_fr' => 'Sequelize', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to generate a new controller in Laravel?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء متحكم جديد في Laravel؟',
                        'title_fr' => 'Quelle commande est utilisée pour générer un nouveau contrôleur dans Laravel ?',
                        'options' => [
                            ['title_en' => 'php artisan make:controller', 'title_ar' => 'php artisan make:controller', 'title_fr' => 'php artisan make:controller', 'is_correct' => true],
                            ['title_en' => 'php artisan create:controller', 'title_ar' => 'php artisan create:controller', 'title_fr' => 'php artisan create:controller', 'is_correct' => false],
                            ['title_en' => 'php artisan generate:controller', 'title_ar' => 'php artisan generate:controller', 'title_fr' => 'php artisan generate:controller', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of middleware in Laravel?',
                        'title_ar' => 'ما هو الغرض من الوسطاء في Laravel؟',
                        'title_fr' => 'Quel est le but des middlewares dans Laravel ?',
                        'options' => [
                            ['title_en' => 'To filter HTTP requests entering the application', 'title_ar' => 'لتصفية طلبات HTTP الدخول إلى التطبيق', 'title_fr' => 'Pour filtrer les requêtes HTTP entrant dans l’application', 'is_correct' => true],
                            ['title_en' => 'To manage database migrations', 'title_ar' => 'لإدارة عمليات نقل قاعدة البيانات', 'title_fr' => 'Pour gérer les migrations de base de données', 'is_correct' => false],
                            ['title_en' => 'To define routes', 'title_ar' => 'لتعريف المسارات', 'title_fr' => 'Pour définir les routes', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which file is used to define routes in Laravel?',
                        'title_ar' => 'ما هو الملف الذي يُستخدم لتحديد المسارات في Laravel؟',
                        'title_fr' => 'Quel fichier est utilisé pour définir les routes dans Laravel ?',
                        'options' => [
                            ['title_en' => 'routes/web.php', 'title_ar' => 'routes/web.php', 'title_fr' => 'routes/web.php', 'is_correct' => true],
                            ['title_en' => 'app/Routes.php', 'title_ar' => 'app/Routes.php', 'title_fr' => 'app/Routes.php', 'is_correct' => false],
                            ['title_en' => 'config/routes.php', 'title_ar' => 'config/routes.php', 'title_fr' => 'config/routes.php', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => "What is the command to run Laravel's development server?",
                        'title_ar' => 'ما هو الأمر لتشغيل خادم التطوير الخاص بـ Laravel؟',
                        'title_fr' => 'Quelle est la commande pour exécuter le serveur de développement Laravel ?',
                        'options' => [
                            ['title_en' => 'php artisan serve', 'title_ar' => 'php artisan serve', 'title_fr' => 'php artisan serve', 'is_correct' => true],
                            ['title_en' => 'php artisan start', 'title_ar' => 'php artisan start', 'title_fr' => 'php artisan start', 'is_correct' => false],
                            ['title_en' => 'php artisan run', 'title_ar' => 'php artisan run', 'title_fr' => 'php artisan run', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which directory contains migration files in Laravel?',
                        'title_ar' => 'ما هو الدليل الذي يحتوي على ملفات النقل في Laravel؟',
                        'title_fr' => 'Dans quel répertoire se trouvent les fichiers de migration dans Laravel ?',
                        'options' => [
                            ['title_en' => 'database/migrations', 'title_ar' => 'database/migrations', 'title_fr' => 'database/migrations', 'is_correct' => true],
                            ['title_en' => 'app/Migrations', 'title_ar' => 'app/Migrations', 'title_fr' => 'app/Migrations', 'is_correct' => false],
                            ['title_en' => 'storage/migrations', 'title_ar' => 'storage/migrations', 'title_fr' => 'storage/migrations', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `public` directory in a Laravel project?',
                        'title_ar' => 'ما هو الغرض من دليل `public` في مشروع Laravel؟',
                        'title_fr' => 'Quel est le but du répertoire `public` dans un projet Laravel ?',
                        'options' => [
                            ['title_en' => 'It serves as the web root for the application', 'title_ar' => 'يُستخدم كجذر الويب للتطبيق', 'title_fr' => 'Il sert de racine Web pour l’application', 'is_correct' => true],
                            ['title_en' => 'It stores configuration files', 'title_ar' => 'يخزن ملفات التكوين', 'title_fr' => 'Il stocke les fichiers de configuration', 'is_correct' => false],
                            ['title_en' => 'It contains all the controllers', 'title_ar' => 'يحتوي على جميع المتحكمات', 'title_fr' => 'Il contient tous les contrôleurs', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which Artisan command is used to rollback the last database migration?',
                        'title_ar' => 'ما هو الأمر Artisan المستخدم لاستعادة آخر عملية نقل قاعدة بيانات؟',
                        'title_fr' => 'Quelle commande Artisan est utilisée pour annuler la dernière migration de la base de données ?',
                        'options' => [
                            ['title_en' => 'php artisan migrate:rollback', 'title_ar' => 'php artisan migrate:rollback', 'title_fr' => 'php artisan migrate:rollback', 'is_correct' => true],
                            ['title_en' => 'php artisan db:rollback', 'title_ar' => 'php artisan db:rollback', 'title_fr' => 'php artisan db:rollback', 'is_correct' => false],
                            ['title_en' => 'php artisan rollback:migrate', 'title_ar' => 'php artisan rollback:migrate', 'title_fr' => 'php artisan rollback:migrate', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the default session driver in Laravel?',
                        'title_ar' => 'ما هو محرك الجلسات الافتراضي في Laravel؟',
                        'title_fr' => 'Quel est le pilote de session par défaut dans Laravel ?',
                        'options' => [
                            ['title_en' => 'file', 'title_ar' => 'file', 'title_fr' => 'fichier', 'is_correct' => true],
                            ['title_en' => 'database', 'title_ar' => 'database', 'title_fr' => 'base de données', 'is_correct' => false],
                            ['title_en' => 'cookie', 'title_ar' => 'cookie', 'title_fr' => 'cookie', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to generate a new model in Laravel?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء نموذج جديد في Laravel؟',
                        'title_fr' => 'Quelle commande est utilisée pour générer un nouveau modèle dans Laravel ?',
                        'options' => [
                            ['title_en' => 'php artisan make:model', 'title_ar' => 'php artisan make:model', 'title_fr' => 'php artisan make:model', 'is_correct' => true],
                            ['title_en' => 'php artisan create:model', 'title_ar' => 'php artisan create:model', 'title_fr' => 'php artisan create:model', 'is_correct' => false],
                            ['title_en' => 'php artisan generate:model', 'title_ar' => 'php artisan generate:model', 'title_fr' => 'php artisan generate:model', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title_en' => 'Laravel Eloquent ORM',
                'title_ar' => 'مدخل كائنات Eloquent في Laravel',
                'title_fr' => 'ORM Eloquent de Laravel',
                'description_en' => 'Test your knowledge of Eloquent ORM in Laravel.',
                'description_ar' => 'اختبار معرفتك بمدخل كائنات Eloquent في Laravel.',
                'description_fr' => 'Testez vos connaissances sur l’ORM Eloquent de Laravel.',
                'difficulty' => 2,
                'topic' => $topicIds['Laravel'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'What is Eloquent ORM in Laravel?',
                        'title_ar' => 'ما هو Eloquent ORM في Laravel؟',
                        'title_fr' => 'Qu’est-ce que l’ORM Eloquent de Laravel ?',
                        'options' => [
                            ['title_en' => 'A simple ActiveRecord implementation for working with databases', 'title_ar' => 'تنفيذ بسيط لـ ActiveRecord للعمل مع قواعد البيانات', 'title_fr' => 'Une implémentation simple d’ActiveRecord pour travailler avec les bases de données', 'is_correct' => true],
                            ['title_en' => 'A middleware for handling HTTP requests', 'title_ar' => 'وسطاء للتعامل مع طلبات HTTP', 'title_fr' => 'Un middleware pour gérer les requêtes HTTP', 'is_correct' => false],
                            ['title_en' => 'A database migration tool', 'title_ar' => 'أداة نقل قاعدة البيانات', 'title_fr' => 'Outil de migration de base de données', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to retrieve all records from a table using Eloquent?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لاسترجاع جميع السجلات من جدول باستخدام Eloquent؟',
                        'title_fr' => 'Quelle méthode est utilisée pour récupérer tous les enregistrements d’un tableau en utilisant Eloquent ?',
                        'options' => [
                            ['title_en' => 'all()', 'title_ar' => 'all()', 'title_fr' => 'all()', 'is_correct' => true],
                            ['title_en' => 'get()', 'title_ar' => 'get()', 'title_fr' => 'get()', 'is_correct' => true],
                            ['title_en' => 'find()', 'title_ar' => 'find()', 'title_fr' => 'find()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `where` method in Eloquent?',
                        'title_ar' => 'ما هو الغرض من طريقة `where` في Eloquent؟',
                        'title_fr' => 'Quel est le but de la méthode `where` en Eloquent ?',
                        'options' => [
                            ['title_en' => 'To filter records based on conditions', 'title_ar' => 'لتصفية السجلات بناءً على الشروط', 'title_fr' => 'Pour filtrer les enregistrements en fonction de conditions', 'is_correct' => true],
                            ['title_en' => 'To create a new record', 'title_ar' => 'لإنشاء سجل جديد', 'title_fr' => 'Pour créer un nouvel enregistrement', 'is_correct' => false],
                            ['title_en' => 'To update an existing record', 'title_ar' => ' لتحديث سجل موجود', 'title_fr' => 'Pour mettre à jour un enregistrement existant', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to delete a record using Eloquent?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإزالة سجل باستخدام Eloquent؟',
                        'title_fr' => 'Quelle méthode est utilisée pour supprimer un enregistrement en utilisant Eloquent ?',
                        'options' => [
                            ['title_en' => 'delete()', 'title_ar' => 'delete()', 'title_fr' => 'delete()', 'is_correct' => true],
                            ['title_en' => 'destroy()', 'title_ar' => 'destroy()', 'title_fr' => 'destroy()', 'is_correct' => true],
                            ['title_en' => 'remove()', 'title_ar' => 'remove()', 'title_fr' => 'remove()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is a relationship in Eloquent?',
                        'title_ar' => 'ما هو العلاقة في Eloquent؟',
                        'title_fr' => 'Qu’est-ce qu’une relation en Eloquent ?',
                        'options' => [
                            ['title_en' => 'A way to define associations between models', 'title_ar' => 'طريقة لتعريف علاقات بين النماذج', 'title_fr' => 'Un moyen de définir des associations entre les modèles', 'is_correct' => true],
                            ['title_en' => 'A method for querying the database', 'title_ar' => 'طريقة لاستعلام قاعدة البيانات', 'title_fr' => 'Une méthode pour interroger la base de données', 'is_correct' => false],
                            ['title_en' => 'A middleware for handling HTTP requests', 'title_ar' => 'وسطاء للتعامل مع طلبات HTTP', 'title_fr' => 'Un middleware pour gérer les requêtes HTTP', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title_en' => 'Advanced Laravel Concepts',
                'title_ar' => 'مفهوم Laravel المتقدمة',
                'title_fr' => 'Concepts avancés de Laravel',
                'description_en' => 'Challenge yourself with advanced Laravel concepts.',
                'description_ar' => 'احدي نفسك مع مفاهيم Laravel المتقدمة.',
                'description_fr' => 'Défiez-vous avec des concepts de Laravel avancés.',
                'difficulty' => 3,
                'topic' => $topicIds['Laravel'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'What is a service provider in Laravel?',
                        'title_ar' => 'ما هو مزود الخدمة في Laravel؟',
                        'title_fr' => 'Qu’est-ce qu’un fournisseur de services en Laravel ?',
                        'options' => [
                            ['title_en' => 'A class responsible for bootstrapping and configuring services', 'title_ar' => 'فئة مسؤولة عن تشغيل وإعداد الخدمات', 'title_fr' => 'Une classe responsable du démarrage et de la configuration des services', 'is_correct' => true],
                            ['title_en' => 'A middleware for handling HTTP requests', 'title_ar' => 'وسطاء للتعامل مع طلبات HTTP', 'title_fr' => 'Un middleware pour gérer les requêtes HTTP', 'is_correct' => false],
                            ['title_en' => 'A controller method', 'title_ar' => 'طريقة في المتحكم', 'title_fr' => 'Une méthode de contrôleur', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to generate a new service provider in Laravel?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء مزود خدمة جديد في Laravel؟',
                        'title_fr' => 'Quelle commande est utilisée pour générer un nouveau fournisseur de services dans Laravel ?',
                        'options' => [
                            ['title_en' => 'php artisan make:provider MyServiceProvider', 'title_ar' => 'php artisan make:provider MyServiceProvider', 'title_fr' => 'php artisan make:provider MyServiceProvider', 'is_correct' => true],
                            ['title_en' => 'php artisan make:controller MyController', 'title_ar' => 'php artisan make:controller MyController', 'title_fr' => 'php artisan make:controller MyController', 'is_correct' => false],
                            ['title_en' => 'php artisan make:model MyModel', 'title_ar' => 'php artisan make:model MyModel', 'title_fr' => 'php artisan make:model MyModel', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is a middleware in Laravel?',
                        'title_ar' => 'ما هو وسطاء في Laravel؟',
                        'title_fr' => 'Qu’est-ce qu’un middleware en Laravel ?',
                        'options' => [
                            ['title_en' => 'A layer that sits between HTTP requests and the application logic', 'title_ar' => 'طبقة تقع بين طلبات HTTP وتخطيط التطبيق', 'title_fr' => 'Un niveau qui se situe entre les requêtes HTTP et la logique de l’application', 'is_correct' => true],
                            ['title_en' => 'A method for querying the database', 'title_ar' => 'طريقة لاستعلام قاعدة البيانات', 'title_fr' => 'Une méthode pour interroger la base de données', 'is_correct' => false],
                            ['title_en' => 'A service provider', 'title_ar' => 'مزود خدمة', 'title_fr' => 'Un fournisseur de services', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to generate a new middleware in Laravel?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء وسطاء جديد في Laravel؟',
                        'title_fr' => 'Quelle commande est utilisée pour générer un nouveau middleware dans Laravel ?',
                        'options' => [
                            ['title_en' => 'php artisan make:middleware MyMiddleware', 'title_ar' => 'php artisan make:middleware MyMiddleware', 'title_fr' => 'php artisan make:middleware MyMiddleware', 'is_correct' => true],
                            ['title_en' => 'php artisan make:controller MyController', 'title_ar' => 'php artisan make:controller MyController', 'title_fr' => 'php artisan make:controller MyController', 'is_correct' => false],
                            ['title_en' => 'php artisan make:provider MyServiceProvider', 'title_ar' => 'php artisan make:provider MyServiceProvider', 'title_fr' => 'php artisan make:provider MyServiceProvider', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is a facade in Laravel?',
                        'title_ar' => 'ما هو الواجهة في Laravel؟',
                        'title_fr' => 'Qu’est-ce qu’un facade en Laravel ?',
                        'options' => [
                            ['title_en' => 'A static interface to classes that are available in the application service container', 'title_ar' => 'واجهة ثابتة للفئات المتاحة في حاوية خدمات التطبيق', 'title_fr' => 'Une interface statique vers des classes disponibles dans le conteneur de services de l’application', 'is_correct' => true],
                            ['title_en' => 'A middleware for handling HTTP requests', 'title_ar' => 'وسطاء للتعامل مع طلبات HTTP', 'title_fr' => 'Un middleware pour gérer les requêtes HTTP', 'is_correct' => false],
                            ['title_en' => 'A controller method', 'title_ar' => 'طريقة في المتحكم', 'title_fr' => 'Une méthode de contrôleur', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `Service Container` in Laravel?',
                        'title_ar' => 'ما هو الغرض من حاوية الخدمة في Laravel؟',
                        'title_fr' => 'Quel est le but du conteneur de services dans Laravel ?',
                        'options' => [
                            ['title_en' => 'To manage class dependencies and perform dependency injection', 'title_ar' => 'لإدارة تعتمد على الفصول وتنفيذ حقن الاعتماديات', 'title_fr' => 'Pour gérer les dépendances de classe et effectuer l’injection de dépendances', 'is_correct' => true],
                            ['title_en' => 'To store session data', 'title_ar' => 'لتخزين بيانات الجلسة', 'title_fr' => 'Pour stocker les données de session', 'is_correct' => false],
                            ['title_en' => 'To handle database connections', 'title_ar' => 'للحصول على اتصالات قاعدة البيانات', 'title_fr' => 'Pour gérer les connexions à la base de données', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to create a custom Artisan command?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء أمر Artisan مخصص؟',
                        'title_fr' => 'Quelle commande est utilisée pour créer une commande Artisan personnalisée ?',
                        'options' => [
                            ['title_en' => 'php artisan make:command', 'title_ar' => 'php artisan make:command', 'title_fr' => 'php artisan make:command', 'is_correct' => true],
                            ['title_en' => 'php artisan generate:command', 'title_ar' => 'php artisan generate:command', 'title_fr' => 'php artisan generate:command', 'is_correct' => false],
                            ['title_en' => 'php artisan create:command', 'title_ar' => 'php artisan create:command', 'title_fr' => 'php artisan create:command', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `Broadcasting` feature in Laravel?',
                        'title_ar' => 'ما هو الغرض من ميزة البث في Laravel؟',
                        'title_fr' => 'Quel est le but de la fonctionnalité de diffusion dans Laravel ?',
                        'options' => [
                            ['title_en' => 'To enable real-time communication between clients and servers', 'title_ar' => 'لتوفير التواصل الزمني الحقيقي بين العملاء والخوادم', 'title_fr' => 'Pour permettre la communication en temps réel entre les clients et les serveurs', 'is_correct' => true],
                            ['title_en' => 'To optimize database queries', 'title_ar' => 'لتحسين استعلامات قاعدة البيانات', 'title_fr' => 'Pour optimiser les requêtes de base de données', 'is_correct' => false],
                            ['title_en' => 'To cache API responses', 'title_ar' => 'لتخفيف استجابات API', 'title_fr' => 'Pour mettre en cache les réponses API', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the difference between `Eager Loading` and `Lazy Loading` in Eloquent?',
                        'title_ar' => 'ما هو الفرق بين تحميل النهم وتحميل الكسل في Eloquent؟',
                        'title_fr' => 'Quelle est la différence entre le chargement anticipé et le chargement différé dans Eloquent ?',
                        'options' => [
                            ['title_en' => 'Eager Loading reduces the number of queries by loading relationships upfront, while Lazy Loading fetches them only when needed.', 'title_ar' => 'يقلل تحميل النهم من عدد الاستعلامات عن طريق تحميل العلاقات مسبقًا، بينما يحصل تحميل الكسل عليها فقط عند الحاجة.', 'title_fr' => 'Le chargement anticipé réduit le nombre de requêtes en chargeant les relations dès le départ, tandis que le chargement différé les récupère seulement lorsque nécessaire.', 'is_correct' => true],
                            ['title_en' => 'Eager Loading is slower than Lazy Loading because it loads all data at once.', 'title_ar' => 'تحميل النهم أبطأ من تحميل الكسل لأنه يحمل جميع البيانات دفعة واحدة.', 'title_fr' => 'Le chargement anticipé est plus lent que le chargement différé car il charge toutes les données d’un coup.', 'is_correct' => false],
                            ['title_en' => 'There is no difference; both perform the same function.', 'title_ar' => 'لا فرق؛ كلاهما يؤدي نفس الوظيفة.', 'title_fr' => 'Il n’y a pas de différence ; les deux accomplissent la même fonction.', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `Event` system in Laravel?',
                        'title_ar' => 'ما هو الغرض من نظام الأحداث في Laravel؟',
                        'title_fr' => 'Quel est le but du système d’événements dans Laravel ?',
                        'options' => [
                            ['title_en' => 'To decouple application logic and allow listeners to react to specific events', 'title_ar' => 'لفصل منطق التطبيق وسماح المستمعين بالتفاعل مع الأحداث المحددة', 'title_fr' => 'Pour découpler la logique de l’application et permettre aux auditeurs de réagir à des événements spécifiques', 'is_correct' => true],
                            ['title_en' => 'To handle HTTP requests', 'title_ar' => 'لإعطاء طلبات HTTP', 'title_fr' => 'Pour gérer les requêtes HTTP', 'is_correct' => false],
                            ['title_en' => 'To define routes', 'title_ar' => 'لتعريف المسارات', 'title_fr' => 'Pour définir les routes', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the `Facade` pattern in Laravel?',
                        'title_ar' => 'ما هو نمط الواجهة في Laravel؟',
                        'title_fr' => 'Quel est le motif Facade dans Laravel ?',
                        'options' => [
                            ['title_en' => 'A design pattern that provides a simplified interface to a larger body of code', 'title_ar' => 'نمط تصميم يقدم واجهة بسيطة لمجموعة أكبر من التعليمات البرمجية', 'title_fr' => 'Un motif de conception qui fournit une interface simplifiée à un ensemble plus large de code', 'is_correct' => true],
                            ['title_en' => 'A method to encrypt sensitive data', 'title_ar' => 'طريقة لتشفير البيانات الحساسة', 'title_fr' => 'Une méthode pour chiffrer des données sensibles', 'is_correct' => false],
                            ['title_en' => 'A way to define middleware', 'title_ar' => 'طريقة لتحديد الوسطاء', 'title_fr' => 'Une manière de définir les middlewares', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which file contains the configuration for Laravel queues?',
                        'title_ar' => 'ما هو الملف الذي يحتوي على التكوين لدوريات Laravel؟',
                        'title_fr' => 'Quel fichier contient la configuration des files d’attente Laravel ?',
                        'options' => [
                            ['title_en' => 'config/queue.php', 'title_ar' => 'config/queue.php', 'title_fr' => 'config/queue.php', 'is_correct' => true],
                            ['title_en' => 'app/Queue.php', 'title_ar' => 'app/Queue.php', 'title_fr' => 'app/Queue.php', 'is_correct' => false],
                            ['title_en' => 'storage/queues.php', 'title_ar' => 'storage/queues.php', 'title_fr' => 'storage/queues.php', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `Policy` class in Laravel?',
                        'title_ar' => 'ما هو الغرض من فئة السياسة في Laravel؟',
                        'title_fr' => 'Quel est le but de la classe Policy dans Laravel ?',
                        'options' => [
                            ['title_en' => 'To define authorization logic for resources', 'title_ar' => 'لتعريف منطق التفويض للموارد', 'title_fr' => 'Pour définir la logique d’autorisation pour les ressources', 'is_correct' => true],
                            ['title_en' => 'To manage database migrations', 'title_ar' => 'لإدارة عمليات نقل قاعدة البيانات', 'title_fr' => 'Pour gérer les migrations de base de données', 'is_correct' => false],
                            ['title_en' => 'To define routes', 'title_ar' => 'لتعريف المسارات', 'title_fr' => 'Pour définir les routes', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which Artisan command is used to clear the route cache?',
                        'title_ar' => 'ما هو الأمر Artisan المستخدم لتنظيف ذاكرة التخزين المؤقت للمسار؟',
                        'title_fr' => 'Quelle commande Artisan est utilisée pour vider le cache des routes ?',
                        'options' => [
                            ['title_en' => 'php artisan route:cache', 'title_ar' => 'php artisan route:cache', 'title_fr' => 'php artisan route:cache', 'is_correct' => false],
                            ['title_en' => 'php artisan route:clear', 'title_ar' => 'php artisan route:clear', 'title_fr' => 'php artisan route:clear', 'is_correct' => true],
                            ['title_en' => 'php artisan cache:clear', 'title_ar' => 'php artisan cache:clear', 'title_fr' => 'php artisan cache:clear', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the `Repository Pattern` in Laravel?',
                        'title_ar' => 'ما هو نمط مستودع في Laravel؟',
                        'title_fr' => 'Quel est le motif Repository dans Laravel ?',
                        'options' => [
                            ['title_en' => 'A design pattern that abstracts data access logic and separates it from business logic', 'title_ar' => 'نمط تصميم يفصل منطق الوصول إلى البيانات عن منطق الأعمال', 'title_fr' => 'Un motif de conception qui abstrait la logique d’accès aux données et la sépare de la logique métier', 'is_correct' => true],
                            ['title_en' => 'A method to encrypt data', 'title_ar' => 'طريقة لتشفير البيانات', 'title_fr' => 'Une méthode pour chiffrer des données', 'is_correct' => false],
                            ['title_en' => 'A way to define middleware', 'title_ar' => 'طريقة لتحديد الوسطاء', 'title_fr' => 'Une manière de définir les middlewares', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            //PYTHON QUIZZES
            [
                'title_en' => 'Python Basics',
                'title_ar' => 'أساسيات لغة البرمجة Python',
                'title_fr' => 'Bases du langage de programmation Python',
                'description_en' => 'Test your fundamental knowledge of Python programming language.',
                'description_ar' => 'اختبار معرفتك الأساسية في لغة البرمجة Python.',
                'description_fr' => 'Testez vos connaissances fondamentales en langage de programmation Python.',
                'difficulty' => 1,
                'topic' => $topicIds['Python'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'Which symbol is used to comment out a line in Python?',
                        'title_ar' => 'ما هو الرمز المستخدم لتعليق خط في Python؟',
                        'title_fr' => 'Quel symbole est utilisé pour commenter une ligne en Python ?',
                        'options' => [
                            ['title_en' => '#', 'title_ar' => '#', 'title_fr' => '#', 'is_correct' => true],
                            ['title_en' => '//', 'title_ar' => '//', 'title_fr' => '//', 'is_correct' => false],
                            ['title_en' => '/* */', 'title_ar' => '/* */', 'title_fr' => '/* */', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used to declare a variable in Python?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لتعريف متغير في Python؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour déclarer une variable en Python ?',
                        'options' => [
                            ['title_en' => 'No keyword needed', 'title_ar' => 'لا حاجة لكلمة رئيسية', 'title_fr' => 'Aucun mot-clé nécessaire', 'is_correct' => true],
                            ['title_en' => 'var', 'title_ar' => 'var', 'title_fr' => 'var', 'is_correct' => false],
                            ['title_en' => 'let', 'title_ar' => 'let', 'title_fr' => 'let', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the correct syntax for a multi-line comment in Python?',
                        'title_ar' => 'ما هي بنية تعليق متعدد الأسطر في Python؟',
                        'title_fr' => 'Quelle est la syntaxe d’un commentaire multiligne en Python ?',
                        'options' => [
                            ['title_en' => '""" Comment """', 'title_ar' => '""" تعليق """', 'title_fr' => '""" Commentaire """', 'is_correct' => true],
                            ['title_en' => '/* Comment */', 'title_ar' => '/* تعليق */', 'title_fr' => '/* Commentaire */', 'is_correct' => false],
                            ['title_en' => '# Comment', 'title_ar' => '# تعليق', 'title_fr' => '# Commentaire', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which data type is used to represent a sequence of characters in Python?',
                        'title_ar' => 'ما هو نوع البيانات المستخدم لتمثيل تسلسل من الحروف في Python؟',
                        'title_fr' => 'Quel type de données est utilisé pour représenter une séquence de caractères en Python ?',
                        'options' => [
                            ['title_en' => 'string', 'title_ar' => 'string', 'title_fr' => 'string', 'is_correct' => true],
                            ['title_en' => 'int', 'title_ar' => 'int', 'title_fr' => 'int', 'is_correct' => false],
                            ['title_en' => 'float', 'title_ar' => 'float', 'title_fr' => 'float', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used to start a conditional statement in Python?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لبدء تصريح شرطي في Python؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour démarrer une instruction conditionnelle en Python ?',
                        'options' => [
                            ['title_en' => 'if', 'title_ar' => 'if', 'title_fr' => 'if', 'is_correct' => true],
                            ['title_en' => 'switch', 'title_ar' => 'switch', 'title_fr' => 'switch', 'is_correct' => false],
                            ['title_en' => 'case', 'title_ar' => 'case', 'title_fr' => 'case', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which function is used to print output in Python?',
                        'title_ar' => 'ما هي الوظيفة المستخدمة لإظهار الإخراج في Python؟',
                        'title_fr' => 'Quelle fonction est utilisée pour afficher la sortie en Python ?',
                        'options' => [
                            ['title_en' => 'print()', 'title_ar' => 'print()', 'title_fr' => 'print()', 'is_correct' => true],
                            ['title_en' => 'console.log()', 'title_ar' => 'console.log()', 'title_fr' => 'console.log()', 'is_correct' => false],
                            ['title_en' => 'echo()', 'title_ar' => 'echo()', 'title_fr' => 'echo()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which loop is used to iterate over a sequence in Python?',
                        'title_ar' => 'ما هي الحلقة المستخدمة للتكرار على تسلسل في Python؟',
                        'title_fr' => 'Quelle boucle est utilisée pour itérer sur une séquence en Python ?',
                        'options' => [
                            ['title_en' => 'for loop', 'title_ar' => 'حلقة for', 'title_fr' => 'boucle for', 'is_correct' => true],
                            ['title_en' => 'while loop', 'title_ar' => 'حلقة while', 'title_fr' => 'boucle while', 'is_correct' => false],
                            ['title_en' => 'do-while loop', 'title_ar' => 'حلقة do-while', 'title_fr' => 'boucle do-while', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `len()` function in Python?',
                        'title_ar' => 'ما هو الغرض من وظيفة `len()` في Python؟',
                        'title_fr' => 'Quel est le but de la fonction `len()` en Python ?',
                        'options' => [
                            ['title_en' => 'Returns the length of an object', 'title_ar' => 'يعيد طول الكائن', 'title_fr' => 'Retourne la longueur d’un objet', 'is_correct' => true],
                            ['title_en' => 'Converts a string to an integer', 'title_ar' => 'تحويل السلسلة إلى عدد صحيح', 'title_fr' => 'Convertit une chaîne en entier', 'is_correct' => false],
                            ['title_en' => 'Joins two strings', 'title_ar' => 'ضم سلسلتين', 'title_fr' => 'Concatène deux chaînes', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to append an item to a list in Python?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإضافة عنصر إلى قائمة في Python؟',
                        'title_fr' => 'Quelle méthode est utilisée pour ajouter un élément à une liste en Python ?',
                        'options' => [
                            ['title_en' => 'append()', 'title_ar' => 'append()', 'title_fr' => 'append()', 'is_correct' => true],
                            ['title_en' => 'add()', 'title_ar' => 'add()', 'title_fr' => 'add()', 'is_correct' => false],
                            ['title_en' => 'insert()', 'title_ar' => 'insert()', 'title_fr' => 'insert()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the difference between `==` and `is` operators in Python?',
                        'title_ar' => 'ما هو الاختلاف بين مشغلات `==` و `is` في Python؟',
                        'title_fr' => 'Quelle est la différence entre les opérateurs `==` et `is` en Python ?',
                        'options' => [
                            ['title_en' => '`==` checks for value equality, `is` checks for identity', 'title_ar' => '`==` يتحقق من تساوي القيم، `is` يتحقق من الهوية', 'title_fr' => '`==` vérifie l’égalité des valeurs, `is` vérifie l’identité', 'is_correct' => true],
                            ['title_en' => '`==` checks for identity, `is` checks for value equality', 'title_ar' => '`==` يتحقق من الهوية، `is` يتحقق من تساوي القيم', 'title_fr' => '`==` vérifie l’identité, `is` vérifie l’égalité des valeurs', 'is_correct' => false],
                            ['title_en' => '`==` and `is` are the same', 'title_ar' => '`==` و `is` هما نفسهما', 'title_fr' => '`==` et `is` sont les mêmes', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title_en' => 'Python Data Structures',
                'title_ar' => 'هيكلات البيانات في Python',
                'title_fr' => 'Structures de données en Python',
                'description_en' => 'Test your knowledge of Python data structures like lists, dictionaries, and sets.',
                'description_ar' => 'اختبار معرفتك بهيكلات البيانات في Python مثل القوائم والمصفوفات والمجموعات.',
                'description_fr' => 'Testez vos connaissances sur les structures de données en Python comme les listes, les dictionnaires et les ensembles.',
                'difficulty' => 2,
                'topic' => $topicIds['Python'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'Which data structure is used to store an ordered collection of items that can be accessed by index?',
                        'title_ar' => 'ما هي هيكل البيانات المستخدم لتخزين مجموعة مرتبة من العناصر التي يمكن الوصول إليها بواسطة الفهرس؟',
                        'title_fr' => 'Quelle structure de données est utilisée pour stocker une collection ordonnée d’éléments qui peuvent être accessibles par index ?',
                        'options' => [
                            ['title_en' => 'list', 'title_ar' => 'قائمة', 'title_fr' => 'liste', 'is_correct' => true],
                            ['title_en' => 'dictionary', 'title_ar' => 'قاموس', 'title_fr' => 'dictionnaire', 'is_correct' => false],
                            ['title_en' => 'set', 'title_ar' => 'مجموعة', 'title_fr' => 'ensemble', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which data structure is used to store key-value pairs?',
                        'title_ar' => 'ما هي هيكل البيانات المستخدم لتخزين زوجات المفاتيح والقيم؟',
                        'title_fr' => 'Quelle structure de données est utilisée pour stocker des paires clé-valeur ?',
                        'options' => [
                            ['title_en' => 'dictionary', 'title_ar' => 'قاموس', 'title_fr' => 'dictionnaire', 'is_correct' => true],
                            ['title_en' => 'list', 'title_ar' => 'قائمة', 'title_fr' => 'liste', 'is_correct' => false],
                            ['title_en' => 'set', 'title_ar' => 'مجموعة', 'title_fr' => 'ensemble', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to remove an item from a dictionary in Python?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإزالة عنصر من القاموس في Python؟',
                        'title_fr' => 'Quelle méthode est utilisée pour supprimer un élément d’un dictionnaire en Python ?',
                        'options' => [
                            ['title_en' => 'pop()', 'title_ar' => 'pop()', 'title_fr' => 'pop()', 'is_correct' => true],
                            ['title_en' => 'remove()', 'title_ar' => 'remove()', 'title_fr' => 'remove()', 'is_correct' => false],
                            ['title_en' => 'delete()', 'title_ar' => 'delete()', 'title_fr' => 'delete()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which data structure is used to store unique items?',
                        'title_ar' => 'ما هي هيكل البيانات المستخدم لتخزين العناصر الفريدة؟',
                        'title_fr' => 'Quelle structure de données est utilisée pour stocker des éléments uniques ?',
                        'options' => [
                            ['title_en' => 'set', 'title_ar' => 'مجموعة', 'title_fr' => 'ensemble', 'is_correct' => true],
                            ['title_en' => 'list', 'title_ar' => 'قائمة', 'title_fr' => 'liste', 'is_correct' => false],
                            ['title_en' => 'dictionary', 'title_ar' => 'قاموس', 'title_fr' => 'dictionnaire', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to add an item to a set in Python?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإضافة عنصر إلى المجموعة في Python؟',
                        'title_fr' => 'Quelle méthode est utilisée pour ajouter un élément à un ensemble en Python ?',
                        'options' => [
                            ['title_en' => 'add()', 'title_ar' => 'add()', 'title_fr' => 'add()', 'is_correct' => true],
                            ['title_en' => 'append()', 'title_ar' => 'append()', 'title_fr' => 'append()', 'is_correct' => false],
                            ['title_en' => 'insert()', 'title_ar' => 'insert()', 'title_fr' => 'insert()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `sorted()` function in Python?',
                        'title_ar' => 'ما هو الغرض من وظيفة `sorted()` في Python؟',
                        'title_fr' => 'Quel est le but de la fonction `sorted()` en Python ?',
                        'options' => [
                            ['title_en' => 'Returns a new sorted list from the elements of any iterable', 'title_ar' => 'يعيد قائمة مصنوعة جديدة من عناصر أي قابل للتكرار', 'title_fr' => 'Retourne une nouvelle liste triée à partir des éléments de tout itérable', 'is_correct' => true],
                            ['title_en' => 'Removes duplicates from a list', 'title_ar' => 'يزيل العناصر المكررة من القائمة', 'title_fr' => 'Supprime les doublons d’une liste', 'is_correct' => false],
                            ['title_en' => 'Reverses the order of elements in a list', 'title_ar' => 'عكس ترتيب العناصر في القائمة', 'title_fr' => 'Inverse l’ordre des éléments dans une liste', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to reverse the order of elements in a list in Python?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لعكس ترتيب العناصر في القائمة في Python؟',
                        'title_fr' => 'Quelle méthode est utilisée pour inverser l’ordre des éléments dans une liste en Python ?',
                        'options' => [
                            ['title_en' => 'reverse()', 'title_ar' => 'reverse()', 'title_fr' => 'reverse()', 'is_correct' => true],
                            ['title_en' => 'sort(reverse=True)', 'title_ar' => 'sort(reverse=True)', 'title_fr' => 'sort(reverse=True)', 'is_correct' => true],
                            ['title_en' => 'flip()', 'title_ar' => 'flip()', 'title_fr' => 'flip()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which data structure is used to store an ordered collection of items that cannot be modified after creation?',
                        'title_ar' => 'ما هي هيكل البيانات المستخدم لتخزين مجموعة مرتبة من العناصر التي لا يمكن تعديلها بعد الإنشاء؟',
                        'title_fr' => 'Quelle structure de données est utilisée pour stocker une collection ordonnée d’éléments qui ne peut pas être modifiée après la création ?',
                        'options' => [
                            ['title_en' => 'tuple', 'title_ar' => 'ترابل', 'title_fr' => 'tuple', 'is_correct' => true],
                            ['title_en' => 'list', 'title_ar' => 'قائمة', 'title_fr' => 'liste', 'is_correct' => false],
                            ['title_en' => 'set', 'title_ar' => 'مجموعة', 'title_fr' => 'ensemble', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to find the maximum value in a list in Python?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإيجاد القيمة القصوى في القائمة في Python؟',
                        'title_fr' => 'Quelle méthode est utilisée pour trouver la valeur maximale dans une liste en Python ?',
                        'options' => [
                            ['title_en' => 'max()', 'title_ar' => 'max()', 'title_fr' => 'max()', 'is_correct' => true],
                            ['title_en' => 'min()', 'title_ar' => 'min()', 'title_fr' => 'min()', 'is_correct' => false],
                            ['title_en' => 'sum()', 'title_ar' => 'sum()', 'title_fr' => 'sum()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `join()` method in Python?',
                        'title_ar' => 'ما هو الغرض من طريقة `join()` في Python؟',
                        'title_fr' => 'Quel est le but de la méthode `join()` en Python ?',
                        'options' => [
                            ['title_en' => 'Concatenates the elements of an iterable into a single string', 'title_ar' => 'ضم عناصر أي قابل للتكرار إلى سلسلة واحدة', 'title_fr' => 'Concatène les éléments d’un itérable en une seule chaîne', 'is_correct' => true],
                            ['title_en' => 'Splits a string into a list of substrings', 'title_ar' => 'تقسيم السلسلة إلى قائمة من السلاسل الفرعية', 'title_fr' => 'Divise une chaîne en une liste de sous-chaînes', 'is_correct' => false],
                            ['title_en' => 'Replaces a substring in a string', 'title_ar' => 'استبدال سلسلة فرعية في السلسلة', 'title_fr' => 'Remplace une sous-chaîne dans une chaîne', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title_en' => 'Advanced Python Concepts',
                'title_ar' => 'مفهوم Python المتقدمة',
                'title_fr' => 'Concepts avancés de Python',
                'description_en' => 'Challenge yourself with advanced Python concepts.',
                'description_ar' => 'احدي نفسك مع مفاهيم Python المتقدمة.',
                'description_fr' => 'Défiez-vous avec des concepts de Python avancés.',
                'difficulty' => 3,
                'topic' => $topicIds['Python'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'What is a lambda function in Python?',
                        'title_ar' => 'ما هو وظيفة سرية في Python؟',
                        'title_fr' => 'Qu’est-ce qu’une fonction lambda en Python ?',
                        'options' => [
                            ['title_en' => 'An anonymous function defined with the `lambda` keyword', 'title_ar' => 'وظيفة غير مسمى معرفة باستخدام الكلمة الرئيسية `lambda`', 'title_fr' => 'Une fonction anonyme définie avec le mot-clé `lambda`', 'is_correct' => true],
                            ['title_en' => 'A function that returns a boolean value', 'title_ar' => 'وظيفة ترجع قيمة منطقية', 'title_fr' => 'Une fonction qui retourne une valeur booléenne', 'is_correct' => false],
                            ['title_en' => 'A function that takes no arguments', 'title_ar' => 'وظيفة لا تأخذ أي وسيطات', 'title_fr' => 'Une fonction qui ne prend aucun argument', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used to define a generator function in Python?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لتعريف وظيفة مولد في Python؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour définir une fonction générateur en Python ?',
                        'options' => [
                            ['title_en' => 'yield', 'title_ar' => 'yield', 'title_fr' => 'yield', 'is_correct' => true],
                            ['title_en' => 'return', 'title_ar' => 'return', 'title_fr' => 'return', 'is_correct' => false],
                            ['title_en' => 'def', 'title_ar' => 'def', 'title_fr' => 'def', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `try` and `except` blocks in Python?',
                        'title_ar' => 'ما هو الغرض من كتل `try` و `except` في Python؟',
                        'title_fr' => 'Quel est le but des blocs `try` et `except` en Python ?',
                        'options' => [
                            ['title_en' => 'Handling exceptions and errors', 'title_ar' => 'معالجة الاستثناءات والأخطاء', 'title_fr' => 'Gestion des exceptions et des erreurs', 'is_correct' => true],
                            ['title_en' => 'Defining functions', 'title_ar' => 'تعريف وظائف', 'title_fr' => 'Définition des fonctions', 'is_correct' => false],
                            ['title_en' => 'Looping through collections', 'title_ar' => 'التكرار على المجموعات', 'title_fr' => 'Itération sur des collections', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to read a file in Python?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لقراءة ملف في Python؟',
                        'title_fr' => 'Quelle méthode est utilisée pour lire un fichier en Python ?',
                        'options' => [
                            ['title_en' => 'read()', 'title_ar' => 'read()', 'title_fr' => 'read()', 'is_correct' => true],
                            ['title_en' => 'write()', 'title_ar' => 'write()', 'title_fr' => 'write()', 'is_correct' => false],
                            ['title_en' => 'open()', 'title_ar' => 'open()', 'title_fr' => 'open()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `with` statement in Python?',
                        'title_ar' => 'ما هو الغرض من تصريح `with` في Python؟',
                        'title_fr' => 'Quel est le but de l’instruction `with` en Python ?',
                        'options' => [
                            ['title_en' => 'Ensuring proper acquisition and release of resources', 'title_ar' => 'ضمان الحصول الصحيح على إصدار الموارد', 'title_fr' => 'Garantir l’acquisition et la libération correctes des ressources', 'is_correct' => true],
                            ['title_en' => 'Defining functions', 'title_ar' => 'تعريف وظائف', 'title_fr' => 'Définition des fonctions', 'is_correct' => false],
                            ['title_en' => 'Looping through collections', 'title_ar' => 'التكرار على المجموعات', 'title_fr' => 'Itération sur des collections', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which module is used for regular expressions in Python?',
                        'title_ar' => 'ما هو الوحدة المستخدمة للتعبيرات العادية في Python؟',
                        'title_fr' => 'Quel module est utilisé pour les expressions régulières en Python ?',
                        'options' => [
                            ['title_en' => 're', 'title_ar' => 're', 'title_fr' => 're', 'is_correct' => true],
                            ['title_en' => 'regex', 'title_ar' => 'regex', 'title_fr' => 'regex', 'is_correct' => false],
                            ['title_en' => 'pattern', 'title_ar' => 'pattern', 'title_fr' => 'pattern', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `map()` function in Python?',
                        'title_ar' => 'ما هو الغرض من وظيفة `map()` في Python؟',
                        'title_fr' => 'Quel est le but de la fonction `map()` en Python ?',
                        'options' => [
                            ['title_en' => 'Applies a given function to all items in an input list', 'title_ar' => 'تطبيق وظيفة معينة على جميع العناصر في قائمة الإدخال', 'title_fr' => 'Applique une fonction donnée à tous les éléments d’une liste d’entrée', 'is_correct' => true],
                            ['title_en' => 'Filters items in a list based on a condition', 'title_ar' => 'تصفية العناصر في القائمة بناءً على شرط', 'title_fr' => 'Filtre les éléments d’une liste en fonction d’une condition', 'is_correct' => false],
                            ['title_en' => 'Joins two strings', 'title_ar' => 'ضم سلسلتين', 'title_fr' => 'Concatène deux chaînes', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to convert a string to a list of words in Python?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لتحويل السلسلة إلى قائمة من الكلمات في Python؟',
                        'title_fr' => 'Quelle méthode est utilisée pour convertir une chaîne en une liste de mots en Python ?',
                        'options' => [
                            ['title_en' => 'split()', 'title_ar' => 'split()', 'title_fr' => 'split()', 'is_correct' => true],
                            ['title_en' => 'join()', 'title_ar' => 'join()', 'title_fr' => 'join()', 'is_correct' => false],
                            ['title_en' => 'replace()', 'title_ar' => 'replace()', 'title_fr' => 'replace()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `__init__` method in Python?',
                        'title_ar' => 'ما هو الغرض من طريقة `__init__` في Python؟',
                        'title_fr' => 'Quel est le but de la méthode `__init__` en Python ?',
                        'options' => [
                            ['title_en' => 'Initializer method called when a new instance of a class is created', 'title_ar' => 'طريقة مهيزة يتم استدعاؤها عند إنشاء مثيل جديد من الفئة', 'title_fr' => 'Méthode d’initialisation appelée lors de la création d’une nouvelle instance de classe', 'is_correct' => true],
                            ['title_en' => 'Destructor method called when an instance is destroyed', 'title_ar' => 'طريقة مهملة يتم استدعاؤها عند إلغاء مثيل', 'title_fr' => 'Méthode destructeur appelée lors de la destruction d’une instance', 'is_correct' => false],
                            ['title_en' => 'Method to define class attributes', 'title_ar' => 'طريقة لتعريف خصائص الفئة', 'title_fr' => 'Méthode pour définir les attributs de classe', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which keyword is used to define a class in Python?',
                        'title_ar' => 'ما هو الكلمة الرئيسية المستخدمة لتعريف فئة في Python؟',
                        'title_fr' => 'Quel mot-clé est utilisé pour définir une classe en Python ?',
                        'options' => [
                            ['title_en' => 'class', 'title_ar' => 'class', 'title_fr' => 'class', 'is_correct' => true],
                            ['title_en' => 'def', 'title_ar' => 'def', 'title_fr' => 'def', 'is_correct' => false],
                            ['title_en' => 'function', 'title_ar' => 'function', 'title_fr' => 'function', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            //GIT QUIZZES
            [
                'title_en' => 'Git Basics',
                'title_ar' => 'أساسيات Git',
                'title_fr' => 'Bases de Git',
                'description_en' => 'Test your fundamental knowledge of Git version control system.',
                'description_ar' => 'اختبار معرفتك الأساسية في نظام التحكم في الإصدارات Git.',
                'description_fr' => 'Testez vos connaissances fondamentales sur le système de contrôle de versions Git.',
                'difficulty' => 1,
                'topic' => $topicIds['Git'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'Which symbol is used to end a statement in Git commands?',
                        'title_ar' => 'ما هو الرمز المستخدم لإنهاء أمر في أوامر Git؟',
                        'title_fr' => 'Quel symbole est utilisé pour terminer une commande Git ?',
                        'options' => [
                            ['title_en' => 'No symbol needed', 'title_ar' => 'لا حاجة لرمز', 'title_fr' => 'Aucun symbole nécessaire', 'is_correct' => true],
                            ['title_en' => ';', 'title_ar' => ';', 'title_fr' => ';', 'is_correct' => false],
                            ['title_en' => '.', 'title_ar' => '.', 'title_fr' => '.', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command initializes a new Git repository?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء مستودع Git جديد؟',
                        'title_fr' => 'Quelle commande initialise un nouveau dépôt Git ?',
                        'options' => [
                            ['title_en' => 'git init', 'title_ar' => 'git init', 'title_fr' => 'git init', 'is_correct' => true],
                            ['title_en' => 'git clone', 'title_ar' => 'git clone', 'title_fr' => 'git clone', 'is_correct' => false],
                            ['title_en' => 'git pull', 'title_ar' => 'git pull', 'title_fr' => 'git pull', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to stage changes in Git?',
                        'title_ar' => 'ما هو الأمر المستخدم لإعداد التغييرات في Git؟',
                        'title_fr' => 'Quelle commande est utilisée pour indexer les modifications en Git ?',
                        'options' => [
                            ['title_en' => 'git add', 'title_ar' => 'git add', 'title_fr' => 'git add', 'is_correct' => true],
                            ['title_en' => 'git commit', 'title_ar' => 'git commit', 'title_fr' => 'git commit', 'is_correct' => false],
                            ['title_en' => 'git push', 'title_ar' => 'git push', 'title_fr' => 'git push', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to commit changes in Git?',
                        'title_ar' => 'ما هو الأمر المستخدم لالتزام التغييرات في Git؟',
                        'title_fr' => 'Quelle commande est utilisée pour valider les modifications en Git ?',
                        'options' => [
                            ['title_en' => 'git commit', 'title_ar' => 'git commit', 'title_fr' => 'git commit', 'is_correct' => true],
                            ['title_en' => 'git add', 'title_ar' => 'git add', 'title_fr' => 'git add', 'is_correct' => false],
                            ['title_en' => 'git push', 'title_ar' => 'git push', 'title_fr' => 'git push', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to push changes to a remote repository?',
                        'title_ar' => 'ما هو الأمر المستخدم لإرسال التغييرات إلى مستودع بعيد؟',
                        'title_fr' => 'Quelle commande est utilisée pour pousser les modifications vers un dépôt distant ?',
                        'options' => [
                            ['title_en' => 'git push', 'title_ar' => 'git push', 'title_fr' => 'git push', 'is_correct' => true],
                            ['title_en' => 'git pull', 'title_ar' => 'git pull', 'title_fr' => 'git pull', 'is_correct' => false],
                            ['title_en' => 'git fetch', 'title_ar' => 'git fetch', 'title_fr' => 'git fetch', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to check the status of changes in the working directory?',
                        'title_ar' => 'ما هو الأمر المستخدم لفحص حالة التغييرات في الدليل الحالي؟',
                        'title_fr' => 'Quelle commande est utilisée pour vérifier l’état des modifications dans le répertoire de travail ?',
                        'options' => [
                            ['title_en' => 'git status', 'title_ar' => 'git status', 'title_fr' => 'git status', 'is_correct' => true],
                            ['title_en' => 'git diff', 'title_ar' => 'git diff', 'title_fr' => 'git diff', 'is_correct' => false],
                            ['title_en' => 'git log', 'title_ar' => 'git log', 'title_fr' => 'git log', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to view differences between changes in the working directory and the last commit?',
                        'title_ar' => 'ما هو الأمر المستخدم لرؤية الاختلافات بين التغييرات في الدليل الحالي والالتزام الأخير؟',
                        'title_fr' => 'Quelle commande est utilisée pour voir les différences entre les modifications dans le répertoire de travail et le dernier commit ?',
                        'options' => [
                            ['title_en' => 'git diff', 'title_ar' => 'git diff', 'title_fr' => 'git diff', 'is_correct' => true],
                            ['title_en' => 'git status', 'title_ar' => 'git status', 'title_fr' => 'git status', 'is_correct' => false],
                            ['title_en' => 'git log', 'title_ar' => 'git log', 'title_fr' => 'git log', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to view the commit history?',
                        'title_ar' => 'ما هو الأمر المستخدم لعرض تاريخ التزامات؟',
                        'title_fr' => 'Quelle commande est utilisée pour afficher l’historique des commits ?',
                        'options' => [
                            ['title_en' => 'git log', 'title_ar' => 'git log', 'title_fr' => 'git log', 'is_correct' => true],
                            ['title_en' => 'git diff', 'title_ar' => 'git diff', 'title_fr' => 'git diff', 'is_correct' => false],
                            ['title_en' => 'git status', 'title_ar' => 'git status', 'title_fr' => 'git status', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to create a new branch in Git?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء فرع جديد في Git؟',
                        'title_fr' => 'Quelle commande est utilisée pour créer une nouvelle branche en Git ?',
                        'options' => [
                            ['title_en' => 'git branch', 'title_ar' => 'git branch', 'title_fr' => 'git branch', 'is_correct' => true],
                            ['title_en' => 'git checkout', 'title_ar' => 'git checkout', 'title_fr' => 'git checkout', 'is_correct' => false],
                            ['title_en' => 'git merge', 'title_ar' => 'git merge', 'title_fr' => 'git merge', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to switch to a different branch in Git?',
                        'title_ar' => 'ما هو الأمر المستخدم للتبديل إلى فرع مختلف في Git؟',
                        'title_fr' => 'Quelle commande est utilisée pour basculer vers une branche différente en Git ?',
                        'options' => [
                            ['title_en' => 'git checkout', 'title_ar' => 'git checkout', 'title_fr' => 'git checkout', 'is_correct' => true],
                            ['title_en' => 'git branch', 'title_ar' => 'git branch', 'title_fr' => 'git branch', 'is_correct' => false],
                            ['title_en' => 'git merge', 'title_ar' => 'git merge', 'title_fr' => 'git merge', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to merge changes from one branch into another?',
                        'title_ar' => 'ما هو الأمر المستخدم لدمج التغييرات من فرع إلى آخر؟',
                        'title_fr' => 'Quelle commande est utilisée pour fusionner les modifications d’une branche dans une autre ?',
                        'options' => [
                            ['title_en' => 'git merge', 'title_ar' => 'git merge', 'title_fr' => 'git merge', 'is_correct' => true],
                            ['title_en' => 'git checkout', 'title_ar' => 'git checkout', 'title_fr' => 'git checkout', 'is_correct' => false],
                            ['title_en' => 'git branch', 'title_ar' => 'git branch', 'title_fr' => 'git branch', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to clone a remote repository to your local machine?',
                        'title_ar' => 'ما هو الأمر المستخدم لنسخ مستودع بعيد إلى جهازك المحلي؟',
                        'title_fr' => 'Quelle commande est utilisée pour cloner un dépôt distant sur votre machine locale ?',
                        'options' => [
                            ['title_en' => 'git clone', 'title_ar' => 'git clone', 'title_fr' => 'git clone', 'is_correct' => true],
                            ['title_en' => 'git pull', 'title_ar' => 'git pull', 'title_fr' => 'git pull', 'is_correct' => false],
                            ['title_en' => 'git fetch', 'title_ar' => 'git fetch', 'title_fr' => 'git fetch', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to fetch changes from a remote repository without merging them?',
                        'title_ar' => 'ما هو الأمر المستخدم لاستحضار التغييرات من مستودع بعيد دون دمجها؟',
                        'title_fr' => 'Quelle commande est utilisée pour récupérer les modifications d’un dépôt distant sans les fusionner ?',
                        'options' => [
                            ['title_en' => 'git fetch', 'title_ar' => 'git fetch', 'title_fr' => 'git fetch', 'is_correct' => true],
                            ['title_en' => 'git pull', 'title_ar' => 'git pull', 'title_fr' => 'git pull', 'is_correct' => false],
                            ['title_en' => 'git clone', 'title_ar' => 'git clone', 'title_fr' => 'git clone', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to undo changes in the working directory that have not been staged?',
                        'title_ar' => 'ما هو الأمر المستخدم لإلغاء التغييرات في الدليل الحالي التي لم يتم إعدادها؟',
                        'title_fr' => 'Quelle commande est utilisée pour annuler les modifications dans le répertoire de travail qui n’ont pas été indexées ?',
                        'options' => [
                            ['title_en' => 'git checkout -- <file>', 'title_ar' => 'git checkout -- <ملف>', 'title_fr' => 'git checkout -- <fichier>', 'is_correct' => true],
                            ['title_en' => 'git reset HEAD <file>', 'title_ar' => 'git reset HEAD <ملف>', 'title_fr' => 'git reset HEAD <fichier>', 'is_correct' => false],
                            ['title_en' => 'git revert', 'title_ar' => 'git revert', 'title_fr' => 'git revert', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to remove a file from the working directory and stage the removal?',
                        'title_ar' => 'ما هو الأمر المستخدم لإزالة ملف من الدليل الحالي وإعداد الإزالة؟',
                        'title_fr' => 'Quelle commande est utilisée pour supprimer un fichier du répertoire de travail et indexer la suppression ?',
                        'options' => [
                            ['title_en' => 'git rm', 'title_ar' => 'git rm', 'title_fr' => 'git rm', 'is_correct' => true],
                            ['title_en' => 'git add', 'title_ar' => 'git add', 'title_fr' => 'git add', 'is_correct' => false],
                            ['title_en' => 'git commit', 'title_ar' => 'git commit', 'title_fr' => 'git commit', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to view the differences between the changes in the staging area and the last commit?',
                        'title_ar' => 'ما هو الأمر المستخدم لرؤية الاختلافات بين التغييرات في منطقة التحضير والالتزام الأخير؟',
                        'title_fr' => 'Quelle commande est utilisée pour voir les différences entre les modifications dans la zone d’indexation et le dernier commit ?',
                        'options' => [
                            ['title_en' => 'git diff --cached', 'title_ar' => 'git diff --cached', 'title_fr' => 'git diff --cached', 'is_correct' => true],
                            ['title_en' => 'git diff', 'title_ar' => 'git diff', 'title_fr' => 'git diff', 'is_correct' => false],
                            ['title_en' => 'git log', 'title_ar' => 'git log', 'title_fr' => 'git log', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to create a new tag in Git?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء علامة جديدة في Git؟',
                        'title_fr' => 'Quelle commande est utilisée pour créer une nouvelle étiquette en Git ?',
                        'options' => [
                            ['title_en' => 'git tag', 'title_ar' => 'git tag', 'title_fr' => 'git tag', 'is_correct' => true],
                            ['title_en' => 'git branch', 'title_ar' => 'git branch', 'title_fr' => 'git branch', 'is_correct' => false],
                            ['title_en' => 'git merge', 'title_ar' => 'git merge', 'title_fr' => 'git merge', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to view all branches in a Git repository?',
                        'title_ar' => 'ما هو الأمر المستخدم لعرض جميع الفروع في مستودع Git؟',
                        'title_fr' => 'Quelle commande est utilisée pour afficher toutes les branches dans un dépôt Git ?',
                        'options' => [
                            ['title_en' => 'git branch', 'title_ar' => 'git branch', 'title_fr' => 'git branch', 'is_correct' => true],
                            ['title_en' => 'git checkout', 'title_ar' => 'git checkout', 'title_fr' => 'git checkout', 'is_correct' => false],
                            ['title_en' => 'git log', 'title_ar' => 'git log', 'title_fr' => 'git log', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to resolve merge conflicts in Git?',
                        'title_ar' => 'ما هو الأمر المستخدم لحل تعارضات الدمج في Git؟',
                        'title_fr' => 'Quelle commande est utilisée pour résoudre les conflits de fusion en Git ?',
                        'options' => [
                            ['title_en' => 'git merge', 'title_ar' => 'git merge', 'title_fr' => 'git merge', 'is_correct' => false],
                            ['title_en' => 'git add', 'title_ar' => 'git add', 'title_fr' => 'git add', 'is_correct' => true],
                            ['title_en' => 'git commit', 'title_ar' => 'git commit', 'title_fr' => 'git commit', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to create a new repository from an existing directory?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء مستودع جديد من دليل موجود؟',
                        'title_fr' => 'Quelle commande est utilisée pour créer un nouveau dépôt à partir d’un répertoire existant ?',
                        'options' => [
                            ['title_en' => 'git init', 'title_ar' => 'git init', 'title_fr' => 'git init', 'is_correct' => true],
                            ['title_en' => 'git clone', 'title_ar' => 'git clone', 'title_fr' => 'git clone', 'is_correct' => false],
                            ['title_en' => 'git pull', 'title_ar' => 'git pull', 'title_fr' => 'git pull', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to view the differences between the changes in the working directory and the staging area?',
                        'title_ar' => 'ما هو الأمر المستخدم لرؤية الاختلافات بين التغييرات في الدليل الحالي ومنطقة التحضير؟',
                        'title_fr' => 'Quelle commande est utilisée pour voir les différences entre les modifications dans le répertoire de travail et la zone d’indexation ?',
                        'options' => [
                            ['title_en' => 'git diff', 'title_ar' => 'git diff', 'title_fr' => 'git diff', 'is_correct' => true],
                            ['title_en' => 'git diff --cached', 'title_ar' => 'git diff --cached', 'title_fr' => 'git diff --cached', 'is_correct' => false],
                            ['title_en' => 'git log', 'title_ar' => 'git log', 'title_fr' => 'git log', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to undo changes in the staging area?',
                        'title_ar' => 'ما هو الأمر المستخدم لإلغاء التغييرات في منطقة التحضير؟',
                        'title_fr' => 'Quelle commande est utilisée pour annuler les modifications dans la zone d’indexation ?',
                        'options' => [
                            ['title_en' => 'git reset HEAD <file>', 'title_ar' => 'git reset HEAD <ملف>', 'title_fr' => 'git reset HEAD <fichier>', 'is_correct' => true],
                            ['title_en' => 'git checkout -- <file>', 'title_ar' => 'git checkout -- <ملف>', 'title_fr' => 'git checkout -- <fichier>', 'is_correct' => false],
                            ['title_en' => 'git revert', 'title_ar' => 'git revert', 'title_fr' => 'git revert', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to create and switch to a new branch in one step?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء وتبديل إلى فرع جديد في خطوة واحدة؟',
                        'title_fr' => 'Quelle commande est utilisée pour créer et basculer vers une nouvelle branche en une seule étape ?',
                        'options' => [
                            ['title_en' => 'git checkout -b <branchname>', 'title_ar' => 'git checkout -b <اسم الفرع>', 'title_fr' => 'git checkout -b <nom-de-branche>', 'is_correct' => true],
                            ['title_en' => 'git branch <branchname>', 'title_ar' => 'git branch <اسم الفرع>', 'title_fr' => 'git branch <nom-de-branche>', 'is_correct' => false],
                            ['title_en' => 'git merge <branchname>', 'title_ar' => 'git merge <اسم الفرع>', 'title_fr' => 'git merge <nom-de-branche>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to view the differences between two commits?',
                        'title_ar' => 'ما هو الأمر المستخدم لرؤية الاختلافات بين اثنين من التزامات؟',
                        'title_fr' => 'Quelle commande est utilisée pour voir les différences entre deux commits ?',
                        'options' => [
                            ['title_en' => 'git diff <commit1> <commit2>', 'title_ar' => 'git diff <التزام1> <التزام2>', 'title_fr' => 'git diff <commit1> <commit2>', 'is_correct' => true],
                            ['title_en' => 'git log', 'title_ar' => 'git log', 'title_fr' => 'git log', 'is_correct' => false],
                            ['title_en' => 'git show', 'title_ar' => 'git show', 'title_fr' => 'git show', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to apply changes from a remote repository without merging them into your current branch?',
                        'title_ar' => 'ما هو الأمر المستخدم لتطبيق التغييرات من مستودع بعيد دون دمجها في فرعك الحالي؟',
                        'title_fr' => 'Quelle commande est utilisée pour appliquer les modifications d’un dépôt distant sans les fusionner dans votre branche actuelle ?',
                        'options' => [
                            ['title_en' => 'git fetch', 'title_ar' => 'git fetch', 'title_fr' => 'git fetch', 'is_correct' => true],
                            ['title_en' => 'git pull', 'title_ar' => 'git pull', 'title_fr' => 'git pull', 'is_correct' => false],
                            ['title_en' => 'git clone', 'title_ar' => 'git clone', 'title_fr' => 'git clone', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to undo a commit and create a new commit with the undone changes?',
                        'title_ar' => 'ما هو الأمر المستخدم لإلغاء تزام وتوفير تزام جديد مع التغييرات الملغاة؟',
                        'title_fr' => 'Quelle commande est utilisée pour annuler un commit et créer un nouveau commit avec les modifications annulées ?',
                        'options' => [
                            ['title_en' => 'git revert', 'title_ar' => 'git revert', 'title_fr' => 'git revert', 'is_correct' => true],
                            ['title_en' => 'git reset', 'title_ar' => 'git reset', 'title_fr' => 'git reset', 'is_correct' => false],
                            ['title_en' => 'git checkout', 'title_ar' => 'git checkout', 'title_fr' => 'git checkout', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to undo changes in the working directory and staging area?',
                        'title_ar' => 'ما هو الأمر المستخدم لإلغاء التغييرات في الدليل الحالي ومنطقة التحضير؟',
                        'title_fr' => 'Quelle commande est utilisée pour annuler les modifications dans le répertoire de travail et la zone d’indexation ?',
                        'options' => [
                            ['title_en' => 'git reset --hard', 'title_ar' => 'git reset --hard', 'title_fr' => 'git reset --hard', 'is_correct' => true],
                            ['title_en' => 'git checkout -- <file>', 'title_ar' => 'git checkout -- <ملف>', 'title_fr' => 'git checkout -- <fichier>', 'is_correct' => false],
                            ['title_en' => 'git revert', 'title_ar' => 'git revert', 'title_fr' => 'git revert', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to view the differences between the changes in the working directory and the last commit?',
                        'title_ar' => 'ما هو الأمر المستخدم لرؤية الاختلافات بين التغييرات في الدليل الحالي والالتزام الأخير؟',
                        'title_fr' => 'Quelle commande est utilisée pour voir les différences entre les modifications dans le répertoire de travail et le dernier commit ?',
                        'options' => [
                            ['title_en' => 'git diff', 'title_ar' => 'git diff', 'title_fr' => 'git diff', 'is_correct' => true],
                            ['title_en' => 'git diff --cached', 'title_ar' => 'git diff --cached', 'title_fr' => 'git diff --cached', 'is_correct' => false],
                            ['title_en' => 'git log', 'title_ar' => 'git log', 'title_fr' => 'git log', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to undo a commit and keep the changes in the working directory?',
                        'title_ar' => 'ما هو الأمر المستخدم لإلغاء تزام واستعادة التغييرات في الدليل الحالي؟',
                        'title_fr' => 'Quelle commande est utilisée pour annuler un commit et conserver les modifications dans le répertoire de travail ?',
                        'options' => [
                            ['title_en' => 'git reset HEAD~1', 'title_ar' => 'git reset HEAD~1', 'title_fr' => 'git reset HEAD~1', 'is_correct' => true],
                            ['title_en' => 'git revert', 'title_ar' => 'git revert', 'title_fr' => 'git revert', 'is_correct' => false],
                            ['title_en' => 'git checkout', 'title_ar' => 'git checkout', 'title_fr' => 'git checkout', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to view the changes in the last commit?',
                        'title_ar' => 'ما هو الأمر المستخدم لرؤية التغييرات في التزام الأخير؟',
                        'title_fr' => 'Quelle commande est utilisée pour voir les modifications dans le dernier commit ?',
                        'options' => [
                            ['title_en' => 'git show', 'title_ar' => 'git show', 'title_fr' => 'git show', 'is_correct' => true],
                            ['title_en' => 'git diff', 'title_ar' => 'git diff', 'title_fr' => 'git diff', 'is_correct' => false],
                            ['title_en' => 'git log', 'title_ar' => 'git log', 'title_fr' => 'git log', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to undo a commit and discard the changes?',
                        'title_ar' => 'ما هو الأمر المستخدم لإلغاء تزام وإزالة التغييرات؟',
                        'title_fr' => 'Quelle commande est utilisée pour annuler un commit et jeter les modifications ?',
                        'options' => [
                            ['title_en' => 'git reset --hard HEAD~1', 'title_ar' => 'git reset --hard HEAD~1', 'title_fr' => 'git reset --hard HEAD~1', 'is_correct' => true],
                            ['title_en' => 'git revert', 'title_ar' => 'git revert', 'title_fr' => 'git revert', 'is_correct' => false],
                            ['title_en' => 'git checkout', 'title_ar' => 'git checkout', 'title_fr' => 'git checkout', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to view the commit history with a graphical representation?',
                        'title_ar' => 'ما هو الأمر المستخدم لعرض تاريخ التزامات مع تمثيل رسومي؟',
                        'title_fr' => 'Quelle commande est utilisée pour afficher l’historique des commits avec une représentation graphique ?',
                        'options' => [
                            ['title_en' => 'git log --graph', 'title_ar' => 'git log --graph', 'title_fr' => 'git log --graph', 'is_correct' => true],
                            ['title_en' => 'git log', 'title_ar' => 'git log', 'title_fr' => 'git log', 'is_correct' => false],
                            ['title_en' => 'git show', 'title_ar' => 'git show', 'title_fr' => 'git show', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to create a new remote repository?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء مستودع بعيد جديد؟',
                        'title_fr' => 'Quelle commande est utilisée pour créer un nouveau dépôt distant ?',
                        'options' => [
                            ['title_en' => 'git remote add <remote-name> <url>', 'title_ar' => 'git remote add <اسم المستودع> <الرابط>', 'title_fr' => 'git remote add <nom-du-distant> <url>', 'is_correct' => true],
                            ['title_en' => 'git clone', 'title_ar' => 'git clone', 'title_fr' => 'git clone', 'is_correct' => false],
                            ['title_en' => 'git push', 'title_ar' => 'git push', 'title_fr' => 'git push', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to view the list of remote repositories?',
                        'title_ar' => 'ما هو الأمر المستخدم لعرض قائمة المستودعات البعيدة؟',
                        'title_fr' => 'Quelle commande est utilisée pour afficher la liste des dépôts distants ?',
                        'options' => [
                            ['title_en' => 'git remote -v', 'title_ar' => 'git remote -v', 'title_fr' => 'git remote -v', 'is_correct' => true],
                            ['title_en' => 'git branch', 'title_ar' => 'git branch', 'title_fr' => 'git branch', 'is_correct' => false],
                            ['title_en' => 'git log', 'title_ar' => 'git log', 'title_fr' => 'git log', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to merge a branch into the current branch and create a new merge commit?',
                        'title_ar' => 'ما هو الأمر المستخدم لدمج فرع في فرعك الحالي وإنشاء تزام دمج جديد؟',
                        'title_fr' => 'Quelle commande est utilisée pour fusionner une branche dans la branche actuelle et créer un nouveau commit de fusion ?',
                        'options' => [
                            ['title_en' => 'git merge <branchname>', 'title_ar' => 'git merge <اسم الفرع>', 'title_fr' => 'git merge <nom-de-branche>', 'is_correct' => true],
                            ['title_en' => 'git rebase <branchname>', 'title_ar' => 'git rebase <اسم الفرع>', 'title_fr' => 'git rebase <nom-de-branche>', 'is_correct' => false],
                            ['title_en' => 'git checkout <branchname>', 'title_ar' => 'git checkout <اسم الفرع>', 'title_fr' => 'git checkout <nom-de-branche>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to apply changes from one commit to another branch?',
                        'title_ar' => 'ما هو الأمر المستخدم لتطبيق التغييرات من تزام إلى فرع آخر؟',
                        'title_fr' => 'Quelle commande est utilisée pour appliquer les modifications d’un commit vers une autre branche ?',
                        'options' => [
                            ['title_en' => 'git cherry-pick <commit>', 'title_ar' => 'git cherry-pick <التزام>', 'title_fr' => 'git cherry-pick <commit>', 'is_correct' => true],
                            ['title_en' => 'git merge <commit>', 'title_ar' => 'git merge <التزام>', 'title_fr' => 'git merge <commit>', 'is_correct' => false],
                            ['title_en' => 'git rebase <commit>', 'title_ar' => 'git rebase <التزام>', 'title_fr' => 'git rebase <commit>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to undo a commit and apply the changes to the working directory?',
                        'title_ar' => 'ما هو الأمر المستخدم لإلغاء تزام وإعادة تطبيق التغييرات في الدليل الحالي؟',
                        'title_fr' => 'Quelle commande est utilisée pour annuler un commit et appliquer les modifications dans le répertoire de travail ?',
                        'options' => [
                            ['title_en' => 'git reset --soft HEAD~1', 'title_ar' => 'git reset --soft HEAD~1', 'title_fr' => 'git reset --soft HEAD~1', 'is_correct' => true],
                            ['title_en' => 'git reset --hard HEAD~1', 'title_ar' => 'git reset --hard HEAD~1', 'title_fr' => 'git reset --hard HEAD~1', 'is_correct' => false],
                            ['title_en' => 'git revert', 'title_ar' => 'git revert', 'title_fr' => 'git revert', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to apply changes from a remote repository and merge them into the current branch?',
                        'title_ar' => 'ما هو الأمر المستخدم لتطبيق التغييرات من مستودع بعيد وإدراجه في فرعك الحالي؟',
                        'title_fr' => 'Quelle commande est utilisée pour appliquer les modifications d’un dépôt distant et les fusionner dans la branche actuelle ?',
                        'options' => [
                            ['title_en' => 'git pull', 'title_ar' => 'git pull', 'title_fr' => 'git pull', 'is_correct' => true],
                            ['title_en' => 'git fetch', 'title_ar' => 'git fetch', 'title_fr' => 'git fetch', 'is_correct' => false],
                            ['title_en' => 'git clone', 'title_ar' => 'git clone', 'title_fr' => 'git clone', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to create a new tag in Git?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء علامة جديدة في Git؟',
                        'title_fr' => 'Quelle commande est utilisée pour créer une nouvelle étiquette en Git ?',
                        'options' => [
                            ['title_en' => 'git tag', 'title_ar' => 'git tag', 'title_fr' => 'git tag', 'is_correct' => true],
                            ['title_en' => 'git branch', 'title_ar' => 'git branch', 'title_fr' => 'git branch', 'is_correct' => false],
                            ['title_en' => 'git merge', 'title_ar' => 'git merge', 'title_fr' => 'git merge', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            //REACT QUIZZES
            [
                'title_en' => 'React Basics',
                'title_ar' => 'أساسيات React',
                'title_fr' => 'Bases de React',
                'description_en' => 'Test your fundamental knowledge of the React library.',
                'description_ar' => 'اختبار معرفتك الأساسية بمكتبة React.',
                'description_fr' => 'Testez vos connaissances fondamentales sur la bibliothèque React.',
                'difficulty' => 1,
                'topic' => $topicIds['React'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'What is React?',
                        'title_ar' => 'ما هو React؟',
                        'title_fr' => 'Qu’est-ce que React ?',
                        'options' => [
                            ['title_en' => 'A JavaScript library for building user interfaces', 'title_ar' => 'مكتبة JavaScript لبناء واجهات المستخدم', 'title_fr' => 'Une bibliothèque JavaScript pour créer des interfaces utilisateur', 'is_correct' => true],
                            ['title_en' => 'A full-stack web framework', 'title_ar' => 'إطار عمل ويب كامل', 'title_fr' => 'Un cadre web full-stack', 'is_correct' => false],
                            ['title_en' => 'A CSS preprocessor', 'title_ar' => 'معالج CSS مسبق', 'title_fr' => 'Un préprocesseur CSS', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which company originally developed React?',
                        'title_ar' => 'أي شركة طورت React لأول مرة؟',
                        'title_fr' => 'Quelle entreprise a initialement développé React ?',
                        'options' => [
                            ['title_en' => 'Facebook', 'title_ar' => 'فيسبوك', 'title_fr' => 'Facebook', 'is_correct' => true],
                            ['title_en' => 'Google', 'title_ar' => 'جوجل', 'title_fr' => 'Google', 'is_correct' => false],
                            ['title_en' => 'Microsoft', 'title_ar' => 'مايكروسوفت', 'title_fr' => 'Microsoft', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is JSX?',
                        'title_ar' => 'ماذا يعني JSX؟',
                        'title_fr' => 'Qu’est-ce que JSX ?',
                        'options' => [
                            ['title_en' => 'A syntax extension for JavaScript that allows HTML-like code in React', 'title_ar' => 'امتداد للنحو لـ JavaScript يسمح باستخدام كود مشابه لـ HTML في React', 'title_fr' => 'Une extension de syntaxe pour JavaScript qui permet du code ressemblant à HTML dans React', 'is_correct' => true],
                            ['title_en' => 'A new programming language', 'title_ar' => 'لغة برمجة جديدة', 'title_fr' => 'Un nouveau langage de programmation', 'is_correct' => false],
                            ['title_en' => 'A type of database', 'title_ar' => 'نوع من قواعد البيانات', 'title_fr' => 'Un type de base de données', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'How do you create a React component?',
                        'title_ar' => 'كيف تنشئ مكونًا في React؟',
                        'title_fr' => 'Comment créez-vous un composant React ?',
                        'options' => [
                            ['title_en' => 'Using a function or a class', 'title_ar' => 'باستخدام دالة أو فئة', 'title_fr' => 'En utilisant une fonction ou une classe', 'is_correct' => true],
                            ['title_en' => 'Using a loop', 'title_ar' => 'باستخدام حلقة', 'title_fr' => 'En utilisant une boucle', 'is_correct' => false],
                            ['title_en' => 'Using a variable', 'title_ar' => 'باستخدام متغير', 'title_fr' => 'En utilisant une variable', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of props in React?',
                        'title_ar' => 'ما هو الغرض من props في React؟',
                        'title_fr' => 'Quel est le but des props dans React ?',
                        'options' => [
                            ['title_en' => 'To pass data from parent to child components', 'title_ar' => 'لتمرير البيانات من المكون الأب إلى المكون الابن', 'title_fr' => 'Pour passer des données d’un composant parent à un composant enfant', 'is_correct' => true],
                            ['title_en' => 'To store state', 'title_ar' => 'لتخزين الحالة', 'title_fr' => 'Pour stocker l’état', 'is_correct' => false],
                            ['title_en' => 'To define styles', 'title_ar' => 'لتعريف الأنماط', 'title_fr' => 'Pour définir les styles', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the correct way to import React?',
                        'title_ar' => 'ما هو الطريقة الصحيحة لاستيراد React؟',
                        'title_fr' => 'Quelle est la bonne manière d’importer React ?',
                        'options' => [
                            ['title_en' => 'import React from "react";', 'title_ar' => 'import React from "react";', 'title_fr' => 'import React from "react";', 'is_correct' => true],
                            ['title_en' => 'require("react");', 'title_ar' => 'require("react");', 'title_fr' => 'require("react");', 'is_correct' => false],
                            ['title_en' => 'include "react";', 'title_ar' => 'include "react";', 'title_fr' => 'include "react";', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `useState` hook?',
                        'title_ar' => 'ما هو الغرض من Hook `useState`؟',
                        'title_fr' => 'Quel est le but du hook `useState` ?',
                        'options' => [
                            ['title_en' => 'To add state to functional components', 'title_ar' => 'لإضافة حالة للمكونات الوظيفية', 'title_fr' => 'Pour ajouter un état aux composants fonctionnels', 'is_correct' => true],
                            ['title_en' => 'To manage side effects', 'title_ar' => 'لإدارة التأثيرات الجانبية', 'title_fr' => 'Pour gérer les effets secondaires', 'is_correct' => false],
                            ['title_en' => 'To define routes', 'title_ar' => 'لتعريف المسارات', 'title_fr' => 'Pour définir les routes', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `useEffect` hook?',
                        'title_ar' => 'ما هو الغرض من Hook `useEffect`؟',
                        'title_fr' => 'Quel est le but du hook `useEffect` ?',
                        'options' => [
                            ['title_en' => 'To handle side effects such as data fetching or subscriptions', 'title_ar' => 'للحصول على بيانات أو إدارة الاشتراكات', 'title_fr' => 'Pour gérer les effets secondaires tels que la récupération de données ou les abonnements', 'is_correct' => true],
                            ['title_en' => 'To define styles', 'title_ar' => 'لتعريف الأنماط', 'title_fr' => 'Pour définir les styles', 'is_correct' => false],
                            ['title_en' => 'To manage state', 'title_ar' => 'لإدارة الحالة', 'title_fr' => 'Pour gérer l’état', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the difference between `state` and `props`?',
                        'title_ar' => 'ما هو الفرق بين `state` و `props`؟',
                        'title_fr' => 'Quelle est la différence entre `state` et `props` ?',
                        'options' => [
                            ['title_en' => 'State is local and mutable, while props are read-only and passed from parent components.', 'title_ar' => 'الحالة محلية وقابلة للتغيير، بينما تكون props فقط للقراءة وتُمرر من المكونات الأم.', 'title_fr' => 'L’état est local et modifiable, tandis que les props sont en lecture seule et transmises par les composants parents.', 'is_correct' => true],
                            ['title_en' => 'There is no difference; both are used for the same purpose.', 'title_ar' => 'لا يوجد فرق؛ كلاهما يستخدم لنفس الغرض.', 'title_fr' => 'Il n’y a pas de différence ; les deux sont utilisés pour le même objectif.', 'is_correct' => false],
                            ['title_en' => 'Props can be updated by the component itself, while state cannot.', 'title_ar' => 'يمكن تحديث props بواسطة المكون نفسه، بينما لا يمكن تحديث الحالة.', 'title_fr' => 'Les props peuvent être mises à jour par le composant lui-même, alors que l’état ne peut pas.', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of `key` in React lists?',
                        'title_ar' => 'ما هو الغرض من `key` في قوائم React؟',
                        'title_fr' => 'Quel est le but de `key` dans les listes React ?',
                        'options' => [
                            ['title_en' => 'To help React identify which items have changed, are added, or are removed', 'title_ar' => 'لمساعدة React في تحديد العناصر التي تغيرت أو أضيفت أو حُذفت', 'title_fr' => 'Pour aider React à identifier quels éléments ont changé, été ajoutés ou supprimés', 'is_correct' => true],
                            ['title_en' => 'To style list items', 'title_ar' => 'لتزيين عناصر القائمة', 'title_fr' => 'Pour styliser les éléments de liste', 'is_correct' => false],
                            ['title_en' => 'To define the size of the list', 'title_ar' => 'لتحديد حجم القائمة', 'title_fr' => 'Pour définir la taille de la liste', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of `React.Fragment`?',
                        'title_ar' => 'ما هو الغرض من `React.Fragment`؟',
                        'title_fr' => 'Quel est le but de `React.Fragment` ?',
                        'options' => [
                            ['title_en' => 'To group multiple elements without adding extra nodes to the DOM', 'title_ar' => 'للمجموعة من العناصر دون إضافة عقد إضافية إلى DOM', 'title_fr' => 'Pour regrouper plusieurs éléments sans ajouter de nœuds supplémentaires au DOM', 'is_correct' => true],
                            ['title_en' => 'To create a new DOM element', 'title_ar' => 'لإنشاء عنصر DOM جديد', 'title_fr' => 'Pour créer un nouvel élément DOM', 'is_correct' => false],
                            ['title_en' => 'To define styles', 'title_ar' => 'لتعريف الأنماط', 'title_fr' => 'Pour définir les styles', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the correct way to conditionally render an element in React?',
                        'title_ar' => 'ما هو الطريقة الصحيحة لعرض عنصر بشروط في React؟',
                        'title_fr' => 'Quelle est la bonne manière de rendre un élément conditionnellement dans React ?',
                        'options' => [
                            ['title_en' => 'Using an if-else statement inside JSX', 'title_ar' => 'باستخدام بيان if-else داخل JSX', 'title_fr' => 'En utilisant une instruction if-else à l’intérieur de JSX', 'is_correct' => false],
                            ['title_en' => 'Using a ternary operator or logical && operator', 'title_ar' => 'باستخدام المشغل الثلاثي أو المشغل المنطقي &&', 'title_fr' => 'En utilisant un opérateur ternaire ou un opérateur logique &&', 'is_correct' => true],
                            ['title_en' => 'Using a switch-case statement', 'title_ar' => 'باستخدام بيان switch-case', 'title_fr' => 'En utilisant une instruction switch-case', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of `setState` in React?',
                        'title_ar' => 'ما هو الغرض من `setState` في React؟',
                        'title_fr' => 'Quel est le but de `setState` dans React ?',
                        'options' => [
                            ['title_en' => 'To update the component’s state and trigger a re-render', 'title_ar' => 'لتحديث حالة المكون وإعادة الرسم', 'title_fr' => 'Pour mettre à jour l’état du composant et déclencher un re-rendu', 'is_correct' => true],
                            ['title_en' => 'To define props', 'title_ar' => 'لتعريف props', 'title_fr' => 'Pour définir les props', 'is_correct' => false],
                            ['title_en' => 'To manage side effects', 'title_ar' => 'لإدارة التأثيرات الجانبية', 'title_fr' => 'Pour gérer les effets secondaires', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of `ReactDOM.createRoot`?',
                        'title_ar' => 'ما هو الغرض من `ReactDOM.createRoot`؟',
                        'title_fr' => 'Quel est le but de `ReactDOM.createRoot` ?',
                        'options' => [
                            ['title_en' => 'To render a React application into a DOM element', 'title_ar' => 'لعرض تطبيق React في عنصر DOM', 'title_fr' => 'Pour rendre une application React dans un élément DOM', 'is_correct' => true],
                            ['title_en' => 'To define styles', 'title_ar' => 'لتعريف الأنماط', 'title_fr' => 'Pour définir les styles', 'is_correct' => false],
                            ['title_en' => 'To manage state', 'title_ar' => 'لإدارة الحالة', 'title_fr' => 'Pour gérer l’état', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of `shouldComponentUpdate`?',
                        'title_ar' => 'ما هو الغرض من `shouldComponentUpdate`؟',
                        'title_fr' => 'Quel est le but de `shouldComponentUpdate` ?',
                        'options' => [
                            ['title_en' => 'To determine if a component should re-render based on prop or state changes', 'title_ar' => 'لتحديد ما إذا كان يجب إعادة رسم المكون بناءً على تغييرات props أو الحالة', 'title_fr' => 'Pour déterminer si un composant doit être re-rendu en fonction des modifications des props ou de l’état', 'is_correct' => true],
                            ['title_en' => 'To manage side effects', 'title_ar' => 'لإدارة التأثيرات الجانبية', 'title_fr' => 'Pour gérer les effets secondaires', 'is_correct' => false],
                            ['title_en' => 'To define styles', 'title_ar' => 'لتعريف الأنماط', 'title_fr' => 'Pour définir les styles', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of `PureComponent`?',
                        'title_ar' => 'ما هو الغرض من `PureComponent`؟',
                        'title_fr' => 'Quel est le but de `PureComponent` ?',
                        'options' => [
                            ['title_en' => 'To optimize performance by preventing unnecessary re-renders', 'title_ar' => 'لتحسين الأداء عن طريق منع إعادة الرسم غير الضرورية', 'title_fr' => 'Pour optimiser les performances en empêchant les re-rendus inutiles', 'is_correct' => true],
                            ['title_en' => 'To manage state', 'title_ar' => 'لإدارة الحالة', 'title_fr' => 'Pour gérer l’état', 'is_correct' => false],
                            ['title_en' => 'To define styles', 'title_ar' => 'لتعريف الأنماط', 'title_fr' => 'Pour définir les styles', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of `context` in React?',
                        'title_ar' => 'ما هو الغرض من `context` في React؟',
                        'title_fr' => 'Quel est le but du `context` dans React ?',
                        'options' => [
                            ['title_en' => 'To provide a way to pass data through the component tree without having to pass props manually at every level', 'title_ar' => 'لتقديم طريقة لتمرير البيانات عبر شجرة المكونات دون الحاجة إلى تمرير props يدويًا عند كل مستوى', 'title_fr' => 'Pour fournir un moyen de passer des données via l’arborescence des composants sans avoir à passer des props manuellement à chaque niveau', 'is_correct' => true],
                            ['title_en' => 'To manage side effects', 'title_ar' => 'لإدارة التأثيرات الجانبية', 'title_fr' => 'Pour gérer les effets secondaires', 'is_correct' => false],
                            ['title_en' => 'To define styles', 'title_ar' => 'لتعريف الأنماط', 'title_fr' => 'Pour définir les styles', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            //TAILWINDCSS QUIZZES
            [
                'title_en' => 'Tailwind CSS Basics',
                'title_ar' => 'أساسيات Tailwind CSS',
                'title_fr' => 'Bases de Tailwind CSS',
                'description_en' => 'Test your fundamental knowledge of Tailwind CSS.',
                'description_ar' => 'اختبار معرفتك الأساسية في Tailwind CSS.',
                'description_fr' => 'Testez vos connaissances fondamentales en Tailwind CSS.',
                'difficulty' => 1,
                'topic' => $topicIds['Tailwindcss'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'Which library is Tailwind CSS based on?',
                        'title_ar' => 'على أي مكتبة تستند Tailwind CSS؟',
                        'title_fr' => 'Sur quelle bibliothèque est basé Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'PostCSS', 'title_ar' => 'PostCSS', 'title_fr' => 'PostCSS', 'is_correct' => true],
                            ['title_en' => 'Sass', 'title_ar' => 'Sass', 'title_fr' => 'Sass', 'is_correct' => false],
                            ['title_en' => 'Less', 'title_ar' => 'Less', 'title_fr' => 'Less', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to initialize a new Tailwind CSS project?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء مشروع Tailwind CSS جديد؟',
                        'title_fr' => 'Quelle commande est utilisée pour initialiser un nouveau projet Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'npx tailwindcss init', 'title_ar' => 'npx tailwindcss init', 'title_fr' => 'npx tailwindcss init', 'is_correct' => true],
                            ['title_en' => 'npm install tailwindcss', 'title_ar' => 'npm install tailwindcss', 'title_fr' => 'npm install tailwindcss', 'is_correct' => false],
                            ['title_en' => 'tailwind init', 'title_ar' => 'tailwind init', 'title_fr' => 'tailwind init', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which file is used to configure Tailwind CSS?',
                        'title_ar' => 'ما هو الملف المستخدم لتكوين Tailwind CSS؟',
                        'title_fr' => 'Quel fichier est utilisé pour configurer Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'tailwind.config.js', 'title_ar' => 'tailwind.config.js', 'title_fr' => 'tailwind.config.js', 'is_correct' => true],
                            ['title_en' => 'config.json', 'title_ar' => 'config.json', 'title_fr' => 'config.json', 'is_correct' => false],
                            ['title_en' => 'styles.css', 'title_ar' => 'styles.css', 'title_fr' => 'styles.css', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the font size to small in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين حجم الخط الصغير في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la taille de la police petite en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'text-sm', 'title_ar' => 'text-sm', 'title_fr' => 'text-sm', 'is_correct' => true],
                            ['title_en' => 'font-small', 'title_ar' => 'font-small', 'title_fr' => 'font-small', 'is_correct' => false],
                            ['title_en' => 'text-small', 'title_ar' => 'text-small', 'title_fr' => 'text-small', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the background color to blue in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين لون الخلفية الأزرق في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la couleur d’arrière-plan bleue en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'bg-blue-500', 'title_ar' => 'bg-blue-500', 'title_fr' => 'bg-blue-500', 'is_correct' => true],
                            ['title_en' => 'background-blue', 'title_ar' => 'background-blue', 'title_fr' => 'background-blue', 'is_correct' => false],
                            ['title_en' => 'bg-blue', 'title_ar' => 'bg-blue', 'title_fr' => 'bg-blue', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the margin to 2 units in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين الهامش بحجم 2 وحدة في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la marge à 2 unités en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'm-2', 'title_ar' => 'm-2', 'title_fr' => 'm-2', 'is_correct' => true],
                            ['title_en' => 'margin-2', 'title_ar' => 'margin-2', 'title_fr' => 'margin-2', 'is_correct' => false],
                            ['title_en' => 'm-2units', 'title_ar' => 'm-2وحدات', 'title_fr' => 'm-2unités', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the padding to 4 units in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين التحمل بحجم 4 وحدات في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir le rembourrage à 4 unités en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'p-4', 'title_ar' => 'p-4', 'title_fr' => 'p-4', 'is_correct' => true],
                            ['title_en' => 'padding-4', 'title_ar' => 'padding-4', 'title_fr' => 'padding-4', 'is_correct' => false],
                            ['title_en' => 'p-4units', 'title_ar' => 'p-4وحدات', 'title_fr' => 'p-4unités', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the text color to white in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين لون النص الأبيض في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la couleur du texte blanche en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'text-white', 'title_ar' => 'text-white', 'title_fr' => 'text-white', 'is_correct' => true],
                            ['title_en' => 'color-white', 'title_ar' => 'color-white', 'title_fr' => 'color-white', 'is_correct' => false],
                            ['title_en' => 'text-color-white', 'title_ar' => 'text-color-white', 'title_fr' => 'text-color-white', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the border width to 1 unit in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين سمك الحدود بحجم 1 وحدة في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir l’épaisseur de la bordure à 1 unité en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'border', 'title_ar' => 'border', 'title_fr' => 'border', 'is_correct' => true],
                            ['title_en' => 'border-1', 'title_ar' => 'border-1', 'title_fr' => 'border-1', 'is_correct' => false],
                            ['title_en' => 'border-width-1', 'title_ar' => 'border-width-1', 'title_fr' => 'border-width-1', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the border color to red in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين لون الحدود الأحمر في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la couleur de la bordure rouge en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'border-red-500', 'title_ar' => 'border-red-500', 'title_fr' => 'border-red-500', 'is_correct' => true],
                            ['title_en' => 'border-color-red', 'title_ar' => 'border-color-red', 'title_fr' => 'border-color-red', 'is_correct' => false],
                            ['title_en' => 'border-red', 'title_ar' => 'border-red', 'title_fr' => 'border-red', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the width to 100% in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين العرض بنسبة 100% في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la largeur à 100% en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'w-full', 'title_ar' => 'w-full', 'title_fr' => 'w-full', 'is_correct' => true],
                            ['title_en' => 'width-100', 'title_ar' => 'width-100', 'title_fr' => 'width-100', 'is_correct' => false],
                            ['title_en' => 'w-100%', 'title_ar' => 'w-100%', 'title_fr' => 'w-100%', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the height to 50 pixels in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين الارتفاع بحجم 50 بكسل في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la hauteur à 50 pixels en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'h-50', 'title_ar' => 'h-50', 'title_fr' => 'h-50', 'is_correct' => true],
                            ['title_en' => 'height-50', 'title_ar' => 'height-50', 'title_fr' => 'height-50', 'is_correct' => false],
                            ['title_en' => 'h-50px', 'title_ar' => 'h-50px', 'title_fr' => 'h-50px', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to center text horizontally in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتوجيه النص أفقيًا في مركز في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour centrer le texte horizontalement en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'text-center', 'title_ar' => 'text-center', 'title_fr' => 'text-center', 'is_correct' => true],
                            ['title_en' => 'center-text', 'title_ar' => 'center-text', 'title_fr' => 'center-text', 'is_correct' => false],
                            ['title_en' => 'text-align-center', 'title_ar' => 'text-align-center', 'title_fr' => 'text-align-center', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to make an element invisible in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لإخفاء عنصر في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour rendre un élément invisible en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'invisible', 'title_ar' => 'invisible', 'title_fr' => 'invisible', 'is_correct' => true],
                            ['title_en' => 'hidden', 'title_ar' => 'hidden', 'title_fr' => 'hidden', 'is_correct' => false],
                            ['title_en' => 'hide', 'title_ar' => 'hide', 'title_fr' => 'hide', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to apply a flexbox layout in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتطبيق تخطيط فلوكس باكس في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour appliquer un layout flexbox en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'flex', 'title_ar' => 'flex', 'title_fr' => 'flex', 'is_correct' => true],
                            ['title_en' => 'flexbox', 'title_ar' => 'flexbox', 'title_fr' => 'flexbox', 'is_correct' => false],
                            ['title_en' => 'display-flex', 'title_ar' => 'display-flex', 'title_fr' => 'display-flex', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the font weight to bold in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين وزن الخط الغامق في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir le poids de la police gras en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'font-bold', 'title_ar' => 'font-bold', 'title_fr' => 'font-bold', 'is_correct' => true],
                            ['title_en' => 'bold', 'title_ar' => 'bold', 'title_fr' => 'bold', 'is_correct' => false],
                            ['title_en' => 'font-weight-bold', 'title_ar' => 'font-weight-bold', 'title_fr' => 'font-weight-bold', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the display property to flex in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين خاصية العرض إلى فلوكس في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la propriété display à flex en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'flex', 'title_ar' => 'flex', 'title_fr' => 'flex', 'is_correct' => true],
                            ['title_en' => 'display-flex', 'title_ar' => 'display-flex', 'title_fr' => 'display-flex', 'is_correct' => false],
                            ['title_en' => 'flex-display', 'title_ar' => 'flex-display', 'title_fr' => 'flex-display', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the justify content to center in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتوجيه محتوى العنصر إلى المركز أفقيًا في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour aligner le contenu horizontalement au centre en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'justify-center', 'title_ar' => 'justify-center', 'title_fr' => 'justify-center', 'is_correct' => true],
                            ['title_en' => 'center-content', 'title_ar' => 'center-content', 'title_fr' => 'center-content', 'is_correct' => false],
                            ['title_en' => 'justify-align-center', 'title_ar' => 'justify-align-center', 'title_fr' => 'justify-align-center', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the align items to center in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتوجيه العناصر إلى المركز عموديًا في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour aligner les éléments au centre verticalement en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'items-center', 'title_ar' => 'items-center', 'title_fr' => 'items-center', 'is_correct' => true],
                            ['title_en' => 'center-items', 'title_ar' => 'center-items', 'title_fr' => 'center-items', 'is_correct' => false],
                            ['title_en' => 'align-center', 'title_ar' => 'align-center', 'title_fr' => 'align-center', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the font family to sans-serif in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين عائلة الخط إلى sans-serif في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la famille de polices à sans-serif en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'font-sans', 'title_ar' => 'font-sans', 'title_fr' => 'font-sans', 'is_correct' => true],
                            ['title_en' => 'sans-serif', 'title_ar' => 'sans-serif', 'title_fr' => 'sans-serif', 'is_correct' => false],
                            ['title_en' => 'font-family-sans-serif', 'title_ar' => 'font-family-sans-serif', 'title_fr' => 'font-family-sans-serif', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the text alignment to right in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتوجيه النص إلى اليمين في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour aligner le texte à droite en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'text-right', 'title_ar' => 'text-right', 'title_fr' => 'text-right', 'is_correct' => true],
                            ['title_en' => 'right-align', 'title_ar' => 'right-align', 'title_fr' => 'right-align', 'is_correct' => false],
                            ['title_en' => 'align-right', 'title_ar' => 'align-right', 'title_fr' => 'align-right', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the padding to 8 units in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين التحمل بحجم 8 وحدات في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir le rembourrage à 8 unités en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'p-8', 'title_ar' => 'p-8', 'title_fr' => 'p-8', 'is_correct' => true],
                            ['title_en' => 'padding-8', 'title_ar' => 'padding-8', 'title_fr' => 'padding-8', 'is_correct' => false],
                            ['title_en' => 'p-8units', 'title_ar' => 'p-8وحدات', 'title_fr' => 'p-8unités', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the border radius to rounded in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين نصف قطر الحدود إلى مستدير في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir le rayon de la bordure arrondi en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'rounded', 'title_ar' => 'rounded', 'title_fr' => 'rounded', 'is_correct' => true],
                            ['title_en' => 'border-rounded', 'title_ar' => 'border-rounded', 'title_fr' => 'border-rounded', 'is_correct' => false],
                            ['title_en' => 'rounded-border', 'title_ar' => 'rounded-border', 'title_fr' => 'rounded-border', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the font style to italic in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين أسلوب الخط إلى مائل في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir le style de la police italique en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'italic', 'title_ar' => 'italic', 'title_fr' => 'italic', 'is_correct' => true],
                            ['title_en' => 'font-italic', 'title_ar' => 'font-italic', 'title_fr' => 'font-italic', 'is_correct' => false],
                            ['title_en' => 'style-italic', 'title_ar' => 'style-italic', 'title_fr' => 'style-italic', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the opacity to 50% in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين الشفافية بنسبة 50% في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir l’opacité à 50% en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'opacity-50', 'title_ar' => 'opacity-50', 'title_fr' => 'opacity-50', 'is_correct' => true],
                            ['title_en' => 'transparent-50', 'title_ar' => 'transparent-50', 'title_fr' => 'transparent-50', 'is_correct' => false],
                            ['title_en' => 'opacity-50%', 'title_ar' => 'opacity-50%', 'title_fr' => 'opacity-50%', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title_en' => 'Intermediate Tailwind CSS',
                'title_ar' => 'Tailwind CSS متوسط',
                'title_fr' => 'Tailwind CSS Intermédiaire',
                'description_en' => 'Test your intermediate knowledge of Tailwind CSS.',
                'description_ar' => 'اختبار معرفتك الوسطى في Tailwind CSS.',
                'description_fr' => 'Testez vos connaissances intermédiaires en Tailwind CSS.',
                'difficulty' => 2,
                'topic' => $topicIds['Tailwindcss'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'Which utility class is used to set the spacing between flex items to 4 units in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين المسافة بين عناصر الفلكس بحجم 4 وحدات في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir l’espacement entre les éléments flex à 4 unités en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'space-x-4', 'title_ar' => 'space-x-4', 'title_fr' => 'space-x-4', 'is_correct' => true],
                            ['title_en' => 'spacing-4', 'title_ar' => 'spacing-4', 'title_fr' => 'spacing-4', 'is_correct' => false],
                            ['title_en' => 'gap-4', 'title_ar' => 'gap-4', 'title_fr' => 'gap-4', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the margin to 6 units on the top in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين الهامش بحجم 6 وحدات في الجزء العلوي في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la marge à 6 unités en haut en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'mt-6', 'title_ar' => 'mt-6', 'title_fr' => 'mt-6', 'is_correct' => true],
                            ['title_en' => 'margin-top-6', 'title_ar' => 'margin-top-6', 'title_fr' => 'margin-top-6', 'is_correct' => false],
                            ['title_en' => 'top-margin-6', 'title_ar' => 'top-margin-6', 'title_fr' => 'top-margin-6', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the padding to 10 units on the bottom in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين التحمل بحجم 10 وحدات في الجزء السفلي في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir le rembourrage à 10 unités en bas en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'pb-10', 'title_ar' => 'pb-10', 'title_fr' => 'pb-10', 'is_correct' => true],
                            ['title_en' => 'padding-bottom-10', 'title_ar' => 'padding-bottom-10', 'title_fr' => 'padding-bottom-10', 'is_correct' => false],
                            ['title_en' => 'bottom-padding-10', 'title_ar' => 'bottom-padding-10', 'title_fr' => 'bottom-padding-10', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the font weight to light in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين وزن الخط الخفيف في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir le poids de la police léger en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'font-light', 'title_ar' => 'font-light', 'title_fr' => 'font-light', 'is_correct' => true],
                            ['title_en' => 'light-font', 'title_ar' => 'light-font', 'title_fr' => 'light-font', 'is_correct' => false],
                            ['title_en' => 'font-weight-light', 'title_ar' => 'font-weight-light', 'title_fr' => 'font-weight-light', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the border width to 2 units in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين سمك الحدود بحجم 2 وحدات في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir l’épaisseur de la bordure à 2 unités en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'border-2', 'title_ar' => 'border-2', 'title_fr' => 'border-2', 'is_correct' => true],
                            ['title_en' => 'border-width-2', 'title_ar' => 'border-width-2', 'title_fr' => 'border-width-2', 'is_correct' => false],
                            ['title_en' => 'border-2units', 'title_ar' => 'border-2وحدات', 'title_fr' => 'border-2unités', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the background color to gray in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين لون الخلفية الرمادي في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la couleur d’arrière-plan grise en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'bg-gray-500', 'title_ar' => 'bg-gray-500', 'title_fr' => 'bg-gray-500', 'is_correct' => true],
                            ['title_en' => 'background-gray', 'title_ar' => 'background-gray', 'title_fr' => 'background-gray', 'is_correct' => false],
                            ['title_en' => 'bg-gray', 'title_ar' => 'bg-gray', 'title_fr' => 'bg-gray', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the text color to green in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين لون النص الأخضر في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la couleur du texte verte en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'text-green-500', 'title_ar' => 'text-green-500', 'title_fr' => 'text-green-500', 'is_correct' => true],
                            ['title_en' => 'color-green', 'title_ar' => 'color-green', 'title_fr' => 'color-green', 'is_correct' => false],
                            ['title_en' => 'text-color-green', 'title_ar' => 'text-color-green', 'title_fr' => 'text-color-green', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the font size to large in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين حجم الخط الكبير في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la taille de la police grande en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'text-lg', 'title_ar' => 'text-lg', 'title_fr' => 'text-lg', 'is_correct' => true],
                            ['title_en' => 'large-font', 'title_ar' => 'large-font', 'title_fr' => 'large-font', 'is_correct' => false],
                            ['title_en' => 'font-size-large', 'title_ar' => 'font-size-large', 'title_fr' => 'font-size-large', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the border radius to rounded-full in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين نصف قطر الحدود إلى مستدير تمامًا في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir le rayon de la bordure arrondi complètement en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'rounded-full', 'title_ar' => 'rounded-full', 'title_fr' => 'rounded-full', 'is_correct' => true],
                            ['title_en' => 'full-rounded', 'title_ar' => 'full-rounded', 'title_fr' => 'full-rounded', 'is_correct' => false],
                            ['title_en' => 'border-radius-full', 'title_ar' => 'border-radius-full', 'title_fr' => 'border-radius-full', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the font style to normal in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين أسلوب الخط العادي في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir le style de la police normal en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'font-normal', 'title_ar' => 'font-normal', 'title_fr' => 'font-normal', 'is_correct' => true],
                            ['title_en' => 'normal-font', 'title_ar' => 'normal-font', 'title_fr' => 'normal-font', 'is_correct' => false],
                            ['title_en' => 'font-style-normal', 'title_ar' => 'font-style-normal', 'title_fr' => 'font-style-normal', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the opacity to 75% in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين الشفافية بنسبة 75% في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir l’opacité à 75% en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'opacity-75', 'title_ar' => 'opacity-75', 'title_fr' => 'opacity-75', 'is_correct' => true],
                            ['title_en' => 'transparent-75', 'title_ar' => 'transparent-75', 'title_fr' => 'transparent-75', 'is_correct' => false],
                            ['title_en' => 'opacity-75%', 'title_ar' => 'opacity-75%', 'title_fr' => 'opacity-75%', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which utility class is used to set the margin to 12 units on the left in Tailwind CSS?',
                        'title_ar' => 'ما هي فئة الاستعمال المستخدمة لتعيين الهامش بحجم 12 وحدات في الجزء الأيسر في Tailwind CSS؟',
                        'title_fr' => 'Quelle classe utilitaire est utilisée pour définir la marge à 12 unités à gauche en Tailwind CSS ?',
                        'options' => [
                            ['title_en' => 'ml-12', 'title_ar' => 'ml-12', 'title_fr' => 'ml-12', 'is_correct' => true],
                            ['title_en' => 'margin-left-12', 'title_ar' => 'margin-left-12', 'title_fr' => 'margin-left-12', 'is_correct' => false],
                            ['title_en' => 'left-margin-12', 'title_ar' => 'left-margin-12', 'title_fr' => 'left-margin-12', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            //NODE.JS QUIZZES
            [
                'title_en' => 'Node.js Basics',
                'title_ar' => 'أساسيات Node.js',
                'title_fr' => 'Bases de Node.js',
                'description_en' => 'Test your fundamental knowledge of Node.js.',
                'description_ar' => 'اختبار معرفتك الأساسية في Node.js.',
                'description_fr' => 'Testez vos connaissances fondamentales en Node.js.',
                'difficulty' => 1,
                'topic' => $topicIds['Node-js'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'What is Node.js?',
                        'title_ar' => 'ما هو Node.js؟',
                        'title_fr' => 'Qu’est-ce que Node.js ?',
                        'options' => [
                            ['title_en' => 'A runtime environment for executing JavaScript on the server side', 'title_ar' => 'بيئة تشغيلية لتنفيذ JavaScript على الجانب الخلفي', 'title_fr' => 'Un environnement d’exécution pour exécuter JavaScript côté serveur', 'is_correct' => true],
                            ['title_en' => 'A front-end JavaScript framework', 'title_ar' => 'إطار عمل JavaScript أمامي', 'title_fr' => 'Un cadre de travail JavaScript côté client', 'is_correct' => false],
                            ['title_en' => 'A database management system', 'title_ar' => 'نظام إدارة قواعد البيانات', 'title_fr' => 'Un système de gestion de base de données', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to initialize a new Node.js project?',
                        'title_ar' => 'ما هو الأمر المستخدم لإنشاء مشروع Node.js جديد؟',
                        'title_fr' => 'Quelle commande est utilisée pour initialiser un nouveau projet Node.js ?',
                        'options' => [
                            ['title_en' => 'npm init', 'title_ar' => 'npm init', 'title_fr' => 'npm init', 'is_correct' => true],
                            ['title_en' => 'node init', 'title_ar' => 'node init', 'title_fr' => 'node init', 'is_correct' => false],
                            ['title_en' => 'node new', 'title_ar' => 'node new', 'title_fr' => 'node new', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which package manager is typically used with Node.js?',
                        'title_ar' => 'ما هو مدير الحزم المستخدم عادة مع Node.js؟',
                        'title_fr' => 'Quel gestionnaire de paquets est généralement utilisé avec Node.js ?',
                        'options' => [
                            ['title_en' => 'npm', 'title_ar' => 'npm', 'title_fr' => 'npm', 'is_correct' => true],
                            ['title_en' => 'yarn', 'title_ar' => 'yarn', 'title_fr' => 'yarn', 'is_correct' => false],
                            ['title_en' => 'bower', 'title_ar' => 'bower', 'title_fr' => 'bower', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which file is used to define the entry point of a Node.js application?',
                        'title_ar' => 'ما هو الملف المستخدم لتحديد نقطة الدخول لتطبيق Node.js؟',
                        'title_fr' => 'Quel fichier est utilisé pour définir le point d’entrée d’une application Node.js ?',
                        'options' => [
                            ['title_en' => 'index.js', 'title_ar' => 'index.js', 'title_fr' => 'index.js', 'is_correct' => true],
                            ['title_en' => 'main.js', 'title_ar' => 'main.js', 'title_fr' => 'main.js', 'is_correct' => false],
                            ['title_en' => 'app.js', 'title_ar' => 'app.js', 'title_fr' => 'app.js', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which module is used to handle file system operations in Node.js?',
                        'title_ar' => 'ما هو الوحدة المستخدمة التعامل مع عمليات نظام الملفات في Node.js؟',
                        'title_fr' => 'Quel module est utilisé pour gérer les opérations de système de fichiers en Node.js ?',
                        'options' => [
                            ['title_en' => 'fs', 'title_ar' => 'fs', 'title_fr' => 'fs', 'is_correct' => true],
                            ['title_en' => 'http', 'title_ar' => 'http', 'title_fr' => 'http', 'is_correct' => false],
                            ['title_en' => 'path', 'title_ar' => 'path', 'title_fr' => 'path', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which module is used to create an HTTP server in Node.js?',
                        'title_ar' => 'ما هو الوحدة المستخدمة لإنشاء خادم HTTP في Node.js؟',
                        'title_fr' => 'Quel module est utilisé pour créer un serveur HTTP en Node.js ?',
                        'options' => [
                            ['title_en' => 'http', 'title_ar' => 'http', 'title_fr' => 'http', 'is_correct' => true],
                            ['title_en' => 'https', 'title_ar' => 'https', 'title_fr' => 'https', 'is_correct' => false],
                            ['title_en' => 'express', 'title_ar' => 'express', 'title_fr' => 'express', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which command is used to run a Node.js application?',
                        'title_ar' => 'ما هو الأمر المستخدم لتشغيل تطبيق Node.js؟',
                        'title_fr' => 'Quelle commande est utilisée pour exécuter une application Node.js ?',
                        'options' => [
                            ['title_en' => 'node app.js', 'title_ar' => 'node app.js', 'title_fr' => 'node app.js', 'is_correct' => true],
                            ['title_en' => 'run app.js', 'title_ar' => 'run app.js', 'title_fr' => 'run app.js', 'is_correct' => false],
                            ['title_en' => 'start app.js', 'title_ar' => 'start app.js', 'title_fr' => 'start app.js', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'What is the purpose of the `package.json` file in a Node.js project?',
                        'title_ar' => 'ما هو الغرض من ملف `package.json` في مشروع Node.js؟',
                        'title_fr' => 'Quel est le but du fichier `package.json` dans un projet Node.js ?',
                        'options' => [
                            ['title_en' => 'To store metadata and dependencies of the project', 'title_ar' => 'لتخزين البيانات الوصفية والاعتماديات للمشروع', 'title_fr' => 'Pour stocker les métadonnées et les dépendances du projet', 'is_correct' => true],
                            ['title_en' => 'To store database configurations', 'title_ar' => 'لتخزين تكوينات قاعدة البيانات', 'title_fr' => 'Pour stocker les configurations de base de données', 'is_correct' => false],
                            ['title_en' => 'To store user data', 'title_ar' => 'لتخزين بيانات المستخدم', 'title_fr' => 'Pour stocker les données utilisateur', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to send a response in an HTTP server using Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإرسال استجابة في خادم HTTP باستخدام Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour envoyer une réponse dans un serveur HTTP en utilisant Node.js ?',
                        'options' => [
                            ['title_en' => 'response.send()', 'title_ar' => 'response.send()', 'title_fr' => 'response.send()', 'is_correct' => true],
                            ['title_en' => 'response.write()', 'title_ar' => 'response.write()', 'title_fr' => 'response.write()', 'is_correct' => false],
                            ['title_en' => 'response.end()', 'title_ar' => 'response.end()', 'title_fr' => 'response.end()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to read a file asynchronously in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لقراءة ملف بشكل غير متزامن في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour lire un fichier de manière asynchrone en Node.js ?',
                        'options' => [
                            ['title_en' => 'fs.readFile()', 'title_ar' => 'fs.readFile()', 'title_fr' => 'fs.readFile()', 'is_correct' => true],
                            ['title_en' => 'fs.readFileSync()', 'title_ar' => 'fs.readFileSync()', 'title_fr' => 'fs.readFileSync()', 'is_correct' => false],
                            ['title_en' => 'fs.read()', 'title_ar' => 'fs.read()', 'title_fr' => 'fs.read()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to create a new directory asynchronously in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإنشاء دليل جديد بشكل غير متزامن في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour créer un nouveau répertoire de manière asynchrone en Node.js ?',
                        'options' => [
                            ['title_en' => 'fs.mkdir()', 'title_ar' => 'fs.mkdir()', 'title_fr' => 'fs.mkdir()', 'is_correct' => true],
                            ['title_en' => 'fs.mkdirSync()', 'title_ar' => 'fs.mkdirSync()', 'title_fr' => 'fs.mkdirSync()', 'is_correct' => false],
                            ['title_en' => 'fs.createDir()', 'title_ar' => 'fs.createDir()', 'title_fr' => 'fs.createDir()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to listen for incoming HTTP requests in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة الاستماع للطلبات الواردة في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour écouter les requêtes HTTP entrantes en Node.js ?',
                        'options' => [
                            ['title_en' => 'server.listen()', 'title_ar' => 'server.listen()', 'title_fr' => 'server.listen()', 'is_correct' => true],
                            ['title_en' => 'server.on()', 'title_ar' => 'server.on()', 'title_fr' => 'server.on()', 'is_correct' => false],
                            ['title_en' => 'server.start()', 'title_ar' => 'server.start()', 'title_fr' => 'server.start()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to parse JSON data in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لتحليل بيانات JSON في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour analyser les données JSON en Node.js ?',
                        'options' => [
                            ['title_en' => 'JSON.parse()', 'title_ar' => 'JSON.parse()', 'title_fr' => 'JSON.parse()', 'is_correct' => true],
                            ['title_en' => 'JSON.stringify()', 'title_ar' => 'JSON.stringify()', 'title_fr' => 'JSON.stringify()', 'is_correct' => false],
                            ['title_en' => 'parseJSON()', 'title_ar' => 'parseJSON()', 'title_fr' => 'parseJSON()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which module is used to handle URL parsing in Node.js?',
                        'title_ar' => 'ما هو الوحدة المستخدمة لتحليل العناوين URL في Node.js؟',
                        'title_fr' => 'Quel module est utilisé pour analyser les URL en Node.js ?',
                        'options' => [
                            ['title_en' => 'url', 'title_ar' => 'url', 'title_fr' => 'url', 'is_correct' => true],
                            ['title_en' => 'querystring', 'title_ar' => 'querystring', 'title_fr' => 'querystring', 'is_correct' => false],
                            ['title_en' => 'http', 'title_ar' => 'http', 'title_fr' => 'http', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to send a JSON response in an HTTP server using Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإرسال استجابة JSON في خادم HTTP باستخدام Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour envoyer une réponse JSON dans un serveur HTTP en utilisant Node.js ?',
                        'options' => [
                            ['title_en' => 'response.json()', 'title_ar' => 'response.json()', 'title_fr' => 'response.json()', 'is_correct' => true],
                            ['title_en' => 'response.sendJSON()', 'title_ar' => 'response.sendJSON()', 'title_fr' => 'response.sendJSON()', 'is_correct' => false],
                            ['title_en' => 'response.end()', 'title_ar' => 'response.end()', 'title_fr' => 'response.end()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to read a file synchronously in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لقراءة ملف بشكل متزامن في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour lire un fichier de manière synchrone en Node.js ?',
                        'options' => [
                            ['title_en' => 'fs.readFileSync()', 'title_ar' => 'fs.readFileSync()', 'title_fr' => 'fs.readFileSync()', 'is_correct' => true],
                            ['title_en' => 'fs.readFile()', 'title_ar' => 'fs.readFile()', 'title_fr' => 'fs.readFile()', 'is_correct' => false],
                            ['title_en' => 'fs.read()', 'title_ar' => 'fs.read()', 'title_fr' => 'fs.read()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to create a new file asynchronously in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإنشاء ملف جديد بشكل غير متزامن في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour créer un nouveau fichier de manière asynchrone en Node.js ?',
                        'options' => [
                            ['title_en' => 'fs.writeFile()', 'title_ar' => 'fs.writeFile()', 'title_fr' => 'fs.writeFile()', 'is_correct' => true],
                            ['title_en' => 'fs.writeFileSync()', 'title_ar' => 'fs.writeFileSync()', 'title_fr' => 'fs.writeFileSync()', 'is_correct' => false],
                            ['title_en' => 'fs.createFile()', 'title_ar' => 'fs.createFile()', 'title_fr' => 'fs.createFile()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which module is used to handle routing in a basic Node.js server?',
                        'title_ar' => 'ما هو الوحدة المستخدمة لمعالجة التوجيه في خادم Node.js الأساسي؟',
                        'title_fr' => 'Quel module est utilisé pour gérer le routage dans un serveur Node.js de base ?',
                        'options' => [
                            ['title_en' => 'http', 'title_ar' => 'http', 'title_fr' => 'http', 'is_correct' => true],
                            ['title_en' => 'express', 'title_ar' => 'express', 'title_fr' => 'express', 'is_correct' => false],
                            ['title_en' => 'router', 'title_ar' => 'router', 'title_fr' => 'router', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to handle POST requests in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لمعالجة طلبات POST في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour gérer les requêtes POST en Node.js ?',
                        'options' => [
                            ['title_en' => 'request.post()', 'title_ar' => 'request.post()', 'title_fr' => 'request.post()', 'is_correct' => false],
                            ['title_en' => 'request.body', 'title_ar' => 'request.body', 'title_fr' => 'request.body', 'is_correct' => true],
                            ['title_en' => 'response.post()', 'title_ar' => 'response.post()', 'title_fr' => 'response.post()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to install a package globally in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لتثبيت حزمة عالميًا في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour installer un package globalement en Node.js ?',
                        'options' => [
                            ['title_en' => 'npm install -g <package-name>', 'title_ar' => 'npm install -g <اسم الحزمة>', 'title_fr' => 'npm install -g <nom-du-package>', 'is_correct' => true],
                            ['title_en' => 'npm install <package-name>', 'title_ar' => 'npm install <اسم الحزمة>', 'title_fr' => 'npm install <nom-du-package>', 'is_correct' => false],
                            ['title_en' => 'npm global install <package-name>', 'title_ar' => 'npm global install <اسم الحزمة>', 'title_fr' => 'npm global install <nom-du-package>', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to set the response header in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لتعيين رأس الاستجابة في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour définir l’en-tête de la réponse en Node.js ?',
                        'options' => [
                            ['title_en' => 'response.setHeader()', 'title_ar' => 'response.setHeader()', 'title_fr' => 'response.setHeader()', 'is_correct' => true],
                            ['title_en' => 'response.header()', 'title_ar' => 'response.header()', 'title_fr' => 'response.header()', 'is_correct' => false],
                            ['title_en' => 'response.set()', 'title_ar' => 'response.set()', 'title_fr' => 'response.set()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to read the request body in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لقراءة جسم الطلب في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour lire le corps de la requête en Node.js ?',
                        'options' => [
                            ['title_en' => 'request.body', 'title_ar' => 'request.body', 'title_fr' => 'request.body', 'is_correct' => true],
                            ['title_en' => 'request.read()', 'title_ar' => 'request.read()', 'title_fr' => 'request.read()', 'is_correct' => false],
                            ['title_en' => 'request.get()', 'title_ar' => 'request.get()', 'title_fr' => 'request.get()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to create a new directory synchronously in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإنشاء دليل جديد بشكل متزامن في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour créer un nouveau répertoire de manière synchrone en Node.js ?',
                        'options' => [
                            ['title_en' => 'fs.mkdirSync()', 'title_ar' => 'fs.mkdirSync()', 'title_fr' => 'fs.mkdirSync()', 'is_correct' => true],
                            ['title_en' => 'fs.mkdir()', 'title_ar' => 'fs.mkdir()', 'title_fr' => 'fs.mkdir()', 'is_correct' => false],
                            ['title_en' => 'fs.createDirSync()', 'title_ar' => 'fs.createDirSync()', 'title_fr' => 'fs.createDirSync()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to read a directory asynchronously in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لقراءة دليل بشكل غير متزامن في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour lire un répertoire de manière asynchrone en Node.js ?',
                        'options' => [
                            ['title_en' => 'fs.readdir()', 'title_ar' => 'fs.readdir()', 'title_fr' => 'fs.readdir()', 'is_correct' => true],
                            ['title_en' => 'fs.readdirSync()', 'title_ar' => 'fs.readdirSync()', 'title_fr' => 'fs.readdirSync()', 'is_correct' => false],
                            ['title_en' => 'fs.readDir()', 'title_ar' => 'fs.readDir()', 'title_fr' => 'fs.readDir()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to delete a file asynchronously in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإزالة ملف بشكل غير متزامن في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour supprimer un fichier de manière asynchrone en Node.js ?',
                        'options' => [
                            ['title_en' => 'fs.unlink()', 'title_ar' => 'fs.unlink()', 'title_fr' => 'fs.unlink()', 'is_correct' => true],
                            ['title_en' => 'fs.unlinkSync()', 'title_ar' => 'fs.unlinkSync()', 'title_fr' => 'fs.unlinkSync()', 'is_correct' => false],
                            ['title_en' => 'fs.deleteFile()', 'title_ar' => 'fs.deleteFile()', 'title_fr' => 'fs.deleteFile()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to read a directory synchronously in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لقراءة دليل بشكل متزامن في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour lire un répertoire de manière synchrone en Node.js ?',
                        'options' => [
                            ['title_en' => 'fs.readdirSync()', 'title_ar' => 'fs.readdirSync()', 'title_fr' => 'fs.readdirSync()', 'is_correct' => true],
                            ['title_en' => 'fs.readdir()', 'title_ar' => 'fs.readdir()', 'title_fr' => 'fs.readdir()', 'is_correct' => false],
                            ['title_en' => 'fs.readDirSync()', 'title_ar' => 'fs.readDirSync()', 'title_fr' => 'fs.readDirSync()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to create a new file synchronously in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإنشاء ملف جديد بشكل متزامن في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour créer un nouveau fichier de manière synchrone en Node.js ?',
                        'options' => [
                            ['title_en' => 'fs.writeFileSync()', 'title_ar' => 'fs.writeFileSync()', 'title_fr' => 'fs.writeFileSync()', 'is_correct' => true],
                            ['title_en' => 'fs.writeFile()', 'title_ar' => 'fs.writeFile()', 'title_fr' => 'fs.writeFile()', 'is_correct' => false],
                            ['title_en' => 'fs.createFileSync()', 'title_ar' => 'fs.createFileSync()', 'title_fr' => 'fs.createFileSync()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to handle GET requests in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لمعالجة طلبات GET في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour gérer les requêtes GET en Node.js ?',
                        'options' => [
                            ['title_en' => 'request.get()', 'title_ar' => 'request.get()', 'title_fr' => 'request.get()', 'is_correct' => false],
                            ['title_en' => 'request.query', 'title_ar' => 'request.query', 'title_fr' => 'request.query', 'is_correct' => true],
                            ['title_en' => 'response.get()', 'title_ar' => 'response.get()', 'title_fr' => 'response.get()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to delete a directory asynchronously in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإزالة دليل بشكل غير متزامن في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour supprimer un répertoire de manière asynchrone en Node.js ?',
                        'options' => [
                            ['title_en' => 'fs.rmdir()', 'title_ar' => 'fs.rmdir()', 'title_fr' => 'fs.rmdir()', 'is_correct' => true],
                            ['title_en' => 'fs.rmdirSync()', 'title_ar' => 'fs.rmdirSync()', 'title_fr' => 'fs.rmdirSync()', 'is_correct' => false],
                            ['title_en' => 'fs.deleteDir()', 'title_ar' => 'fs.deleteDir()', 'title_fr' => 'fs.deleteDir()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to handle errors in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لمعالجة الأخطاء في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour gérer les erreurs en Node.js ?',
                        'options' => [
                            ['title_en' => 'try...catch', 'title_ar' => 'try...catch', 'title_fr' => 'try...catch', 'is_correct' => true],
                            ['title_en' => 'on("error", callback)', 'title_ar' => 'on("خطأ", رد_المكالمة)', 'title_fr' => 'on("erreur", callback)', 'is_correct' => true],
                            ['title_en' => 'throw', 'title_ar' => 'throw', 'title_fr' => 'throw', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to read the request URL in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لقراءة عنوان URL للطلب في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour lire l’URL de la requête en Node.js ?',
                        'options' => [
                            ['title_en' => 'request.url', 'title_ar' => 'request.url', 'title_fr' => 'request.url', 'is_correct' => true],
                            ['title_en' => 'request.getUrl()', 'title_ar' => 'request.getUrl()', 'title_fr' => 'request.getUrl()', 'is_correct' => false],
                            ['title_en' => 'request.path', 'title_ar' => 'request.path', 'title_fr' => 'request.path', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
            [
                'title_en' => 'Intermediate Node.js',
                'title_ar' => 'Node.js متوسط',
                'title_fr' => 'Node.js Intermédiaire',
                'description_en' => 'Test your intermediate knowledge of Node.js.',
                'description_ar' => 'اختبار معرفتك الوسطى في Node.js.',
                'description_fr' => 'Testez vos connaissances intermédiaires en Node.js.',
                'difficulty' => 2,
                'topic' => $topicIds['Node-js'],
                'is_published' => true,
                'questions' => [
                    [
                        'title_en' => 'Which module is used to handle events in Node.js?',
                        'title_ar' => 'ما هو الوحدة المستخدمة لمعالجة الأحداث في Node.js؟',
                        'title_fr' => 'Quel module est utilisé pour gérer les événements en Node.js ?',
                        'options' => [
                            ['title_en' => 'events', 'title_ar' => 'events', 'title_fr' => 'events', 'is_correct' => true],
                            ['title_en' => 'eventEmitter', 'title_ar' => 'eventEmitter', 'title_fr' => 'eventEmitter', 'is_correct' => false],
                            ['title_en' => 'event', 'title_ar' => 'event', 'title_fr' => 'event', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to emit an event in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لإطلاق حدث في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour émettre un événement en Node.js ?',
                        'options' => [
                            ['title_en' => 'emit()', 'title_ar' => 'emit()', 'title_fr' => 'emit()', 'is_correct' => true],
                            ['title_en' => 'trigger()', 'title_ar' => 'trigger()', 'title_fr' => 'trigger()', 'is_correct' => false],
                            ['title_en' => 'fire()', 'title_ar' => 'fire()', 'title_fr' => 'fire()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to listen for an event in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة الاستماع لحدث في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour écouter un événement en Node.js ?',
                        'options' => [
                            ['title_en' => 'on()', 'title_ar' => 'on()', 'title_fr' => 'on()', 'is_correct' => true],
                            ['title_en' => 'listen()', 'title_ar' => 'listen()', 'title_fr' => 'listen()', 'is_correct' => false],
                            ['title_en' => 'addEventListener()', 'title_ar' => 'addEventListener()', 'title_fr' => 'addEventListener()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which module is used to handle HTTP requests and responses in Node.js?',
                        'title_ar' => 'ما هو الوحدة المستخدمة لمعالجة طلبات HTTP والاستجابات في Node.js؟',
                        'title_fr' => 'Quel module est utilisé pour gérer les requêtes et les réponses HTTP en Node.js ?',
                        'options' => [
                            ['title_en' => 'http', 'title_ar' => 'http', 'title_fr' => 'http', 'is_correct' => true],
                            ['title_en' => 'express', 'title_ar' => 'express', 'title_fr' => 'express', 'is_correct' => false],
                            ['title_en' => 'https', 'title_ar' => 'https', 'title_fr' => 'https', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to parse query parameters in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لتحليل 매علمات الاستعلام في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour analyser les paramètres de requête en Node.js ?',
                        'options' => [
                            ['title_en' => 'request.query', 'title_ar' => 'request.query', 'title_fr' => 'request.query', 'is_correct' => true],
                            ['title_en' => 'request.params', 'title_ar' => 'request.params', 'title_fr' => 'request.params', 'is_correct' => false],
                            ['title_en' => 'request.body', 'title_ar' => 'request.body', 'title_fr' => 'request.body', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to parse request body in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لتحليل جسم الطلب في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour analyser le corps de la requête en Node.js ?',
                        'options' => [
                            ['title_en' => 'request.body', 'title_ar' => 'request.body', 'title_fr' => 'request.body', 'is_correct' => false],
                            ['title_en' => 'body-parser', 'title_ar' => 'body-parser', 'title_fr' => 'body-parser', 'is_correct' => true],
                            ['title_en' => 'request.parse()', 'title_ar' => 'request.parse()', 'title_fr' => 'request.parse()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to handle middleware in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لمعالجة الوسطاء في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour gérer les middlewares en Node.js ?',
                        'options' => [
                            ['title_en' => 'use()', 'title_ar' => 'use()', 'title_fr' => 'use()', 'is_correct' => true],
                            ['title_en' => 'middleware()', 'title_ar' => 'middleware()', 'title_fr' => 'middleware()', 'is_correct' => false],
                            ['title_en' => 'handle()', 'title_ar' => 'handle()', 'title_fr' => 'handle()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to read the request headers in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لقراءة رؤوس الطلب في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour lire les en-têtes de la requête en Node.js ?',
                        'options' => [
                            ['title_en' => 'request.headers', 'title_ar' => 'request.headers', 'title_fr' => 'request.headers', 'is_correct' => true],
                            ['title_en' => 'request.getHeader()', 'title_ar' => 'request.getHeader()', 'title_fr' => 'request.getHeader()', 'is_correct' => false],
                            ['title_en' => 'request.head()', 'title_ar' => 'request.head()', 'title_fr' => 'request.head()', 'is_correct' => false],
                        ],
                    ],
                    [
                        'title_en' => 'Which method is used to set the response status code in Node.js?',
                        'title_ar' => 'ما هو الطريقة المستخدمة لتعيين رمز الحالة للإجابة في Node.js؟',
                        'title_fr' => 'Quelle méthode est utilisée pour définir le code d’état de la réponse en Node.js ?',
                        'options' => [
                            ['title_en' => 'response.statusCode', 'title_ar' => 'response.statusCode', 'title_fr' => 'response.statusCode', 'is_correct' => true],
                            ['title_en' => 'response.status()', 'title_ar' => 'response.status()', 'title_fr' => 'response.status()', 'is_correct' => true],
                            ['title_en' => 'response.setCode()', 'title_ar' => 'response.setCode()', 'title_fr' => 'response.setCode()', 'is_correct' => false],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($quizzes as $quizData) {
            if (!isset($quizData['topic'])) continue;

            $quiz = Quiz::create([
                'title_en' => $quizData['title_en'],
                'title_ar' => $quizData['title_ar'],
                'title_fr' => $quizData['title_fr'],
                'description_en' => $quizData['description_en'],
                'description_ar' => $quizData['description_ar'],
                'description_fr' => $quizData['description_fr'],
                'difficulty' => $quizData['difficulty'],
                'is_published' => $quizData['is_published'],
                'topic_id' => $quizData['topic'],
            ]);

            foreach ($quizData['questions'] as $questionData) {
                $question = Question::create([
                    'title_en' => $questionData['title_en'],
                    'title_ar' => $questionData['title_ar'],
                    'title_fr' => $questionData['title_fr'],
                    'quiz_id' => $quiz->id,
                ]);

                foreach ($questionData['options'] as $optionData) {
                    Option::create([
                        'title_en' => $optionData['title_en'],
                        'title_ar' => $optionData['title_ar'],
                        'title_fr' => $optionData['title_fr'],
                        'question_id' => $question->id,
                        'is_correct' => $optionData['is_correct'],
                    ]);
                }
            }
        }
    }
}