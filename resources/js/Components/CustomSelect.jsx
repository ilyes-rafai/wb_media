import React, { useState } from "react";

function CustomSelect({ value, onChange, label, isRequired, onError, data }) {
    const [isOpen, setIsOpen] = useState(false);

    const handleToggle = () => {
        setIsOpen((prev) => !prev);
    };

    const handleSelect = (id) => {
        onChange({ target: { value: id } }); // Simulate the native `onChange` event
        setIsOpen(false);
    };

    return (
        <div className="mb-4 relative">
            {/* Label */}
            <label
                htmlFor={label}
                className="capitalize block mb-2 text-sm font-semibold text-zinc-700 dark:text-zinc-400"
            >
                {label} {isRequired ? <span className="text-pink-500">*</span> : ""}
            </label>

            {/* Select Trigger */}
            <button
                type="button"
                id={label}
                onClick={handleToggle}
                className={`flex items-center justify-between w-full font-semibold bg-white border text-zinc-700 dark:text-zinc-300 placeholder-zinc-500 text-sm rounded-lg p-2.5 dark:bg-zinc-900 ${
                    onError
                        ? "border-pink-500 focus:ring-pink-500 focus:border-pink-500"
                        : "dark:border-zinc-800 border-zinc-300 focus:ring-ilyes focus:border-ilyes"
                }`}
            >
                <span>{data.find((item) => item.id === value)?.name || label}</span>

                <i
                    className={`fa-solid transform transition-transform ${isOpen ? "fa-angle-up" : "fa-angle-down"}`}
                ></i>
            </button>

            {/* Dropdown Menu */}
            {isOpen && (
                <ul
                    className="absolute mt-2 w-full bg-white border border-zinc-300 rounded-lg shadow-md max-h-60 overflow-y-auto dark:bg-zinc-900 dark:border-zinc-800 [&::-webkit-scrollbar]:w-1
                                    [&::-webkit-scrollbar-track]:bg-white
                                    [&::-webkit-scrollbar-thumb]:bg-ilyes
                                    dark:[&::-webkit-scrollbar-track]:bg-zinc-800
                                    dark:[&::-webkit-scrollbar-thumb]:bg-ilyes"
                >
                    {data &&
                        data.map((item) => (
                            <li
                                key={item.id}
                                onClick={() => handleSelect(item.id)}
                                className={`px-4 py-2 font-semibold cursor-pointer text-sm text-zinc-700 dark:text-zinc-300 hover:bg-ilyes hover:text-white ${
                                    item.id === value ? " bg-ilyes/70 text-zinc-900 dark:text-zinc-900" : ""
                                }`}
                            >
                                {item.id === value ? <i class="fa-regular fa-circle-check"></i> : ""}
                                <span className="ms-1">{item.name}</span>
                            </li>
                        ))}
                </ul>
            )}
        </div>
    );
}

export default CustomSelect;
