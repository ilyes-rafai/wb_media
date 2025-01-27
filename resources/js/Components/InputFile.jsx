import React from "react";

function InputFile({ ...props }) {
    return (
        <input
            {...props}
            type="file"
            className={`block w-full text-sm text-slate-700 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-ilyes/10 dark:file:bg-slate-900 hover:file:bg-ilyes/20 cursor-pointer dark:file:text-slate-500`}
        />
    );
}

export default InputFile;
