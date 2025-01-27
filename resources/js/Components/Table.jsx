import React from "react";

function Table({ children }) {
    return (
        <div className="relative overflow-x-auto">
            <table className="w-full text-sm text-left rtl:text-right text-slate-500 dark:text-slate-400">
                {children}
            </table>
        </div>
    );
}

export default Table;
