import React from "react";

function SectionHeader({ title, span, className, emo }) {
    return (
        <div
            className={
                `dark:text-slate-200 text-slate-900 font-extrabold text-balance text-5xl sm:text-6xl tracking-tight mb-12 ` +
                className
            }
        >
            {title}
            <span className="text-ilyes">{span}</span>
        </div>
    );
}

export default SectionHeader;
