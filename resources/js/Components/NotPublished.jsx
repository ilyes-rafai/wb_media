import React from "react";

export const NotPublished = () => {
    return (
        <span
            title="Not Published"
            className="text-amber-500 bg-amber-200 dark:text-amber-500 dark:bg-amber-950 font-medium px-2 text-xs whitespace-nowrap tracking-wide capitalize rounded-full"
        >
            <i className="fa-solid fa-times me-1.5"></i>
            Not Published
        </span>
    );
};
