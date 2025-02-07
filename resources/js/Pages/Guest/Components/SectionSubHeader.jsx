import React from "react";

function SectionSubHeader({ children, className }) {
    return (
        <div className={`dark:text-slate-400 text-slate-500 text-balance sm:text-lg tracking-tight mb-12 ` + className}>
            {children}
        </div>
    );
}

export default SectionSubHeader;
