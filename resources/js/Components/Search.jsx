import React, { useState } from "react";

// Helper function to access nested fields
const getNestedValue = (obj, path) => {
    return path.split(".").reduce((acc, key) => acc && acc[key], obj);
};

export default function Search({ data, columns, onSearch, placeholder }) {
    const [searchTerm, setSearchTerm] = useState("");

    const handleSearch = (term) => {
        setSearchTerm(term);
        if (onSearch) {
            const filteredData = data.filter((item) =>
                columns.some((column) => {
                    const value = getNestedValue(item, column);
                    return value && value.toString().toLowerCase().includes(term.toLowerCase());
                })
            );
            onSearch(filteredData);
        }
    };

    return (
        <div className="" title="Search">
            <div className="relative">
                <div className="absolute inset-y-0 start-0 flex items-center ps-5 pointer-events-none text-slate-500 dark:text-slate-400">
                    <i className="fa-solid fa-search"></i>
                </div>
                <input
                    type="search"
                    value={searchTerm}
                    onChange={(e) => handleSearch(e.target.value)}
                    id="default-search"
                    className="block w-full px-4 py-3 ps-14 text-sm text-slate-700 border border-slate-200 dark:border-slate-800 rounded-full focus:ring-ilyes focus:border-ilyes dark:placeholder-slate-400 dark:text-slate-200 dark:focus:ring-ilyes dark:focus:border-ilyes bg-transparent transition duration-300"
                    placeholder={placeholder}
                />
            </div>
        </div>
    );
}
