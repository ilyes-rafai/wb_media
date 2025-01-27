import ButtonCircle from "@/Components/ButtonCircle";
import DangerButton from "@/Components/DangerButton";
import { Free } from "@/Components/Free";
import Modal from "@/Components/Modal";
import { Premium } from "@/Components/Premium";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TableData from "@/Components/TableData";
import { Link, useForm } from "@inertiajs/react";
import React, { useState } from "react";

function ProjectData({ project }) {
    const { delete: destroy, processing } = useForm();

    function submit(e) {
        e.preventDefault();
        destroy(route("projects.destroy", { id: project.id }));
    }

    const [confirmingProjectDeletion, setConfirmingProjectDeletion] = useState(false);

    const confirmProjectDeletion = () => {
        setConfirmingProjectDeletion(true);
    };
    const closeModal = () => {
        setConfirmingProjectDeletion(false);
    };

    return (
        <>
            <TableData>{project.title}</TableData>
            <TableData>{project.instructions_count}</TableData>
            <TableData scope="row">
                <div className="flex flex-wrap gap-3">
                    {project.topics.map((topic, index) => (
                        <div className="border dark:border-slate-800 px-2 rounded-full" key={index}>
                            <span className="">{topic.name}</span>
                        </div>
                    ))}
                </div>
            </TableData>
            <TableData>{project.premium ? <Premium /> : <Free />}</TableData>
            <TableData>@{project.user.username}</TableData>
            <TableData>
                <span className="whitespace-nowrap">
                    {new Date(project.created_at)
                        .toLocaleDateString("en-GB", {
                            day: "2-digit",
                            month: "short",
                            year: "2-digit",
                        })
                        .toUpperCase()}
                </span>
            </TableData>
            <TableData>
                <div className="flex gap-3">
                    <Link
                        className={`text-slate-500 dark:text-slate-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-slate-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-slate-900 bg-white`}
                        href={route("projects.edit_instructions_page", project)}
                    >
                        <i className="fa-solid fa-lightbulb"></i>
                    </Link>

                    <Link
                        className={`text-slate-500 dark:text-slate-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-slate-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-slate-900 bg-white`}
                        href={route("projects.edit", project)}
                    >
                        <i className="fa-solid fa-pen"></i>
                    </Link>

                    <ButtonCircle icon="trash" action={confirmProjectDeletion} />
                </div>
            </TableData>

            <Modal show={confirmingProjectDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-slate-500 dark:text-slate-500">
                        Are you sure you want to delete this project?
                    </h2>
                    <h2 className="font-medium text-slate-500 dark:text-slate-500">
                        All of this project instructions will also be deleted
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

export default ProjectData;
