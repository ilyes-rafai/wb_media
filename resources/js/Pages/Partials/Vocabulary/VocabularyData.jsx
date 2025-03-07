import ButtonCircle from "@/Components/ButtonCircle";
import DangerButton from "@/Components/DangerButton";
import FormatDate from "@/Components/FormatDate";
import { Free } from "@/Components/Free";
import HandlePremium from "@/Components/HandlePremium";
import Modal from "@/Components/Modal";
import { Premium } from "@/Components/Premium";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TableData from "@/Components/TableData";
import { Link, useForm } from "@inertiajs/react";
import React, { useState } from "react";

function VocabularyData({ vocabulary }) {
    const { delete: destroy, processing } = useForm();

    function submit(e) {
        e.preventDefault();
        destroy(route("vocabularies.destroy", { id: vocabulary.id }));
    }

    const [confirmingVocabularyDeletion, setConfirmingVocabularyDeletion] = useState(false);

    const confirmVocabularyDeletion = () => {
        setConfirmingVocabularyDeletion(true);
    };
    const closeModal = () => {
        setConfirmingVocabularyDeletion(false);
    };

    return (
        <>
            <TableData>{vocabulary.term}</TableData>

            <TableData>{vocabulary.is_from_client ? "Yes" : "No"}</TableData>

            <TableData>
                <FormatDate wantedDate={vocabulary.created_at} />
            </TableData>

            <TableData>
                <div className="flex gap-3">
                    <Link
                        className={`text-slate-500 dark:text-slate-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-slate-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-slate-900 bg-white`}
                        href={route("vocabularies.edit", vocabulary)}
                    >
                        <i className="fa-solid fa-pen"></i>
                    </Link>

                    <ButtonCircle icon="trash" action={confirmVocabularyDeletion} />
                </div>
            </TableData>

            <Modal show={confirmingVocabularyDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-slate-500 dark:text-slate-500">
                        Are you sure you want to delete this vocabulary?
                    </h2>
                    <h2 className="font-medium text-slate-500 dark:text-slate-500">
                        All of this vocabulary instructions will also be deleted
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
}

export default VocabularyData;
