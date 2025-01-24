import React from "react";

function TitleSection({ title, data }) {
    return (
        <div className="flex items-center gap-3">
            <h1 className="text-4xl font-bold leading-tight dark:text-zinc-300 text-zinc-800">{title}</h1>
            {data && (
                <h2 className="text-xl font-bold leading-tight dark:text-zinc-400 text-zinc-600">
                    Total : <span className="dark:text-zinc-300 text-zinc-800">{data.length}</span>
                </h2>
            )}
        </div>
    );
}

export default TitleSection;
