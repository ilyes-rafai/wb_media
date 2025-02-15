import Breadcrumb from "@/Components/Breadcrumb";
import TitleSection from "@/Components/TitleSection";
import { TranslationContext } from "@/contexts/TranslationProvider";
import Layout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";
import React, { useContext } from "react";
import QuizCard from "./QuizCard";

function List({ quizzes }) {
    const { translations } = useContext(TranslationContext);

    return (
        <Layout>
            <Head title={translations.list_of_quizzes} />

            <div className="p-3 sm:p-6 rounded-lg _border">
                <Breadcrumb
                    routes={[
                        { href: route("dashboard"), label: translations.home },
                        { label: translations.list_of_quizzes }, // No `href` for the last one
                    ]}
                />
                <header className="mb-3 sm:mb-6 flex flex-col md:flex-row justify-between md:items-center gap-6 md:gap-0">
                    <TitleSection title={translations.list_of_quizzes} />
                </header>

                {/* <UnderDev /> */}

                <div className="">
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                        {quizzes.map((quiz) => (
                            <QuizCard key={quiz.id} quiz={quiz} />
                        ))}
                    </div>
                </div>
            </div>
        </Layout>
    );
}

export default List;
