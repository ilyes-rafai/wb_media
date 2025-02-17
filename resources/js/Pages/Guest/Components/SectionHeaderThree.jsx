import React from "react";

function SectionHeaderThree({ title, span, className }) {
    return (
        <div
            className={
                `dark:text-slate-200 text-slate-900 font-extrabold text-balance text-xl sm:text-3xl tracking-tight mb-12 ` +
                className
            }
        >
            {title}
            <span className="text-ilyes">{span}</span>
        </div>
    );
}

export default SectionHeaderThree;
