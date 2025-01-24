import ButtonCircle from "@/Components/ButtonCircle";
import { Card } from "@/Components/Card";
import DangerButton from "@/Components/DangerButton";
import Modal from "@/Components/Modal";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { Link, useForm } from "@inertiajs/react";
import React, { useState } from "react";

function TopicCard({ topic }) {
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
        <Card key={topic.id}>
            <div className="flex md:items-center flex-col md:flex-row gap-3">
                {/* icon
                <div className="bg-clip-text text-transparent bg-gradient-to-t dark:from-zinc-950 dark:to-ilyes from-zinc-100 to-ilyes text-6xl">
                    <i className={topic.svg}></i>
                </div> */}

                <div className="w-16 aspect-square">
                    <img
                        className="w-full aspect-square object-contain"
                        src={`${import.meta.env.VITE_APP_URL}/${topic.svg}`}
                        alt={topic.name}
                    />
                </div>

                {/* name & description */}
                <div className="">
                    <h4 className="dark:text-zinc-300 text-zinc-600 font-semibold text-lg">{topic.name}</h4>
                    <p className="dark:text-zinc-500 text-zinc-400">{topic.description}</p>
                    <p className="dark:text-zinc-500 text-zinc-400 text-xs font-semibold">
                        Total projects {topic.projects_count}
                    </p>
                </div>
            </div>
            <div className="mt-6 flex justify-between items-center">
                <div className="flex flex-col gap-1">
                    <span className="text-xs font-bold dark:text-zinc-400 text-zinc-700 text-zinc-40">
                        @{topic.user.username}
                    </span>
                    <span className="text-xs font-semibold text-zinc-500 text-zinc-40">
                        {new Date(topic.created_at)
                            .toLocaleDateString("en-GB", {
                                day: "2-digit",
                                month: "short",
                                year: "2-digit",
                            })
                            .toUpperCase()}
                    </span>
                </div>
                <div className="flex justify-end gap-3">
                    <Link
                        className={`text-zinc-500 dark:text-zinc-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-zinc-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-zinc-900 bg-white`}
                        href={route("topics.edit", topic)}
                    >
                        <i className="fa-solid fa-pen"></i>
                    </Link>

                    <ButtonCircle icon="trash" action={confirmTopicDeletion} />
                </div>
            </div>

            <Modal show={confirmingTopicDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-zinc-500 dark:text-zinc-500">
                        Are you sure you want to delete the{" "}
                        <span className="text-zinc-700 dark:text-zinc-300">{topic.name}</span> topic?
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
        </Card>
    );
}

export default TopicCard;
