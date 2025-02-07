import ButtonCircle from "@/Components/ButtonCircle";
import { Card } from "@/Components/Card";
import { Free } from "@/Components/Free";
import HandlePremium from "@/Components/HandlePremium";
import Modal from "@/Components/Modal";
import { Premium } from "@/Components/Premium";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { useForm } from "@inertiajs/react";
import React, { useState } from "react";

export const ChapterCard = ({ chapter }) => {
    const { delete: destroy, processing } = useForm();

    function submit(e) {
        e.preventDefault();
        destroy(route("chapters.destroy", { id: chapter.id }));
    }

    const [confirmingChapterDeletion, setConfirmingChapterDeletion] = useState(false);

    const confirmChapterDeletion = () => {
        setConfirmingChapterDeletion(true);
    };
    const closeModal = () => {
        setConfirmingChapterDeletion(false);
    };

    // show less/more logic
    const [showFullDescription, setShowFullDescription] = useState(false);
    const toggleDescription = () => setShowFullDescription((prev) => !prev);
    const truncatedText = (text, length) => (text?.length > length ? text.slice(0, length) + "..." : text);
    const description = chapter.description || "";

    return (
        <>
            <Card>
                <video
                    className="w-full aspect-video mb-6 rounded-lg _border"
                    controls
                    poster={`${import.meta.env.VITE_APP_URL}/${chapter.cover}`}
                >
                    <source src={`${import.meta.env.VITE_APP_URL}/${chapter.episode}`} />
                </video>
                <h3 className="font-medium leading-tight dark:text-slate-200 text-slate-800 mb-3">{chapter.title}</h3>

                {/* Description */}
                {chapter.description && <p className="text-slate-500">{chapter.description}</p>}
                <div className="mb-1 flex items-center justify-between gap-3 mt-3">
                    <div className="flex">
                        <HandlePremium item={chapter} actionRoute="handleChapterPremium" />
                        <span>{chapter.premium == 1 ? <Premium /> : <Free />}</span>
                    </div>
                    <ButtonCircle icon="trash" action={confirmChapterDeletion} />
                </div>
            </Card>

            <Modal show={confirmingChapterDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-slate-500 dark:text-slate-500">
                        Are you sure you want to delete the{" "}
                        <span className="text-slate-700 dark:text-slate-300">{chapter.title}</span> chapter?
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
