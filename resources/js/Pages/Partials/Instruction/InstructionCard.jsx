import ButtonCircle from "@/Components/ButtonCircle";
import Modal from "@/Components/Modal";
import { Premium } from "@/Components/Premium";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { useForm } from "@inertiajs/react";
import React, { useState } from "react";

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

    // show less/more logic
    const [showFullCode, setShowFullCode] = useState(false);
    const toggleCode = () => setShowFullCode((prev) => !prev);
    const truncatedText = (text, length) => (text?.length > length ? text.slice(0, length) + "..." : text);
    const code = instruction.code || ""; // Provide a default empty string

    return (
        <>
            <div className="border-b last:border-0 border-zinc-200 dark:border-zinc-800 pb-6 last:pb-0">
                <div className="mb-1 flex items-center gap-3">
                    <ButtonCircle icon="trash" action={confirmInstructionDeletion} />
                    <h3 className="text-2xl font-normal leading-tight dark:text-zinc-600 text-zinc-400">
                        {instruction.title}
                    </h3>
                    <span>{instruction.premium == 1 ? <Premium /> : ""}</span>
                </div>

                {/* Description */}
                {instruction.description && (
                    <p className="mb-6 dark:text-zinc-400 text-zinc-600 whitespace-pre-line">
                        {instruction.description}
                    </p>
                )}

                {/* Code */}
                {instruction.code && (
                    <pre className="dark:text-zinc-200 text-zinc-800">
                        <strong>
                            {showFullCode ? code : truncatedText(code, 100)}
                            {code.length > 100 && (
                                <button onClick={toggleCode} className="ml-2 text-ilyes hover:underline">
                                    {showFullCode ? "Show Less" : "Show More"}
                                </button>
                            )}
                        </strong>
                    </pre>
                )}
            </div>

            <Modal show={confirmingInstructionDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-zinc-500 dark:text-zinc-500">
                        Are you sure you want to delete the{" "}
                        <span className="text-zinc-700 dark:text-zinc-300">{instruction.title}</span> instruction?
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
