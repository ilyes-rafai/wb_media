import ButtonCircle from "@/Components/ButtonCircle";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import Modal from "@/Components/Modal";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TextInput from "@/Components/TextInput";
import { useForm } from "@inertiajs/react";
import React, { useState } from "react";
import AddOption from "./AddOption";
import ListOption from "./ListOption";

export const QuestionCard = ({ question }) => {
    const { delete: destroy, processing } = useForm();

    function submit(e) {
        e.preventDefault();
        destroy(route("questions.destroy", { id: question.id }), {
            preserveScroll: true,
        });
    }

    const [confirmingQuestionDeletion, setConfirmingQuestionDeletion] = useState(false);

    const confirmQuestionDeletion = () => {
        setConfirmingQuestionDeletion(true);
    };
    const closeModal = () => {
        setConfirmingQuestionDeletion(false);
    };

    // State for modal visibility
    const [isFormAddOptionOpen, setIsFormAddOptionOpen] = useState(false);

    // Open modal form
    const openFormAddOption = () => {
        setIsFormAddOptionOpen(true);
    };

    // Close modal form and reset data
    const closeFormAddOption = () => {
        setIsFormAddOptionOpen(false); // Close the form modal
    };

    return (
        <>
            <div className="p-3 sm:p-6 rounded-lg _border">
                <div className="flex items-center gap-3 mb-6">
                    <ButtonCircle icon="trash" action={confirmQuestionDeletion} />
                    <h3 className="text-2xl font-normal leading-tight dark:text-slate-600 text-slate-400">
                        {question.title}
                    </h3>
                    <ButtonCircle icon="plus" action={openFormAddOption} />
                </div>

                {isFormAddOptionOpen && (
                    <div className="p-3 sm:p-6 rounded-lg _border">
                        <div className="flex justify-between items-center mb-6">
                            <h2 className="text-xl font-bold leading-tight dark:text-slate-400 text-slate-600 flex gap-2">
                                Add new <span className="dark:text-slate-200 text-slate-600">Option</span>
                                to <span className="dark:text-slate-200 text-slate-600">{question.title}</span>
                            </h2>
                            <ButtonCircle icon="times" action={closeFormAddOption} />
                        </div>
                        <AddOption question={question} />
                    </div>
                )}

                <div className="mt-6">
                    <ListOption options={question.options} />
                </div>
            </div>

            <Modal show={confirmingQuestionDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-slate-500 dark:text-slate-500">
                        Are you sure you want to delete{" "}
                        <span className="text-slate-700 dark:text-slate-300">{question.title}</span> ?
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
