import ButtonCircle from "@/Components/ButtonCircle";
import DangerButton from "@/Components/DangerButton";
import Modal from "@/Components/Modal";
import { Premium } from "@/Components/Premium";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
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
            {/* <tr key={project.id} className="odd:bg-white odd:dark:bg-zinc-900 even:bg-zinc-100 even:dark:bg-zinc-800"> */}
            <tr key={project.id} className="border dark:border-zinc-800">
                <th scope="row" className="px-6 py-4 font-medium text-zinc-900 whitespace-nowrap dark:text-white">
                    {project.title}
                </th>
                <td className="px-6 py-4">{project.instructions_count}</td>
                <td scope="row" className="px-6 py-4">
                    <div className="flex flex-wrap gap-3">
                        {project.topics.map((topic, index) => (
                            <div className="border dark:border-zinc-800 px-2 rounded-full" key={index}>
                                <span className="">{topic.name}</span>
                            </div>
                        ))}
                    </div>
                </td>
                <td className="px-6 py-4">{project.premium ? <Premium /> : ""}</td>
                <td className="px-6 py-4">@{project.user.username}</td>
                <td className="px-6 py-4">
                    <span className="whitespace-nowrap">
                        {new Date(project.created_at)
                            .toLocaleDateString("en-GB", {
                                day: "2-digit",
                                month: "short",
                                year: "2-digit",
                            })
                            .toUpperCase()}
                    </span>
                </td>
                <td className="px-6 py-4">
                    <div className="flex gap-3">
                        <Link
                            className={`text-zinc-500 dark:text-zinc-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-zinc-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-zinc-900 bg-white`}
                            href={route("projects.edit_instructions_page", project)}
                        >
                            <i className="fa-solid fa-lightbulb"></i>
                        </Link>

                        <Link
                            className={`text-zinc-500 dark:text-zinc-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-zinc-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-zinc-900 bg-white`}
                            href={route("projects.edit", project)}
                        >
                            <i className="fa-solid fa-pen"></i>
                        </Link>

                        <ButtonCircle icon="trash" action={confirmProjectDeletion} />
                    </div>
                </td>
            </tr>

            <Modal show={confirmingProjectDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-zinc-500 dark:text-zinc-500">
                        Are you sure you want to delete this project?
                    </h2>
                    <h2 className="font-medium text-zinc-500 dark:text-zinc-500">
                        All of this project posts will also be deleted
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
