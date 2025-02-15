import React, { useEffect, useRef, useState } from "react";

const SearchableSelect = ({ data, columns, label, onChange, selectedValue }) => {
    // State to manage the search term
    const [search, setSearch] = useState("");
    const [isOpen, setIsOpen] = useState(false); // To toggle the dropdown

    // Reference to the dropdown container to detect clicks outside
    const dropdownRef = useRef(null);

    // Filter the data based on the search term and columns
    const filteredData = data.filter((item) =>
        columns.some((column) =>
            item[column] ? item[column].toString().toLowerCase().includes(search.toLowerCase()) : false
        )
    );

    // Find the selected item based on selectedValue
    const selectedItem = data.find((item) => item.id === selectedValue);

    // Close the dropdown if clicked outside
    useEffect(() => {
        // Function to handle click outside the dropdown
        const handleClickOutside = (event) => {
            if (dropdownRef.current && !dropdownRef.current.contains(event.target)) {
                setIsOpen(false); // Close the dropdown if clicked outside
            }
        };

        // Add event listener on mount
        document.addEventListener("mousedown", handleClickOutside);

        // Cleanup the event listener on unmount
        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
        };
    }, []);

    return (
        <div className="relative" ref={dropdownRef}>
            {/* Label */}
            <label className="block text-xs font-semibold mb-2">{label}</label>

            {/* The Select Dropdown Button */}
            <div
                className="w-full p-2.5 pl-4 bg-transparent rounded-lg cursor-pointer flex justify-between items-center font-semibold _border text-slate-700 dark:text-slate-300 text-sm"
                onClick={() => setIsOpen(!isOpen)} // Toggle the dropdown
            >
                <div className="flex gap-1">
                    {/* Display selected item's columns values */}
                    {selectedItem
                        ? columns.map((column, index) => (
                              <span className="uppercase text-sm font-semibold" key={index}>
                                  {selectedItem[column]}
                              </span>
                          ))
                        : "Sélectionner une option"}
                </div>

                {/* FontAwesome Arrow icon */}
                <i className={`ml-2 fas fa-chevron-down transition duration-300 ${isOpen ? "rotate-180" : ""}`}></i>
            </div>

            {/* The Search Input inside the dropdown */}
            {isOpen && (
                <div className="absolute mt-2 w-full bg-gradient-to-br bg-white dark:from-slate-950 dark:via-black dark:to-slate-950 shadow-lg shadow-slate-200 dark:shadow-black _border rounded-lg overflow-hidden z-40">
                    <div className="relative mb-3">
                        <div className="h-10 absolute flex justify-center items-center aspect-square">
                            <i className="fa-solid fa-magnifying-glass text-ilyes"></i>
                        </div>
                        <input
                            type="search"
                            placeholder="Rechercher..."
                            className="dark:[color-scheme:dark] font-semibold border text-slate-700 dark:text-slate-300 placeholder:font-medium dark:placeholder-slate-600 placeholder-slate-400 text-sm w-full p-2.5 bg-transparent focus:ring-ilyes focus:border-ilyes _border rounded-lg pl-10"
                            value={search}
                            onChange={(e) => setSearch(e.target.value)}
                        />
                    </div>

                    {/* The options list */}
                    <ul className="max-h-52 overflow-x-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:bg-slate-100 [&::-webkit-scrollbar-thumb]:bg-ilyes dark:[&::-webkit-scrollbar-track]:bg-black dark:[&::-webkit-scrollbar-thumb]:bg-ilyes">
                        {filteredData.length > 0 ? (
                            filteredData.map((item, index) => (
                                <li
                                    key={index}
                                    className="px-4 py-2 transition duration-300 cursor-pointer text-slate-800 dark:text-slate-300 hover:bg-ilyes dark:hover:text-black hover:text-black  flex gap-1"
                                    onClick={() => {
                                        onChange(item.id); // When an option is selected, pass the id
                                        setIsOpen(false); // Close the dropdown
                                    }}
                                >
                                    {/* Dynamically display item based on columns */}
                                    {columns.map((column, colIndex) => (
                                        <span className="uppercase text-sm font-semibold" key={colIndex}>
                                            {item[column]}
                                        </span>
                                    ))}
                                </li>
                            ))
                        ) : (
                            <li className="px-4 py-2 text-gray-500">No results found</li>
                        )}
                    </ul>
                </div>
            )}
        </div>
    );
};

export default SearchableSelect;
