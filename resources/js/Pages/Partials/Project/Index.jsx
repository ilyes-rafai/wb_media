import NavLink from "@/Components/NavLink";
import Search from "@/Components/Search";
import Table from "@/Components/Table";
import TableBody from "@/Components/TableBody";
import TableHead from "@/Components/TableHead";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";
import React, { useState } from "react";
import ProjectData from "./ProjectData";

export default function Index({ projects }) {
    // Search State
    const [filteredProjects, setFilteredProjects] = useState(projects);

    return (
        <AuthenticatedLayout header="Projects">
            <Head title="Projects List" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-slate-200 dark:border-slate-800">
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
                    <div className="col-span-full text-center text-slate-500 dark:text-slate-400">No projects found.</div>
                )} */}

                <Table>
                    <TableHead
                        headers={[
                            "Project title",
                            "Instructions count",
                            "related Topics",
                            "Availability",
                            "Created by",
                            "Created at",
                            "Action",
                        ]}
                    />

                    <TableBody
                        data={projects}
                        renderRow={(project) => (
                            <>
                                <ProjectData project={project} />
                            </>
                        )}
                    />
                </Table>
            </div>

            {/* Pagination */}
            {/* <div className="mt-12 flex justify-center">
                <Pagination data={filteredProjects} />
            </div> */}
        </AuthenticatedLayout>
    );
}
