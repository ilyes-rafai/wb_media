import ButtonCircle from "@/Components/ButtonCircle";
import Checkbox from "@/Components/Checkbox";
import Code from "@/Components/Code";
import { Free } from "@/Components/Free";
import Modal from "@/Components/Modal";
import { Premium } from "@/Components/Premium";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { useForm } from "@inertiajs/react";
import React, { useState } from "react";
import HandlePremium from "./HandlePremium";

export const InstructionCard = ({ instruction }) => {
    const { delete: destroy, processing } = useForm();

    function submit(e) {
        e.preventDefault();
        destroy(route("instructions.destroy", { id: instruction.id }));
    }

    const [confirmingInstructionDeletion, setConfirmingInstructionDeletion] = useState(false);

    const confirmInstructionDeletion = () => {
        setConfirmingInstructionDeletion(true);
    };
    const closeModal = () => {
        setConfirmingInstructionDeletion(false);
    };

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
                <div className="mb-1 flex items-center gap-3">
                    <ButtonCircle icon="trash" action={confirmInstructionDeletion} />
                    <h3 className="text-2xl font-normal leading-tight dark:text-slate-600 text-slate-400">
                        {instruction.title}
                    </h3>
                    <div className="flex items-center">
                        <HandlePremium instruction={instruction} />
                        {instruction.premium == 1 ? <Premium /> : <Free />}
                    </div>
                </div>

                {/* Description */}
                {instruction.description && (
                    <p className="mt-6 dark:text-slate-400 text-slate-600 whitespace-pre-line">
                        {instruction.description}
                    </p>
                )}

                {/* Code */}
                {instruction.code && (
                    <p className="rounded-lg mt-6 p-6 border border-slate-200 dark:border-slate-800">
                        <div className="flex justify-between items-center mb-6">
                            <span className="uppercase dark:text-slate-500 text-slate-500">
                                {instruction.language && instruction.language}
                            </span>
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
                    </p>
                )}
            </div>

            <Modal show={confirmingInstructionDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-slate-500 dark:text-slate-500">
                        Are you sure you want to delete the{" "}
                        <span className="text-slate-700 dark:text-slate-300">{instruction.title}</span> instruction?
                    </h2>

                    <div className="mt-6 flex gap-6 justify-center">
                        <SecondaryButton onClick={closeModal}>
                            <i className="fa-solid fa-times me-2"></i>
                            Cancel
                        </SecondaryButton>

                        <PrimaryButton type="submit" className="flex items-center gap-2">
                            {processing ? (
                                <>
                                    <i className="fa-solid fa-spinner me-2 animate-spin"></i>
                                    Processing...
                                </>
                            ) : (
                                <>
                                    <i className="fa-solid fa-check me-2"></i> Yes, delete
                                </>
                            )}
                        </PrimaryButton>
                    </div>
                </form>
            </Modal>
        </>
    );
};
