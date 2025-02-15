import Breadcrumb from "@/Components/Breadcrumb";
import TitleSection from "@/Components/TitleSection";
import Layout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";
import React, { useContext } from "react";
import { ChapterCard } from "./ChapterCard";

function Show({ course }) {
    const { translations } = useContext(TranslationContext);

    return (
        <Layout header="Courses">
            <Head title={course.title} />

            <div className="p-3 sm:p-6 rounded-lg _border">
                <header className="mb-3 sm:mb-6">
                    <Breadcrumb
                        routes={[
                            { href: route("dashboard"), label: translations.home },
                            { href: route("courseList"), label: translations.list_of_courses },
                            { label: course.title }, // No `href` for the last one
                        ]}
                    />
                    <TitleSection title={course.title} />
                    {course.user && (
                        <h2 className="text-xl mt-3 font-bold leading-tight dark:text-slate-400 text-slate-600">
                            Created by{" "}
                            <span className="dark:text-slate-200 text-slate-600">@{course.user.username}</span>
                        </h2>
                    )}
                </header>

                {/* topics */}
                <h3 className="text-2xl mb-3 font-normal leading-tight dark:text-slate-400 text-slate-600">Topics</h3>
                <div className="mb-6 flex flex-wrap gap-3 pb-6 border-b border-slate-200 dark:border-slate-800">
                    {course.topics &&
                        course.topics.map((topic) => (
                            <div title={topic.name}>
                                <div className="w-10 p-1 dark:bg-slate-800 bg-ilyes/10 aspect-square rounded-full">
                                    <img
                                        className="w-full aspect-square object-contain"
                                        src={`${import.meta.env.VITE_APP_URL}/${topic.svg}`}
                                        alt={topic.name}
                                    />
                                </div>
                            </div>
                        ))}
                </div>

                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                    {course.chapters &&
                        course.chapters.map((chapter) => <ChapterCard chapter={chapter} key={chapter.id} />)}
                </div>
            </div>
        </Layout>
    );
}

export default Show;
