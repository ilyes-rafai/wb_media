import Breadcrumb from "@/Components/Breadcrumb";
import PrimaryButton from "@/Components/PrimaryButton";
import TitleSection from "@/Components/TitleSection";
import { TranslationContext } from "@/contexts/TranslationProvider";
import Layout from "@/Layouts/Layout";
import { Head, router, useForm, usePage } from "@inertiajs/react";
import React, { useContext, useEffect, useRef, useState } from "react";
import { QuestionCard } from "./QuestionCard";

function Show({ quiz }) {
    const { auth } = usePage().props;
    const authUser = auth.user;

    // Check if the auth user has already taken this quiz
    const userQuiz = authUser.quizzes.find((userQuiz) => userQuiz.id === quiz.id);

    // If the user has taken the quiz, calculate their score
    let scorePercentage = null;
    if (userQuiz) {
        const { correctCount, totalCount } = userQuiz.pivot;
        scorePercentage = (correctCount / totalCount) * 100;
    }

    //
    const [processing, setProcessing] = useState(false);

    const [userAnswers, setUserAnswers] = useState({});

    const handleAnswerChange = (questionId, optionId) => {
        setUserAnswers((prevAnswers) => ({
            ...prevAnswers,
            [questionId]: optionId,
        }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();

        let correctUserCountTemp = 0;
        let allAnswered = true;

        quiz.questions.forEach((question) => {
            if (!userAnswers[question.id]) {
                allAnswered = false;
            }
            question.options.forEach((option) => {
                if (userAnswers[question.id] === option.id && option.is_correct) {
                    correctUserCountTemp++;
                }
            });
        });

        if (!allAnswered) {
            alert("Please answer all the questions before submitting.");
            return;
        }

        setProcessing(true);
        router.post(
            "/attach-quiz-to-user",
            {
                correctCount: correctUserCountTemp,
                totalCount: quiz.questions.length,
                quiz_id: quiz.id,
                userAnswers, // Send user answers
            },
            {
                preserveScroll: true,
                onFinish: () => setProcessing(false),
            }
        );
    };

    const userStoredAnswers = userQuiz ? JSON.parse(userQuiz.pivot.answers) : {}; // Decode stored answers

    const { translations } = useContext(TranslationContext);

    return (
        <Layout header="Quizzes">
            <Head title={quiz.title} />

            <div className="p-3 sm:p-6 rounded-lg _border">
                <header className="mb-3 sm:mb-6">
                    <Breadcrumb
                        routes={[
                            { href: route("dashboard"), label: translations.home },
                            { href: route("quizList"), label: translations.list_of_quizzes },
                            { label: quiz.title }, // No `href` for the last one
                        ]}
                    />

                    <span className="text-ilyes bg-ilyes/10 rounded-full font-medium px-2 text-xs whitespace-nowrap tracking-wide capitalize">
                        {quiz.difficulty == 1
                            ? translations.Easy
                            : quiz.difficulty == 2
                            ? translations.Medium
                            : quiz.difficulty == 3
                            ? translations.Hard
                            : "Unknown"}{" "}
                    </span>

                    <TitleSection title={quiz.title} />
                </header>

                {/* topics */}
                <div className="mb-6 flex gap-3 items-center">
                    <h3 className="text-2xl font-normal leading-tight dark:text-slate-400 text-slate-600">Topic</h3>
                    {quiz.topic && (
                        <div title={quiz.topic.name}>
                            <div className="w-10 p-1 dark:bg-slate-800 bg-ilyes/10 aspect-square rounded-full">
                                <img
                                    className="w-full aspect-square object-contain"
                                    src={`${import.meta.env.VITE_APP_URL}/${quiz.topic.svg}`}
                                    alt={quiz.topic.name}
                                />
                            </div>
                        </div>
                    )}
                </div>

                {userQuiz && (
                    <div className="flex flex-col items-center gap-3">
                        <span className="text-slate-500 text-xl">{translations.your_score}</span>
                        <div className="relative size-36">
                            <svg
                                className="size-full -rotate-90"
                                viewBox="0 0 36 36"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                {/* Background Circle */}
                                <circle
                                    cx="18"
                                    cy="18"
                                    r="16"
                                    fill="none"
                                    className={`stroke-current ${
                                        scorePercentage < 50
                                            ? "text-rose-500/20"
                                            : scorePercentage > 50
                                            ? "text-green-500/20"
                                            : "text-violet-500/20"
                                    }`}
                                    strokeWidth="2"
                                ></circle>

                                <circle
                                    cx="18"
                                    cy="18"
                                    r="16"
                                    fill="none"
                                    className={`stroke-current ${
                                        scorePercentage < 50
                                            ? "text-rose-500"
                                            : scorePercentage > 50
                                            ? "text-green-500"
                                            : "text-violet-500"
                                    }`}
                                    strokeWidth="2"
                                    strokeDasharray="100"
                                    strokeDashoffset={`${100 - scorePercentage}`} // Dynamic progress
                                    strokeLinecap="round"
                                ></circle>
                            </svg>

                            <div className="absolute top-1/2 start-1/2 transform -translate-y-1/2 ltr:-translate-x-1/2 rtl:translate-x-1/2">
                                <span
                                    className={`text-center text-2xl font-bold ${
                                        scorePercentage < 50
                                            ? "text-rose-500"
                                            : scorePercentage > 50
                                            ? "text-green-500"
                                            : "text-violet-500"
                                    }`}
                                >
                                    {scorePercentage.toFixed(0)}%
                                </span>
                            </div>
                        </div>
                    </div>
                )}

                {!userQuiz && (
                    <>
                        <div className="grid grid-cols-1 gap-6 mb-6">
                            {quiz.questions &&
                                quiz.questions.map((question) => (
                                    <QuestionCard
                                        key={question.id}
                                        question={question}
                                        onAnswerChange={handleAnswerChange} // Pass handler to update selected answers
                                        selectedAnswer={userAnswers[question.id]} // Pass selected answer for each question
                                    />
                                ))}
                        </div>
                        <form onSubmit={handleSubmit}>
                            <PrimaryButton type="submit" className="flex items-center gap-2">
                                {processing ? (
                                    <>
                                        <i className="fa-solid fa-spinner animate-spin"></i>
                                        Processing...
                                    </>
                                ) : (
                                    "Save"
                                )}
                            </PrimaryButton>
                        </form>
                    </>
                )}

                {/* Display Questions and Correct/Wrong Answers */}
                {userQuiz && (
                    <div className="mt-6">
                        <h3 className="text-xl font-semibold dark:text-slate-400 mb-6">{translations.your_answers}</h3>
                        {quiz.questions.map((question) => (
                            <div key={question.id} className="p-3 sm:p-6 rounded-lg _border mb-3 last:mb-0">
                                <h4 className="text-lg font-semibold dark:text-slate-200 text-slate-900">
                                    {question.title}
                                </h4>

                                {question.options.map((option) => {
                                    const userSelected = parseInt(userStoredAnswers[question.id]) === option.id;
                                    const isCorrect = option.is_correct;

                                    return (
                                        <div key={option.id} className="ml-4">
                                            <span
                                                className={`${
                                                    isCorrect
                                                        ? "text-green-500 font-semibold"
                                                        : userSelected
                                                        ? "text-rose-500 font-semibold"
                                                        : "text-slate-500"
                                                }`}
                                            >
                                                {option.title}
                                            </span>

                                            {userSelected && !isCorrect && (
                                                <span className="ml-2 text-sm text-rose-500 font-semibold">
                                                    ({translations.Wrong_answer_the_correct_answer_is}:{" "}
                                                    {question.options.find((opt) => opt.is_correct)?.title})
                                                </span>
                                            )}

                                            {userSelected && isCorrect && (
                                                <span className="ml-2 text-sm text-green-500 font-semibold">
                                                    ({translations.correcte})
                                                </span>
                                            )}
                                        </div>
                                    );
                                })}
                            </div>
                        ))}
                    </div>
                )}
            </div>
        </Layout>
    );
}

export default Show;
