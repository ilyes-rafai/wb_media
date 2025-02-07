import NavLink from "@/Components/NavLink";
import Search from "@/Components/Search";
import Table from "@/Components/Table";
import TableBody from "@/Components/TableBody";
import TableHead from "@/Components/TableHead";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";
import React, { useState } from "react";
import TrickData from "./TrickData";

export default function Index({ tricks }) {
    // Search State
    const [filteredTricks, setFilteredTricks] = useState(tricks);

    return (
        <AuthenticatedLayout header="Tricks">
            <Head title="Tricks List" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <div className="flex justify-between">
                        <div className="flex items-center gap-3">
                            <div className="">
                                <TitleSection title="Tricks list" data={tricks} />
                                {/* {tricks && (
                                )} */}
                                <div className="mt-3">
                                    <NavLink href={route("tricks.create")} active={route().current("tricks.create")}>
                                        <i className="fa-solid fa-circle-plus me-2 text-lg"></i>
                                        Create new trick
                                    </NavLink>
                                </div>
                            </div>
                        </div>

                        {/* Search Component */}
                        <div className="">
                            <Search
                                placeholder="Search in tricks..."
                                data={tricks}
                                columns={["name", "description", "user.username"]}
                                onSearch={setFilteredTricks}
                            />
                        </div>
                    </div>
                </header>

                {/* Tricks Grid */}
                {/* {filteredTricks.length > 0 ? (
                    filteredTricks.map((trick) => <TrickCard key={trick.id} trick={trick} />)
                ) : (
                    <div className="col-span-full text-center text-slate-500 dark:text-slate-400">No tricks found.</div>
                )} */}

                <Table>
                    <TableHead
                        headers={[
                            "Trick title",
                            "Instructions count",
                            "related Topics",
                            "Availability",
                            "Created by",
                            "Created at",
                            "Action",
                        ]}
                    />

                    <TableBody
                        data={tricks}
                        renderRow={(trick) => (
                            <>
                                <TrickData trick={trick} />
                            </>
                        )}
                    />
                </Table>
            </div>

            {/* Pagination */}
            {/* <div className="mt-12 flex justify-center">
                <Pagination data={filteredTricks} />
            </div> */}
        </AuthenticatedLayout>
    );
}
