import ButtonCircle from "@/Components/ButtonCircle";
import DangerButton from "@/Components/DangerButton";
import FormatDate from "@/Components/FormatDate";
import HandlePublished from "@/Components/HandlePublished";
import Modal from "@/Components/Modal";
import { NotPublished } from "@/Components/NotPublished";
import PrimaryButton from "@/Components/PrimaryButton";
import { Published } from "@/Components/Published";
import SecondaryButton from "@/Components/SecondaryButton";
import TableData from "@/Components/TableData";
import { Link, useForm } from "@inertiajs/react";
import React, { useState } from "react";

function QuizData({ quiz }) {
    const { delete: destroy, processing } = useForm();

    function submit(e) {
        e.preventDefault();

        destroy(route("quizzes.destroy", { id: quiz.id }), {
            preserveScroll: true,
            onSuccess: () => {
                closeModal();
            },
        });
    }

    const [confirmingQuizDeletion, setConfirmingQuizDeletion] = useState(false);

    const confirmQuizDeletion = () => {
        setConfirmingQuizDeletion(true);
    };
    const closeModal = () => {
        setConfirmingQuizDeletion(false);
    };

    return (
        <>
            <TableData>{quiz.title_en}</TableData>

            <TableData>{quiz.description_en}</TableData>

            <TableData>
                {quiz.difficulty == 1
                    ? "Easy"
                    : quiz.difficulty == 2
                    ? "Medium"
                    : quiz.difficulty == 3
                    ? "Hard"
                    : "Unknown"}{" "}
            </TableData>

            <TableData scope="row">
                <div className="flex flex-wrap gap-3">{quiz.topic.name}</div>
            </TableData>

            <TableData>
                <div className="flex flex-col gap-3">
                    <HandlePublished item={quiz} actionRoute="handleQuizPublished" />
                    {quiz.is_published ? <Published /> : <NotPublished />}
                </div>
            </TableData>

            <TableData>
                <FormatDate wantedDate={quiz.created_at} />
            </TableData>
            <TableData>
                <div className="flex gap-3">
                    <Link
                        className={`text-slate-500 dark:text-slate-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-slate-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-slate-900 bg-white`}
                        href={route("quizzes.edit_questions_page", quiz)}
                    >
                        <i className="fa-solid fa-question"></i>
                    </Link>

                    <Link
                        className={`text-slate-500 dark:text-slate-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-slate-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-slate-900 bg-white`}
                        href={route("quizzes.edit", quiz)}
                    >
                        <i className="fa-solid fa-pen"></i>
                    </Link>

                    <ButtonCircle icon="trash" action={confirmQuizDeletion} />
                </div>
            </TableData>
            <Modal show={confirmingQuizDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-slate-500 dark:text-slate-500">
                        Are you sure you want to delete this quiz?
                    </h2>
                    <h2 className="font-medium text-slate-500 dark:text-slate-500">
                        All of this quiz questions will also be deleted
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

export default QuizData;
