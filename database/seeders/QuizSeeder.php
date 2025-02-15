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
        $topics = [
            'HTML5',
            'CSS3',
            'Javascript',
            'Laravel',
            'Python',
            'Bootstrap',
            'C Language',
            'OOP'
        ];

        $topicIds = [];

        foreach ($topics as $topicName) {
            $topic = Topic::where('name', $topicName)->first();
            if ($topic) {
                $topicIds[$topicName] = $topic->id;
            }
        }



        $quizzes = [

            // C Language Quizzes
            [
                'title' => 'C Language Basics',
                'description' => 'Test your fundamental knowledge of C programming language.',
                'difficulty' => 1,
                'topic' => $topicIds['C Language'],
                'is_published' => 1,
                'questions' => [
                    [
                        'title' => 'Which symbol is used to end a statement in C?',
                        'options' => [
                            ['title' => ';', 'is_correct' => 1],
                            ['title' => ':', 'is_correct' => 0],
                            ['title' => '.', 'is_correct' => 0],
                        ],
                    ],
                    [
                        'title' => 'Which function is used to display output in C?',
                        'options' => [
                            ['title' => 'printf()', 'is_correct' => 1],
                            ['title' => 'cout <<', 'is_correct' => 0],
                            ['title' => 'echo()', 'is_correct' => 0],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'C Pointers and Memory Management',
                'description' => 'Test your knowledge of pointers and memory allocation in C.',
                'difficulty' => 2,
                'topic' => $topicIds['C Language'],
                'is_published' => 1,
                'questions' => [
                    [
                        'title' => 'What does a pointer store?',
                        'options' => [
                            ['title' => 'Memory address of a variable', 'is_correct' => 1],
                            ['title' => 'Value of a variable', 'is_correct' => 0],
                            ['title' => 'Reference to a function', 'is_correct' => 0],
                        ],
                    ],
                    [
                        'title' => 'Which function is used to dynamically allocate memory in C?',
                        'options' => [
                            ['title' => 'malloc()', 'is_correct' => 1],
                            ['title' => 'alloc()', 'is_correct' => 0],
                            ['title' => 'new()', 'is_correct' => 0],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Advanced C Programming',
                'description' => 'Challenge yourself with advanced C programming concepts.',
                'difficulty' => 3,
                'topic' => $topicIds['C Language'],
                'is_published' => 1,
                'questions' => [
                    [
                        'title' => 'Which of the following is a correct way to define a structure in C?',
                        'options' => [
                            ['title' => 'struct { int x; float y; } data;', 'is_correct' => 1],
                            ['title' => 'struct data { int x; float y; };', 'is_correct' => 0],
                            ['title' => 'define struct { int x; float y; }', 'is_correct' => 0],
                        ],
                    ],
                    [
                        'title' => 'Which keyword is used for defining a macro in C?',
                        'options' => [
                            ['title' => '#define', 'is_correct' => 1],
                            ['title' => 'macro', 'is_correct' => 0],
                            ['title' => 'const', 'is_correct' => 0],
                        ],
                    ],
                ],
            ],


            // HTML5 Quizzes
            [
                'title' => 'HTML Advanced Elements',
                'description' => 'Challenge yourself with advanced HTML5 elements like semantic tags and forms.',
                'difficulty' => 3,
                'topic' => $topicIds['HTML5'],
                'is_published' => 1,
                'questions' => [
                    [
                        'title' => 'Which HTML5 tag represents a section of navigation links?',
                        'options' => [
                            ['title' => '<nav>', 'is_correct' => 1],
                            ['title' => '<section>', 'is_correct' => 0],
                            ['title' => '<aside>', 'is_correct' => 0],
                        ],
                    ],
                    [
                        'title' => 'What is the purpose of the `<figure>` tag in HTML5?',
                        'options' => [
                            ['title' => 'To group media elements like images and captions', 'is_correct' => 1],
                            ['title' => 'To display tabular data', 'is_correct' => 0],
                            ['title' => 'To define a section of text', 'is_correct' => 0],
                        ],
                    ],
                ],
            ],
            // CSS3 Quizzes
            [
                'title' => 'CSS Grid & Flexbox',
                'description' => 'Learn about modern layout techniques in CSS.',
                'difficulty' => 2,
                'topic' => $topicIds['CSS3'],
                'is_published' => 1,
                'questions' => [
                    [
                        'title' => 'Which CSS property is used to create a flex container?',
                        'options' => [
                            ['title' => 'display: flex;', 'is_correct' => 1],
                            ['title' => 'position: relative;', 'is_correct' => 0],
                            ['title' => 'grid-template:', 'is_correct' => 0],
                        ],
                    ],
                    [
                        'title' => 'What does the `align-items` property do in Flexbox?',
                        'options' => [
                            ['title' => 'Aligns items vertically in the flex container', 'is_correct' => 1],
                            ['title' => 'Sets the background color of flex items', 'is_correct' => 0],
                            ['title' => 'Controls the width of flex items', 'is_correct' => 0],
                        ],
                    ],
                ],
            ],
            // JavaScript Quizzes
            [
                'title' => 'JavaScript ES6 Features',
                'description' => 'Test your knowledge of modern JavaScript ES6 features.',
                'difficulty' => 2,
                'topic' => $topicIds['Javascript'],
                'is_published' => 1,
                'questions' => [
                    [
                        'title' => 'What keyword is used to declare a constant in JavaScript?',
                        'options' => [
                            ['title' => 'const', 'is_correct' => 1],
                            ['title' => 'let', 'is_correct' => 0],
                            ['title' => 'var', 'is_correct' => 0],
                        ],
                    ],
                    [
                        'title' => 'What is the purpose of the arrow function (`=>`) in JavaScript?',
                        'options' => [
                            ['title' => 'To define a concise function syntax', 'is_correct' => 1],
                            ['title' => 'To create a new object', 'is_correct' => 0],
                            ['title' => 'To declare variables', 'is_correct' => 0],
                        ],
                    ],
                ],
            ],
            // Laravel Quizzes
            [
                'title' => 'Laravel Authentication',
                'description' => 'Explore Laravel authentication features.',
                'difficulty' => 3,
                'topic' => $topicIds['Laravel'],
                'is_published' => 1,
                'questions' => [
                    [
                        'title' => 'Which command generates authentication scaffolding in Laravel?',
                        'options' => [
                            ['title' => 'php artisan make:auth', 'is_correct' => 1],
                            ['title' => 'php artisan auth:make', 'is_correct' => 0],
                            ['title' => 'php artisan auth:generate', 'is_correct' => 0],
                        ],
                    ],
                    [
                        'title' => 'What is the purpose of Laravel Sanctum?',
                        'options' => [
                            ['title' => 'To provide simple API authentication for SPAs and mobile apps', 'is_correct' => 1],
                            ['title' => 'To generate model factories', 'is_correct' => 0],
                            ['title' => 'To create database migrations', 'is_correct' => 0],
                        ],
                    ],
                ],
            ],
            // Python Quizzes
            [
                'title' => 'Python Data Structures',
                'description' => 'Test your understanding of Python data structures.',
                'difficulty' => 2,
                'topic' => $topicIds['Python'],
                'is_published' => 1,
                'questions' => [
                    [
                        'title' => 'Which Python data type is mutable?',
                        'options' => [
                            ['title' => 'List', 'is_correct' => 1],
                            ['title' => 'Tuple', 'is_correct' => 0],
                            ['title' => 'String', 'is_correct' => 0],
                        ],
                    ],
                    [
                        'title' => 'What method is used to add an element to a set in Python?',
                        'options' => [
                            ['title' => 'add()', 'is_correct' => 1],
                            ['title' => 'push()', 'is_correct' => 0],
                            ['title' => 'insert()', 'is_correct' => 0],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($quizzes as $quizData) {
            if (!isset($quizData['topic'])) continue;

            $quiz = Quiz::create([
                'title' => $quizData['title'],
                'difficulty' => $quizData['difficulty'],
                'description' => $quizData['description'],
                'is_published' => $quizData['is_published'],
                'topic_id' => $quizData['topic'],
            ]);

            foreach ($quizData['questions'] as $questionData) {
                $question = Question::create([
                    'title' => $questionData['title'],
                    'quiz_id' => $quiz->id,
                ]);

                foreach ($questionData['options'] as $optionData) {
                    Option::create([
                        'title' => $optionData['title'],
                        'question_id' => $question->id,
                        'is_correct' => $optionData['is_correct'],
                    ]);
                }
            }
        }
    }
}
