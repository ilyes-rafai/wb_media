import React from "react";

function SectionHeader({ title, span, className }) {
    return (
        <div
            className={
                `dark:text-slate-200 text-slate-800 font-extrabold text-balance text-4xl sm:text-6xl tracking-tight mb-12 ` +
                className
            }
        >
            {title}
            <span className="text-ilyes">{span}</span>
        </div>
    );
}

export default SectionHeader;
