import NavLink from "@/Components/NavLink";
import Search from "@/Components/Search";
import Table from "@/Components/Table";
import TableBody from "@/Components/TableBody";
import TableHead from "@/Components/TableHead";
import TitleSection from "@/Components/TitleSection";
import { TranslationContext } from "@/contexts/TranslationProvider";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";
import React, { useContext, useState } from "react";
import VocabularyData from "./VocabularyData";

export default function Index({ vocabularies }) {
    const { translations } = useContext(TranslationContext);

    return (
        <AuthenticatedLayout header="Vocabularies">
            <Head title="Vocabulary" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <div className="flex justify-between">
                        <div className="flex items-center gap-3">
                            <div className="">
                                <TitleSection title="Vocabulary" data={vocabularies} />
                                {/* {vocabularies && (
                                )} */}
                                <div className="mt-3">
                                    <NavLink
                                        href={route("vocabularies.create")}
                                        active={route().current("vocabularies.create")}
                                    >
                                        <i className="fa-solid fa-circle-plus me-2 text-lg"></i>
                                        Create new term
                                    </NavLink>
                                </div>
                            </div>
                        </div>

                        {/* Search Component */}
                        <div className="">
                            <Search
                                placeholder="Search in vocabulary..."
                                data={vocabularies}
                                columns={["name", "description", "user.username"]}
                                // onSearch={setFilteredVocabularies}
                            />
                        </div>
                    </div>
                </header>

                <Table>
                    <TableHead headers={["term", "is_from_client", "Created at", "Action"]} />

                    <TableBody
                        data={vocabularies}
                        renderRow={(vocabulary) => (
                            <>
                                <VocabularyData vocabulary={vocabulary} />
                            </>
                        )}
                    />
                </Table>
            </div>
        </AuthenticatedLayout>
    );
}
