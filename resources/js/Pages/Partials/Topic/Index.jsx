import ButtonCircle from "@/Components/ButtonCircle";
import FloatInput from "@/Components/FloatInput";
import InputError from "@/Components/InputError";
import NavLink from "@/Components/NavLink";
import Search from "@/Components/Search";
import Table from "@/Components/Table";
import TableBody from "@/Components/TableBody";
import TableHead from "@/Components/TableHead";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head, useForm } from "@inertiajs/react";
import React, { useState } from "react";
import TopicCard from "./TopicCard";
import TopicData from "./TopicData";

export default function Index({ topics }) {
    // Search State
    const [filteredTopics, setFilteredTopics] = useState(topics);

    // add modal
    const [isModalOpened, setIsModalOpened] = useState(false);

    const openModal = () => {
        setIsModalOpened(true);
    };

    const closeModal = () => {
        setIsModalOpened(false);
    };

    return (
        <AuthenticatedLayout header="Topics">
            <Head title="Topics List" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-slate-200 dark:border-slate-800">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <div className="flex justify-between">
                        <div className="flex items-center gap-3">
                            <div className="">
                                <TitleSection title="Topics list" data={topics} />
                                <div className="mt-3">
                                    <NavLink href={route("topics.create")} active={route().current("topics.create")}>
                                        <i className="fa-solid fa-circle-plus me-2 text-lg"></i>
                                        Create new topic
                                    </NavLink>
                                </div>
                            </div>
                        </div>

                        {/* Search Component */}
                        <div className="">
                            <Search
                                placeholder="Search in topics..."
                                data={topics}
                                columns={["name", "description", "user.username"]}
                                onSearch={setFilteredTopics}
                            />
                        </div>
                    </div>
                </header>

                {/* Topics Grid */}
                {/* <div className="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                    {topics.map((topic) => (
                        <TopicData key={topic.id} topic={topic} />
                    ))}
                </div> */}

                <Table>
                    <TableHead
                        headers={[
                            "name",
                            "svg",
                            "Description",
                            "projects count",
                            "courses count",
                            "Created by",
                            " Created at",
                            "Action",
                        ]}
                    />
                    <TableBody
                        data={topics}
                        renderRow={(topic) => (
                            <>
                                <TopicData topic={topic} />
                            </>
                        )}
                    />
                </Table>
            </div>

            {/* Pagination */}
            {/* <div className="mt-12 flex justify-center">
                <Pagination data={filteredTopics} />
            </div> */}
        </AuthenticatedLayout>
    );
}
