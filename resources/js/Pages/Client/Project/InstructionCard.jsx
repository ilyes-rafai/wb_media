import Code from "@/Components/Code";
import { Free } from "@/Components/Free";
import Locked from "@/Components/Locked";
import { Premium } from "@/Components/Premium";
import { usePage } from "@inertiajs/react";
import React, { useState } from "react";

export const InstructionCard = ({ instruction }) => {
    const abilities = usePage().props.auth.abilities;

    const [isCopied, setIsCopied] = useState(false); // State to track if the text is copied

    const handleCopy = () => {
        if (instruction.code) {
            navigator.clipboard
                .writeText(instruction.code)
                .then(() => {
                    setIsCopied(true); // Set "Copied" state to true
                    setTimeout(() => setIsCopied(false), 2000); // Revert back after 3 seconds
                })
                .catch((err) => {
                    console.error("Failed to copy: ", err);
                });
        }
    };

    return (
        <>
            <div className="pb-6 last:pb-0">
                <div className="">
                    <h3 className="text-2xl font-normal leading-tight dark:text-slate-400 text-slate-600">
                        {instruction.title}
                    </h3>
                </div>

                {/* Description */}
                {instruction.description && (
                    <p className="mt-3 dark:text-slate-400 text-slate-600 whitespace-pre-line">
                        {instruction.description}
                    </p>
                )}

                {/* Code */}
                {instruction.code && (
                    <p className="rounded-lg mt-6 p-6 border border-slate-200 dark:border-slate-800">
                        {instruction.premium ? (
                            abilities.is_admin_or_subscriber_or_mentor ? (
                                <>
                                    <div className="flex justify-between items-center mb-6">
                                        <div className="mb-1 flex items-center justify-between gap-3 mt-3">
                                            <span>{instruction.premium == 1 ? <Premium /> : <Free />}</span>
                                        </div>
                                        <div
                                            onClick={handleCopy}
                                            className="hover:text-slate-300 text-slate-500 flex items-baseline gap-2 cursor-pointer"
                                        >
                                            {isCopied ? (
                                                <>
                                                    <i className="fa-solid fa-check"></i>
                                                    <span>Copied!</span>
                                                </>
                                            ) : (
                                                <>
                                                    <i className="fa-solid fa-copy"></i>
                                                    <span>Copy</span>
                                                </>
                                            )}
                                        </div>
                                    </div>
                                    <strong>
                                        <Code language={instruction.language}>{instruction.code}</Code>
                                    </strong>
                                </>
                            ) : (
                                <Locked />
                            )
                        ) : (
                            <>
                                <div className="flex justify-between items-center mb-6">
                                    <div className="mb-1 flex items-center justify-between gap-3 mt-3">
                                        <span>{instruction.premium == 1 ? <Premium /> : <Free />}</span>
                                    </div>
                                    <div
                                        onClick={handleCopy}
                                        className="hover:text-slate-300 text-slate-500 flex items-baseline gap-2 cursor-pointer"
                                    >
                                        {isCopied ? (
                                            <>
                                                <i className="fa-solid fa-check"></i>
                                                <span>Copied!</span>
                                            </>
                                        ) : (
                                            <>
                                                <i className="fa-solid fa-copy"></i>
                                                <span>Copy</span>
                                            </>
                                        )}
                                    </div>
                                </div>
                                <strong>
                                    <Code language={instruction.language}>{instruction.code}</Code>
                                </strong>
                            </>
                        )}
                    </p>
                )}
            </div>
        </>
    );
};
