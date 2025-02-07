import NavLink from "@/Components/NavLink";
import { usePage } from "@inertiajs/react";
import React from "react";

function NavbarLinks() {
    const user = usePage().props.auth.user;

    const abilities = usePage().props.auth.abilities;

    return (
        <>
            {user && user ? (
                <>
                    <NavLink href={route("dashboard")} active={route().current("dashboard")}>
                        <i className="fa-solid fa-home me-2 text-lg"></i>
                        Dashboard
                    </NavLink>

                    {abilities.is_admin && (
                        <>
                            <NavLink href={route("users.index")} active={route().current("users.index")}>
                                <i className="fa-solid fa-users me-2 text-lg"></i>
                                {/* Users ! */}
                            </NavLink>

                            <NavLink href={route("topics.index")} active={route().current("topics.index")}>
                                <i className="fa-solid fa-book me-2 text-lg"></i>
                                {/* Topics ! */}
                            </NavLink>

                            <NavLink href={route("posts.index")} active={route().current("posts.index")}>
                                <i className="fa-brands fa-leanpub me-2 text-lg"></i>
                                {/* All posts */}
                            </NavLink>
                        </>
                    )}

                    {abilities.is_admin_or_mentor && (
                        <>
                            <NavLink href={route("tricks.index")} active={route().current("tricks.index")}>
                                <i className="fa-solid fa-code me-2 text-lg"></i>
                                {/* Tricks ! */}
                            </NavLink>

                            <NavLink href={route("courses.index")} active={route().current("courses.index")}>
                                <i className="fa-solid fa-video me-2 text-lg"></i>
                                {/* Courses ! */}
                            </NavLink>
                        </>
                    )}

                    <NavLink href={route("trickList")} active={route().current("trickList")}>
                        <i className="fa-solid fa-code me-2 text-lg"></i>
                        Tricks
                    </NavLink>

                    <NavLink href={route("courseList")} active={route().current("courseList")}>
                        <i className="fa-solid fa-video me-2 text-lg"></i>
                        Courses
                    </NavLink>

                    <NavLink href={route("quizList")} active={route().current("quizList")}>
                        <i className="fa-solid fa-puzzle-piece me-2 text-lg"></i>
                        Quizzes
                    </NavLink>

                    <NavLink href={route("exerciceList")} active={route().current("exerciceList")}>
                        <i className="fa-solid fa-square-root-variable me-2 text-lg"></i>
                        Exercices
                    </NavLink>

                    <NavLink href={route("vocabularyList")} active={route().current("vocabularyList")}>
                        <i className="fa-solid fa-spell-check me-2 text-lg"></i>
                        Vocabulary
                    </NavLink>
                </>
            ) : (
                ""
            )}
        </>
    );
}

export default NavbarLinks;
