import Avatar from "@/Components/Avatar";
import AvatarInconu from "@/Components/AvatarInconu";
import ButtonCircle from "@/Components/ButtonCircle";
import { Card } from "@/Components/Card";
import DangerButton from "@/Components/DangerButton";
import Modal from "@/Components/Modal";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { Link, useForm } from "@inertiajs/react";
import React, { useState } from "react";

function Usercard({ user }) {
    const { delete: destroy, processing } = useForm();

    function submit(e) {
        e.preventDefault();
        destroy(route("users.destroy", { id: user.id }));
    }

    const [confirmingUserDeletion, setConfirmingUserDeletion] = useState(false);

    const confirmUserDeletion = () => {
        setConfirmingUserDeletion(true);
    };
    const closeModal = () => {
        setConfirmingUserDeletion(false);
    };

    return (
        <Card key={user.id}>
            {/* gender */}
            <span title="User gender" className="absolute top-4 right-4 text-xl">
                {user.gender ? (
                    <i className="fa-solid fa-venus text-pink-500"></i>
                ) : (
                    <i className="fa-solid fa-mars text-blue-500"></i>
                )}
            </span>

            {/* avatar + fullname & username */}
            <div className="flex md:items-center flex-col md:flex-row gap-3">
                {/* avatar */}
                {user.avatar ? (
                    <Avatar src={user.avatar} alt={user.username} width={80} height={80} />
                ) : (
                    <AvatarInconu user={user} width={16} height={16} size={4} />
                )}

                {/* fullname & username */}
                <div className="">
                    <h4
                        className="dark:text-zinc-300 text-zinc-600 font-semibold text-lg flex items-center"
                        title="Fullname"
                    >
                        {user.fullname}
                        <small className="ms-1" title="Verified">
                            {user.verified ? (
                                <svg
                                    className="inline w-4 fill-ilyes"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            ) : (
                                ""
                            )}
                        </small>
                    </h4>
                    <p className="dark:text-zinc-500 text-zinc-400 text-sm" title="Username">
                        @{user.username}
                    </p>
                    <p className="dark:text-zinc-500 text-zinc-400 text-sm" title="User email">
                        {user.email}
                    </p>
                </div>
            </div>

            {/* roles */}
            {user.roles && user.roles.length > 0 && (
                <div title="User roles" className="flex flex-wrap gap-3 mt-3">
                    <p className="text-ilyes font-semibold px-2 text-sm">
                        {user.roles.map((role) => role.name.toUpperCase()).join(", ")}
                    </p>
                </div>
            )}

            {/* stats count */}
            <div className="mt-3 flex gap-2">
                <p className="dark:text-zinc-500 text-zinc-400 text-xs font-semibold" title="Total topics">
                    <i className="fa-solid fa-book"></i> ({user.topics_count})
                </p>
                <p className="dark:text-zinc-500 text-zinc-400 text-xs font-semibold" title="Total projects">
                    <i className="fa-solid fa-boxes-stacked"></i> ({user.projects_count})
                </p>
            </div>

            {/* timestamp + actions */}
            <div className="mt-6 flex justify-between items-center">
                {/* timestamp */}
                <div className="flex flex-col gap-1">
                    <span className="text-xs font-semibold text-zinc-500 text-zinc-40" title="Created at">
                        {new Date(user.created_at)
                            .toLocaleDateString("en-GB", {
                                day: "2-digit",
                                month: "short",
                                year: "2-digit",
                            })
                            .toUpperCase()}
                    </span>
                </div>

                {/* actions */}
                <div className="flex justify-end gap-3">
                    <Link
                        title="Update user avatar"
                        className={`text-zinc-500 dark:text-zinc-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-zinc-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-zinc-900 bg-white`}
                        href={route("users.edit_avatar", user)}
                    >
                        <i className="fa-solid fa-image"></i>
                    </Link>

                    <Link
                        title="Update user password"
                        className={`text-zinc-500 dark:text-zinc-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-zinc-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-zinc-900 bg-white`}
                        href={route("users.edit_password", user)}
                    >
                        <i className="fa-solid fa-key"></i>
                    </Link>

                    <Link
                        title="Update user information"
                        className={`text-zinc-500 dark:text-zinc-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-zinc-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-zinc-900 bg-white`}
                        href={route("users.edit", user)}
                    >
                        <i className="fa-solid fa-pen"></i>
                    </Link>

                    <ButtonCircle title="Delete user" icon="trash" action={confirmUserDeletion} />
                </div>
            </div>

            {/* delete user modal */}
            <Modal show={confirmingUserDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-zinc-500 dark:text-zinc-500">
                        Are you sure you want to delete{" "}
                        <span className="text-zinc-700 dark:text-zinc-300">@{user.username}</span>?
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

export default Usercard;
