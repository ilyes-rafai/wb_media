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
            'Javascript',
            'Laravel',
            'Python',
            'Bootstrap',
            'C Language',
            'OOP',
            'Node.js',
            'Express.js',
            'Git',
            'Docker',
            'Flask',
            'GraphQL',
            'Next.js',
            'Prisma',
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