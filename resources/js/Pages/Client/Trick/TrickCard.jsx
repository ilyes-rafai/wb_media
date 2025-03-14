import Avatar from "@/Components/Avatar";
import AvatarInconu from "@/Components/AvatarInconu";
import { Card } from "@/Components/Card";
import FormatDate from "@/Components/FormatDate";
import { Free } from "@/Components/Free";
import Locked from "@/Components/Locked";
import NavLink from "@/Components/NavLink";
import { Premium } from "@/Components/Premium";
import { TranslationContext } from "@/contexts/TranslationProvider";
import { usePage } from "@inertiajs/react";
import React, { useContext } from "react";

function TrickCard({ trick }) {
    const abilities = usePage().props.auth.abilities;

    const { translations } = useContext(TranslationContext);
    let lang = localStorage.getItem("lang") || "en";
    let title =
        lang === "fr"
            ? trick.title_fr
            : lang === "ar"
            ? trick.title_ar
            : trick.title_en;
    
    return (
        <Card key={trick.id}>
            {trick.premium ? <Premium /> : <Free />}

            {/* title */}
            <h4 className="text-balance dark:text-slate-300 text-slate-800 text-lg dark:font-medium font-semibold break-words mb-3 group-hover:text-red-500">
                {title}
            </h4>

            {/* topics */}
            <div className="mb-6 mt-3 flex flex-wrap gap-3">
                {trick.topics &&
                    trick.topics.map((topic, index) => (
                        <div key={index} title={topic.name}>
                            <div className="w-6 aspect-square rounded-full">
                                <img
                                    className="w-full aspect-square object-contain"
                                    src={`${import.meta.env.VITE_APP_URL}/${
                                        topic.svg
                                    }`}
                                    alt={topic.name}
                                />
                            </div>
                        </div>
                    ))}
            </div>

            <div className="flex justify-end">
                {trick.premium ? (
                    abilities.is_admin_or_subscriber_or_mentor ? (
                        <NavLink href={route("trickShow", trick)}>
                            {translations.see_this_trick}
                            <span className="rtl:hidden">
                                <i className="fa-solid fa-arrow-right-long ms-2 text-sm"></i>
                            </span>
                            <span className="ltr:hidden">
                                <i className="fa-solid fa-arrow-left-long ms-2 text-sm"></i>
                            </span>
                        </NavLink>
                    ) : (
                        <Locked />
                    )
                ) : (
                    <NavLink href={route("trickShow", trick)}>
                        {translations.see_this_trick}
                        <span className="rtl:hidden">
                            <i className="fa-solid fa-arrow-right-long ms-2 text-sm"></i>
                        </span>
                        <span className="ltr:hidden">
                            <i className="fa-solid fa-arrow-left-long ms-2 text-sm"></i>
                        </span>
                    </NavLink>
                )}
            </div>

            {/* user */}
            <div className="flex md:items-center gap-3">
                {/* avatar */}
                {trick.user.avatar ? (
                    <Avatar
                        src={trick.user.avatar}
                        alt={trick.user.username}
                        width={10}
                        height={10}
                    />
                ) : (
                    <AvatarInconu
                        user={trick.user}
                        width={10}
                        height={10}
                        size={2}
                    />
                )}
                {/* <div className="rounded-full p-[2px] w-10 h-10">
                    </div> */}

                <div className="">
                    <h4
                        className="dark:text-slate-400 text-slate-600 font-semibold text-base flex items-center"
                        title="Fullname"
                    >
                        {trick.user.fullname}
                        <small className="ms-1" title="Verified">
                            {trick.user.verified ? (
                                <svg
                                    className="inline w-4 fill-ilyes"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                >
                                    <path
                                        fillRule="evenodd"
                                        d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clipRule="evenodd"
                                    />
                                </svg>
                            ) : (
                                ""
                            )}
                        </small>
                    </h4>

                    <div className="flex gap-2">
                        <FormatDate wantedDate={trick.created_at} />
                    </div>
                </div>
            </div>
        </Card>
    );
}

export default TrickCard;
