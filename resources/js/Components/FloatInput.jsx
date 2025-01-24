import React from "react";

function FloatInput({ value, onChange, label, isRequired, onError }) {
    return (
        <div className="mb-1">
            <label
                htmlFor={label}
                className="capitalize block mb-2 text-sm font-semibold text-zinc-700 dark:text-zinc-400"
            >
                {label} {isRequired ? <span className="text-pink-500">*</span> : ""}
            </label>
            <input
                type="text"
                id={label}
                className={`font-semibold bg-white border text-zinc-700 dark:text-zinc-300 placeholder-zinc-500 text-sm rounded-lg block w-full p-2.5 dark:bg-zinc-900 ${
                    onError
                        ? "border-pink-500 focus:ring-pink-500 focus:border-pink-500"
                        : "dark:border-zinc-800 border-zinc-300 focus:ring-ilyes focus:border-ilyes"
                }`}
                placeholder={`Enter ${label}...`}
                value={value}
                onChange={onChange}
            />
        </div>
    );
}

export default FloatInput;
