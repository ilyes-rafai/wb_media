import React from "react";

function TitleSection({ title, data, className }) {
    return (
        <div className="flex items-center gap-3">
            <h1
                className={
                    `text-2xl sm:text-4xl font-bold leading-tight dark:text-slate-300 text-slate-800 ` + className
                }
            >
                {title}
            </h1>
            {data && (
                <h2 className="text-xl font-bold leading-tight dark:text-slate-400 text-slate-600">
                    Total : <span className="dark:text-slate-300 text-slate-800">{data.length}</span>
                </h2>
            )}
        </div>
    );
}

export default TitleSection;
