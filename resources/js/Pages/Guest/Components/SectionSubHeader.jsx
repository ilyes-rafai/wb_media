import React from "react";

function SectionSubHeader({ children, className }) {
    return (
        <div
            className={
                `dark:text-slate-400 text-slate-600 text-balance text-lg sm:text-xl tracking-tight mb-12 ` + className
            }
        >
            {children}
        </div>
    );
}

export default SectionSubHeader;
