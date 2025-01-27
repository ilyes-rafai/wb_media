import React from "react";

export const Card = ({ children }) => {
    return (
        <div className="p-6 relative rounded-lg border border-slate-200 dark:border-slate-900 hover:border-ilyes dark:hover:border-ilyes trasition duration-300">
            {children}
        </div>
    );
};
