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

function PostCard({ post }) {
    const { delete: destroy, processing } = useForm();

    function submit(e) {
        e.preventDefault();
        destroy(route("posts.destroy", { id: post.id }));
    }

    const [confirmingPostDeletion, setConfirmingPostDeletion] = useState(false);

    const confirmPostDeletion = () => {
        setConfirmingPostDeletion(true);
    };
    const closeModal = () => {
        setConfirmingPostDeletion(false);
    };

    return (
        <Card key={post.id}>
            <div className="">
                <div className="flex md:items-center gap-3">
                    {/* avatar */}
                    {post.user.avatar ? (
                        <Avatar src={post.user.avatar} alt={post.user.username} width={40} height={40} />
                    ) : (
                        <AvatarInconu user={post.user} width={10} height={10} size={2} />
                    )}
                    {/* <div className="rounded-full p-[2px] w-10 h-10">
                    </div> */}

                    <div className="">
                        <h4
                            className="dark:text-zinc-400 text-zinc-600 font-semibold text-base flex items-center"
                            title="Fullname"
                        >
                            {post.user.fullname}
                            <small className="ms-1" title="Verified">
                                {post.user.verified ? (
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

                        <div className="flex gap-2">
                            <span className="text-xs font-semibold text-zinc-500 text-zinc-40">
                                {new Date(post.created_at)
                                    .toLocaleDateString("en-GB", {
                                        day: "2-digit",
                                        month: "short",
                                        year: "2-digit",
                                    })
                                    .toUpperCase()}
                            </span>
                            <span className="text-xs font-semibold text-zinc-500 text-zinc-40">
                                {new Date(post.created_at).toLocaleTimeString("en-GB", {
                                    hour: "2-digit",
                                    minute: "2-digit",
                                })}
                            </span>
                        </div>
                    </div>
                </div>

                {/* body */}
                <div className="mt-4">
                    <h4 className="dark:text-zinc-300 text-zinc-600 font-semibold break-words">{post.body}</h4>
                </div>
            </div>
            <div className="mt-4">
                <div className="flex gap-4">
                    <div title="Comments">
                        <Link
                            className={`text-zinc-500 dark:text-zinc-400 hover:text-zinc-400 dark:hover:text-zinc-300 flex items-center justify-center transition duration-300 text-sm cursor-pointer`}
                            href={route("posts.edit", post)}
                        >
                            <span className="me-1">
                                <i className="fa-solid fa-comments"></i>
                            </span>
                            <small className="">(22)</small>
                        </Link>
                    </div>

                    <div title="Like">
                        <Link
                            className={`text-zinc-500 dark:text-zinc-400 hover:text-zinc-400 dark:hover:text-zinc-300 flex items-center justify-center transition duration-300 text-sm cursor-pointer`}
                            href={route("posts.edit", post)}
                        >
                            <span className={`me-1 ${post.id == 1 ? "text-pink-500" : ""}`}>
                                <i className={`${post.id == 1 ? "fa-solid" : "fa-regular"} fa-heart`}></i>
                            </span>

                            <small className="">(37)</small>
                        </Link>
                    </div>
                </div>
            </div>
        </Card>
    );
}

export default PostCard;
