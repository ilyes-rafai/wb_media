import Breadcrumb from "@/Components/Breadcrumb";
import NavLink from "@/Components/NavLink";
import TitleSection from "@/Components/TitleSection";
import Layout from "@/Layouts/Layout";
import React from "react";
import ProjectCard from "./ProjectCard";

function List({ projects }) {
    return (
        <Layout>
            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-slate-200 dark:border-slate-800">
                <Breadcrumb
                    routes={[
                        { href: route("dashboard"), label: "Dashboard" },
                        { label: "Projects list" }, // No `href` for the last one
                    ]}
                />
                <header className="mb-3 sm:mb-6 lg:mb-12 flex flex-col md:flex-row justify-between md:items-center gap-6 md:gap-0">
                    <TitleSection title="Projects list" />
                </header>

                <div className="">
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                        {projects.map((project) => (
                            <ProjectCard key={project.id} project={project} />
                        ))}
                    </div>
                </div>
            </div>
        </Layout>
    );
}

export default List;
