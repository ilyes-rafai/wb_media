import NavLink from "@/Components/NavLink";
import Search from "@/Components/Search";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import React, { useState } from "react";
import ProjectData from "./ProjectData";

export default function Index({ projects }) {
    // Search State
    const [filteredProjects, setFilteredProjects] = useState(projects);

    return (
        <AuthenticatedLayout header="Projects">
            <Head title="Projects List" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-zinc-200 dark:border-zinc-800">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <div className="flex justify-between">
                        <div className="flex items-center gap-3">
                            <div className="">
                                <TitleSection title="Projects list" data={projects} />
                                {/* {projects && (
                                )} */}
                                <div className="mt-3">
                                    <NavLink
                                        href={route("projects.create")}
                                        active={route().current("projects.create")}
                                    >
                                        <i className="fa-solid fa-circle-plus me-2 text-lg"></i>
                                        Create new project
                                    </NavLink>
                                </div>
                            </div>
                        </div>

                        {/* Search Component */}
                        <div className="">
                            <Search
                                placeholder="Search in projects..."
                                data={projects}
                                columns={["name", "description", "user.username"]}
                                onSearch={setFilteredProjects}
                            />
                        </div>
                    </div>
                </header>

                {/* Projects Grid */}
                {/* {filteredProjects.length > 0 ? (
                    filteredProjects.map((project) => <ProjectCard key={project.id} project={project} />)
                ) : (
                    <div className="col-span-full text-center text-zinc-500 dark:text-zinc-400">No projects found.</div>
                )} */}

                <div className="relative overflow-x-auto">
                    <table className="w-full text-sm text-left rtl:text-right text-zinc-500 dark:text-zinc-400">
                        <thead className="text-xs text-zinc-700 uppercase dark:text-zinc-400 border dark:border-zinc-800">
                            <tr>
                                <th scope="col" className="px-6 py-3">
                                    Project title
                                </th>
                                <th scope="col" className="px-6 py-3">
                                    Instructions count
                                </th>
                                <th scope="col" className="px-6 py-3">
                                    related Topics
                                </th>
                                <th scope="col" className="px-6 py-3">
                                    Availability
                                </th>
                                <th scope="col" className="px-6 py-3">
                                    Created by
                                </th>
                                <th scope="col" className="px-6 py-3">
                                    Created at
                                </th>
                                <th scope="col" className="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {projects.map((project, index) => (
                                <ProjectData key={index} project={project} />
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>

            {/* Pagination */}
            {/* <div className="mt-12 flex justify-center">
                <Pagination data={filteredProjects} />
            </div> */}
        </AuthenticatedLayout>
    );
}
