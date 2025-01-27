import Breadcrumb from "@/Components/Breadcrumb";
import TitleSection from "@/Components/TitleSection";
import Layout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";
import React from "react";
import { InstructionCard } from "./InstructionCard";

function Show({ project }) {
    return (
        <Layout header="Projects">
            <Head title={project.title} />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-slate-200 dark:border-slate-800">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <Breadcrumb
                        routes={[
                            { href: route("dashboard"), label: "Dashboard" },
                            { href: route("projectList"), label: "Projects List" },
                            { label: project.title }, // No `href` for the last one
                        ]}
                    />
                    <TitleSection title={project.title} />
                    {project.user && (
                        <h2 className="text-xl mt-3 font-bold leading-tight dark:text-slate-400 text-slate-600">
                            Created by{" "}
                            <span className="dark:text-slate-200 text-slate-600">@{project.user.username}</span>
                        </h2>
                    )}
                </header>

                {/* topics */}
                <h3 className="text-2xl mb-3 font-normal leading-tight dark:text-slate-400 text-slate-600">Topics</h3>
                <div className="mb-6 flex flex-wrap gap-3 pb-6 border-b border-slate-200 dark:border-slate-800">
                    {project.topics &&
                        project.topics.map((topic) => (
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

                <div className="grid grid-cols-1 gap-6">
                    {project.instructions &&
                        project.instructions.map((instruction) => (
                            <InstructionCard instruction={instruction} key={instruction.id} />
                        ))}
                </div>
            </div>
        </Layout>
    );
}

export default Show;
