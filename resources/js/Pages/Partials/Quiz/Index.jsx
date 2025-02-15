import NavLink from "@/Components/NavLink";
import Search from "@/Components/Search";
import Table from "@/Components/Table";
import TableBody from "@/Components/TableBody";
import TableHead from "@/Components/TableHead";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";
import React, { useState } from "react";
import QuizData from "./QuizData";

export default function Index({ quizzes }) {
    // Search State
    const [filteredQuizzes, setFilteredQuizzes] = useState(quizzes);

    return (
        <AuthenticatedLayout header="Quizzes">
            <Head title="Quizzes List" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <div className="flex justify-between">
                        <div className="flex items-center gap-3">
                            <div className="">
                                <TitleSection title="Quizzes list" data={quizzes} />
                                {/* {quizzes && (
                                )} */}
                                <div className="mt-3">
                                    <NavLink href={route("quizzes.create")} active={route().current("quizzes.create")}>
                                        <i className="fa-solid fa-circle-plus me-2 text-lg"></i>
                                        Create new quiz
                                    </NavLink>
                                </div>
                            </div>
                        </div>

                        {/* Search Component */}
                        <div className="">
                            <Search
                                placeholder="Search in quizzes..."
                                data={quizzes}
                                columns={["name", "description", "user.username"]}
                                onSearch={setFilteredQuizzes}
                            />
                        </div>
                    </div>
                </header>

                {/* Quizzes Grid */}
                {/* {filteredQuizzes.length > 0 ? (
                    filteredQuizzes.map((quiz) => <QuizCard key={quiz.id} quiz={quiz} />)
                ) : (
                    <div className="col-span-full text-center text-slate-500 dark:text-slate-400">No quizzes found.</div>
                )} */}

                <Table>
                    <TableHead
                        headers={[
                            "Quiz title",
                            "description",
                            "difficulty",
                            "Topic",
                            "is published",
                            "Created at",
                            "Action",
                        ]}
                    />

                    <TableBody
                        data={quizzes}
                        renderRow={(quiz) => (
                            <>
                                <QuizData quiz={quiz} />
                            </>
                        )}
                    />
                </Table>
            </div>

            {/* Pagination */}
            {/* <div className="mt-12 flex justify-center">
                <Pagination data={filteredQuizzes} />
            </div> */}
        </AuthenticatedLayout>
    );
}
