import React from "react";

function Select({ value, onChange, label, isRequired, onError, data }) {
    return (
        <div className="mb-1">
            <label
                htmlFor={label}
                className="capitalize block mb-2 text-sm font-semibold text-slate-700 dark:text-slate-400"
            >
                {label} {isRequired ? <span className="text-rose-500">*</span> : ""}
            </label>

            <select
                id={label}
                className={`font-semibold bg-white border text-slate-700 dark:text-slate-300 placeholder-slate-500 text-sm rounded-lg block w-full p-2.5 dark:bg-slate-900 ${
                    onError
                        ? "border-rose-500 focus:ring-rose-500 focus:border-rose-500"
                        : "dark:border-slate-800 border-slate-300 focus:ring-ilyes focus:border-ilyes"
                }`}
                value={value}
                onChange={onChange}
            >
                <option value="">{label}</option>
                {data &&
                    data.map((item) => (
                        <option key={item.id} value={item.id}>
                            {item.name}
                        </option>
                    ))}
            </select>
        </div>
    );
}

export default Select;
