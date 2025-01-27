import NavLink from "@/Components/NavLink";
import Search from "@/Components/Search";
import Table from "@/Components/Table";
import TableBody from "@/Components/TableBody";
import TableHead from "@/Components/TableHead";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";
import React, { useState } from "react";
import CourseData from "./CourseData";

export default function Index({ courses }) {
    // Search State
    const [filteredCourses, setFilteredCourses] = useState(courses);

    return (
        <AuthenticatedLayout header="Courses">
            <Head title="Courses List" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-slate-200 dark:border-slate-800">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <div className="flex justify-between">
                        <div className="flex items-center gap-3">
                            <div className="">
                                <TitleSection title="Courses list" data={courses} />
                                {/* {courses && (
                                )} */}
                                <div className="mt-3">
                                    <NavLink href={route("courses.create")} active={route().current("courses.create")}>
                                        <i className="fa-solid fa-circle-plus me-2 text-lg"></i>
                                        Create new course
                                    </NavLink>
                                </div>
                            </div>
                        </div>

                        {/* Search Component */}
                        <div className="">
                            <Search
                                placeholder="Search in courses..."
                                data={courses}
                                columns={["name", "description", "user.username"]}
                                onSearch={setFilteredCourses}
                            />
                        </div>
                    </div>
                </header>

                {/* Courses Grid */}
                {/* {filteredCourses.length > 0 ? (
                    filteredCourses.map((course) => <CourseCard key={course.id} course={course} />)
                ) : (
                    <div className="col-span-full text-center text-slate-500 dark:text-slate-400">No courses found.</div>
                )} */}

                <Table>
                    <TableHead
                        headers={[
                            "Course title",
                            "Chapters count",
                            "Related Topics",
                            "Availability",
                            "Created by",
                            "Created at",
                            "Action",
                        ]}
                    />

                    <TableBody
                        data={courses}
                        renderRow={(course) => (
                            <>
                                <CourseData course={course} />
                            </>
                        )}
                    />
                </Table>
            </div>

            {/* Pagination */}
            {/* <div className="mt-12 flex justify-center">
                <Pagination data={filteredCourses} />
            </div> */}
        </AuthenticatedLayout>
    );
}
