import ButtonCircle from "@/Components/ButtonCircle";
import { Card } from "@/Components/Card";
import DangerButton from "@/Components/DangerButton";
import Modal from "@/Components/Modal";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TableData from "@/Components/TableData";
import { Link, useForm } from "@inertiajs/react";
import React, { useState } from "react";

function TopicData({ topic }) {
    const { delete: destroy, processing } = useForm();

    function submit(e) {
        e.preventDefault();
        destroy(route("topics.destroy", { id: topic.id }));
    }

    const [confirmingTopicDeletion, setConfirmingTopicDeletion] = useState(false);

    const confirmTopicDeletion = () => {
        setConfirmingTopicDeletion(true);
    };
    const closeModal = () => {
        setConfirmingTopicDeletion(false);
    };

    return (
        <>
            <TableData>{topic.name}</TableData>

            <TableData>
                <div className="w-12 aspect-square rounded-full">
                    <img
                        className="w-full aspect-square object-contain"
                        src={`${import.meta.env.VITE_APP_URL}/${topic.svg}`}
                        alt={topic.name}
                    />
                </div>
            </TableData>

            <TableData>{topic.description}</TableData>

            <TableData>{topic.projects_count > 0 ? topic.projects_count : "-"}</TableData>

            <TableData>{topic.courses_count > 0 ? topic.courses_count : "-"}</TableData>

            <TableData>@{topic.user.username}</TableData>

            <TableData>
                {new Date(topic.created_at)
                    .toLocaleDateString("en-GB", {
                        day: "2-digit",
                        month: "short",
                        year: "2-digit",
                    })
                    .toUpperCase()}
            </TableData>
            <TableData>
                <div className="flex gap-3">
                    <Link
                        title="Update topic svg"
                        className={`text-slate-500 dark:text-slate-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-slate-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-slate-900 bg-white`}
                        href={route("topics.edit_svg", topic)}
                    >
                        <i className="fa-solid fa-image"></i>
                    </Link>

                    <Link
                        className={`text-slate-500 dark:text-slate-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-slate-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-slate-900 bg-white`}
                        href={route("topics.edit", topic)}
                    >
                        <i className="fa-solid fa-pen"></i>
                    </Link>

                    <ButtonCircle icon="trash" action={confirmTopicDeletion} />
                </div>
            </TableData>

            <Modal show={confirmingTopicDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-slate-500 dark:text-slate-500">
                        Are you sure you want to delete the{" "}
                        <span className="text-slate-700 dark:text-slate-300">{topic.name}</span> topic?
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

export default TopicData;
