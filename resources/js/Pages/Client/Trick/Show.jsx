import Breadcrumb from "@/Components/Breadcrumb";
import TitleSection from "@/Components/TitleSection";
import { TranslationContext } from "@/contexts/TranslationProvider";
import Layout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";
import React, { useContext } from "react";
import { InstructionCard } from "./InstructionCard";

function Show({ trick }) {
    const { translations } = useContext(TranslationContext);

    return (
        <Layout header="Tricks">
            <Head title={trick.title_en} />

            <div className="p-3 sm:p-6 rounded-lg _border">
                <header className="mb-3 sm:mb-6">
                    <Breadcrumb
                        routes={[
                            {
                                href: route("dashboard"),
                                label: translations.home,
                            },
                            {
                                href: route("trickList"),
                                label: translations.list_of_tricks,
                            },
                            { label: trick.title_en }, // No `href` for the last one
                        ]}
                    />
                    <TitleSection title={trick.title_en} />
                    {trick.user && (
                        <h2 className="text-xl mt-3 font-bold leading-tight dark:text-slate-400 text-slate-600">
                            {translations.created_by + " "}
                            <span className="dark:text-slate-200 text-slate-600">
                                @{trick.user.username}
                            </span>
                        </h2>
                    )}
                </header>

                {/* topics */}
                <h3 className="text-2xl mb-3 font-normal leading-tight dark:text-slate-400 text-slate-600">
                    Topics
                </h3>
                <div className="mb-6 flex flex-wrap gap-3 pb-6 border-b border-slate-200 dark:border-slate-800">
                    {trick.topics &&
                        trick.topics.map((topic) => (
                            <div title={topic.name}>
                                <div className="w-10 p-1 dark:bg-slate-800 bg-ilyes/10 aspect-square rounded-full">
                                    <img
                                        className="w-full aspect-square object-contain"
                                        src={`${import.meta.env.VITE_APP_URL}/${
                                            topic.svg
                                        }`}
                                        alt={topic.name}
                                    />
                                </div>
                            </div>
                        ))}
                </div>

                <div className="grid grid-cols-1 gap-6">
                    {trick.instructions &&
                        trick.instructions.map((instruction) => (
                            <InstructionCard
                                instruction={instruction}
                                key={instruction.id}
                            />
                        ))}
                </div>
            </div>
        </Layout>
    );
}

export default Show;
