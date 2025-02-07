import Breadcrumb from "@/Components/Breadcrumb";
import NavLink from "@/Components/NavLink";
import TitleSection from "@/Components/TitleSection";
import Layout from "@/Layouts/Layout";
import React from "react";
import TrickCard from "./TrickCard";

function List({ tricks }) {
    return (
        <Layout>
            <div className="p-3 sm:p-6 rounded-lg _border">
                <Breadcrumb
                    routes={[
                        { href: route("dashboard"), label: "Dashboard" },
                        { label: "List of tricks" }, // No `href` for the last one
                    ]}
                />
                <header className="mb-3 sm:mb-6 flex flex-col md:flex-row justify-between md:items-center gap-6 md:gap-0">
                    <TitleSection title="List of tricks" />
                </header>

                <div className="">
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                        {tricks.map((trick) => (
                            <TrickCard key={trick.id} trick={trick} />
                        ))}
                    </div>
                </div>
            </div>
        </Layout>
    );
}

export default List;
