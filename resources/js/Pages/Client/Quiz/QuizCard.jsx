import Avatar from "@/Components/Avatar";
import AvatarInconu from "@/Components/AvatarInconu";
import { Card } from "@/Components/Card";
import NavLink from "@/Components/NavLink";
import { TranslationContext } from "@/contexts/TranslationProvider";
import { usePage } from "@inertiajs/react";
import React, { useContext } from "react";

function QuizCard({ quiz }) {
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

    const { translations } = useContext(TranslationContext);

    return (
        <Card key={quiz.id}>
            <span className="text-ilyes bg-ilyes/10 rounded-full font-medium px-2 text-xs whitespace-nowrap tracking-wide capitalize">
                {quiz.difficulty == 1
                    ? translations.Easy
                    : quiz.difficulty == 2
                    ? translations.Medium
                    : quiz.difficulty == 3
                    ? translations.Hard
                    : "Unknown"}{" "}
            </span>

            {/* title */}
            <h4 className="text-balance dark:text-slate-300 text-slate-800 text-lg dark:font-medium font-semibold break-words mb-3 mt-6 group-hover:text-red-500">
                {quiz.title}
            </h4>

            {/* description */}
            <p className="text-balance dark:text-slate-500 text-slate-600 break-words">{quiz.description}</p>

            {/* topics */}
            <div className="mt-3 flex flex-wrap gap-3">
                {quiz.topic && (
                    <div className="w-6 aspect-square rounded-full" title={quiz.topic.name}>
                        <img
                            className="w-full aspect-square object-contain"
                            src={`${import.meta.env.VITE_APP_URL}/${quiz.topic.svg}`}
                            alt={quiz.topic.name}
                        />
                    </div>
                )}
            </div>

            <div className="flex justify-end">
                <NavLink href={route("quizShow", quiz)}>
                    {userQuiz ? translations.see_your_answers : translations.play_this_quiz}

                    <span className="rtl:hidden">
                        <i className="fa-solid fa-arrow-right-long ms-2 text-sm"></i>
                    </span>
                    <span className="ltr:hidden">
                        <i className="fa-solid fa-arrow-left-long ms-2 text-sm"></i>
                    </span>
                </NavLink>
            </div>

            {userQuiz && (
                <div className="flex items-center gap-3 absolute top-4 right-4 rtl:left-4 rtl:right-auto">
                    <span className="text-slate-500 text-sm">{translations.your_score}</span>
                    <div className="relative size-12">
                        <svg className="size-full -rotate-90" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
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
                                className={`text-center text-xs font-bold ${
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
        </Card>
    );
}

export default QuizCard;
