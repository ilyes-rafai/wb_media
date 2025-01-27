import React from "react";

function Wrapper({ children }) {
    return (
        <div className="p-3 sm:p-6 rounded-lg border border-slate-200 dark:border-slate-800 max-w-screen-lg mx-auto max-h-[40vh] md:max-h-[70vh] overflow-y-auto [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-white [&::-webkit-scrollbar-thumb]:bg-ilyes dark:[&::-webkit-scrollbar-track]:bg-slate-800 dark:[&::-webkit-scrollbar-thumb]:bg-ilyes w-full">
            {children}
        </div>
    );
}

export default Wrapper;
