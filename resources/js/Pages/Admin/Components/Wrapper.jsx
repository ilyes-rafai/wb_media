import React from "react";

function Wrapper({ children }) {
    return <div className="p-3 sm:p-6 rounded-lg border border-slate-200 dark:border-slate-800 w-full">{children}</div>;
}

export default Wrapper;
