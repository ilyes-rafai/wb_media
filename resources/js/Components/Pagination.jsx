import { Link } from "@inertiajs/react";
import React from "react";

function Pagination({ data }) {
    return (
        <>
            {data.links.map((link) =>
                link.url ? (
                    <Link
                        key={link.label}
                        href={link.url}
                        dangerouslySetInnerHTML={{ __html: link.label }}
                        className={`p-1 mx-1 ${
                            link.active ? "text-ilyes font-bold" : "dark:text-zinc-500 text-zinc-700"
                        }`}
                    />
                ) : (
                    <span
                        key={link.label}
                        dangerouslySetInnerHTML={{ __html: link.label }}
                        className="p-1 mx-1 dark:text-zinc-700 text-zinc-400"
                    ></span>
                )
            )}
        </>
    );
}

export default Pagination;
