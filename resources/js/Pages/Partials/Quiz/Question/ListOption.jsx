import React from "react";
import HandleCorrectOption from "./HandleCorrectOption";

function ListOption({ options }) {
    return (
        <div>
            {options &&
                options.map((option, index) => (
                    <p key={index} className="text-slate-500 flex gap-1 mb-3 last:mb-0">
                        <HandleCorrectOption option={option} />
                        <span className="w-3">{index + 1 + ". "}</span>

                        <span className="text-slate-700 dark:text-slate-300">{option.title}</span>
                    </p>
                ))}
        </div>
    );
}

export default ListOption;
