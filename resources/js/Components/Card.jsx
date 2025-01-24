import React from "react";

export const Card = ({ children }) => {
    return (
        <div className="p-6 relative bg-gradient-to-br from-white via-white to-green-100 dark:from-zinc-950 dark:to-black rounded-lg border border-zinc-200 dark:border-zinc-900 hover:border-ilyes dark:hover:border-ilyes trasition duration-300">
            {children}
        </div>
    );
};
