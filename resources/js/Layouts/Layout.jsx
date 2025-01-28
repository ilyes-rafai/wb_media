import ApplicationLogo from "@/Components/ApplicationLogo";
import Avatar from "@/Components/Avatar";
import AvatarInconu from "@/Components/AvatarInconu";
import Blur from "@/Components/Blur";
import Dropdown from "@/Components/Dropdown";
import Mode from "@/Components/Mode";
import NavLink from "@/Components/NavLink";
import ScrollToTop from "@/Components/ScrollToTop";
import Toast from "@/Components/Toast";
import { Link, usePage } from "@inertiajs/react";
import { useEffect, useState } from "react";

export default function Layout({ header, children }) {
    const user = usePage().props.auth.user;
    // const roles = user.roles;

    const abilities = usePage().props.auth.abilities;

    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

    const [isExpanded, setIsExpanded] = useState(false);

    const handleExpandMenu = () => {
        setIsExpanded(!isExpanded);
    };

    const { flash } = usePage().props;

    return (
        <div className="min-h-screen bg-gradient-to-br from-white via-ilyes/5 to-white dark:from-slate-950 dark:via-black dark:to-slate-950">
            <Blur top={32} left={0} />
            <Blur top={0} right={256} />
            <Blur
                size="w-64"
                bgColor="bg-ilyes/20 dark:bg-ilyes/20"
                top={window.innerHeight * 0.3}
                left={window.innerWidth * 0.5}
                extraClasses="-translate-x-1/2 -translate-y-1/2"
            />

            {/* flash messages */}
            {flash?.success && <Toast message={flash.success} type="success" />}
            {flash?.error && <Toast message={flash.error} type="error" />}

            <div className="">
                {/* content */}
                <main className="">
                    <div className="border-b border-slate-200 dark:border-slate-800 py-3">
                        <div className="flex h-full justify-between items-center px-12">
                            <div
                                className="overflow-x-auto overflow-y-hidden flex justify-center items-center gap-6
                                    [&::-webkit-scrollbar]:w-1
                                    [&::-webkit-scrollbar-track]:bg-white
                                    [&::-webkit-scrollbar-thumb]:bg-ilyes
                                    dark:[&::-webkit-scrollbar-track]:bg-slate-800
                                    dark:[&::-webkit-scrollbar-thumb]:bg-ilyes"
                            >
                                <Link href={route("welcome")}>
                                    <ApplicationLogo className="block w-12 fill-current text-ilyes" />
                                </Link>
                                {user && user ? (
                                    <>
                                        <NavLink href={route("dashboard")} active={route().current("dashboard")}>
                                            <i className="fa-solid fa-home me-2 text-lg"></i>
                                            Dashboard
                                        </NavLink>

                                        {abilities.is_admin && (
                                            <>
                                                <NavLink
                                                    href={route("users.index")}
                                                    active={route().current("users.index")}
                                                >
                                                    <i className="fa-solid fa-users me-2 text-lg"></i>
                                                    Users !
                                                </NavLink>

                                                <NavLink
                                                    href={route("topics.index")}
                                                    active={route().current("topics.index")}
                                                >
                                                    <i className="fa-solid fa-book me-2 text-lg"></i>
                                                    Topics !
                                                </NavLink>

                                                <NavLink
                                                    href={route("posts.index")}
                                                    active={route().current("posts.index")}
                                                >
                                                    <i className="fa-brands fa-leanpub me-2 text-lg"></i> All posts
                                                </NavLink>
                                            </>
                                        )}

                                        {abilities.is_admin_or_mentor && (
                                            <>
                                                <NavLink
                                                    href={route("projects.index")}
                                                    active={route().current("projects.index")}
                                                >
                                                    <i className="fa-solid fa-code me-2 text-lg"></i>
                                                    Projects !
                                                </NavLink>

                                                <NavLink
                                                    href={route("courses.index")}
                                                    active={route().current("courses.index")}
                                                >
                                                    <i className="fa-solid fa-video me-2 text-lg"></i>
                                                    Courses !
                                                </NavLink>
                                            </>
                                        )}

                                        <NavLink href={route("projectList")} active={route().current("projectList")}>
                                            <i className="fa-solid fa-code me-2 text-lg"></i>
                                            Projects
                                        </NavLink>

                                        <NavLink href={route("courseList")} active={route().current("courseList")}>
                                            <i className="fa-solid fa-video me-2 text-lg"></i>
                                            Courses
                                        </NavLink>
                                    </>
                                ) : (
                                    ""
                                )}
                            </div>

                            <div className="flex items-center gap-6">
                                {user && user ? (
                                    <div className="relative ms-3">
                                        <Dropdown>
                                            <Dropdown.Trigger>
                                                <span className="inline-flex rounded-md">
                                                    <button
                                                        type="button"
                                                        className="inline-flex items-center rounded-md border border-transparent px-3 py-2 text-sm font-medium leading-4 text-slate-700 dark:text-slate-300 transition duration-150 ease-in-out hover:text-slate-700 focus:outline-none"
                                                    >
                                                        <div className="flex items-center gap-3">
                                                            {/* avatar */}
                                                            <div className="">
                                                                {user.avatar ? (
                                                                    <Avatar
                                                                        src={user.avatar}
                                                                        alt={user.username}
                                                                        width={10}
                                                                        height={10}
                                                                    />
                                                                ) : (
                                                                    <AvatarInconu
                                                                        user={user}
                                                                        width={10}
                                                                        height={10}
                                                                        size={2}
                                                                    />
                                                                )}
                                                            </div>
                                                            {/* <div className="flex flex-col items-start">
                                                            <span className="lowercase">@{user.username}</span>
                                                            <small className="lowercase text-slate-700 dark:text-slate-400 text-sm">
                                                                {user.email}
                                                            </small>
                                                        </div> */}
                                                        </div>
                                                        <svg
                                                            className="ms-1 h-4 w-4"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20"
                                                            fill="currentColor"
                                                        >
                                                            <path
                                                                fillRule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clipRule="evenodd"
                                                            />
                                                        </svg>
                                                    </button>
                                                </span>
                                            </Dropdown.Trigger>

                                            <Dropdown.Content>
                                                <Dropdown.Link href={route("profile.edit")}>Profile</Dropdown.Link>
                                                <Dropdown.Link href={route("logout")} method="post" as="button">
                                                    Log Out
                                                </Dropdown.Link>
                                            </Dropdown.Content>
                                        </Dropdown>
                                    </div>
                                ) : (
                                    <>
                                        <NavLink href={route("login")}>Log in</NavLink>
                                        <NavLink href={route("register")}>Register</NavLink>
                                    </>
                                )}

                                <Mode />
                            </div>
                        </div>
                    </div>

                    <div className="">
                        {/* menu */}

                        <div className="w-full">
                            <div className="m-3 sm:m-6 lg:m-12">{children}</div>
                            <footer className="flex justify-center gap-2 pb-6">
                                <ApplicationLogo className="w-8 fill-current text-ilyes" />
                                <p className="text-slate-500 text-center">&copy; {new Date().getFullYear()}</p>
                            </footer>
                        </div>
                    </div>
                </main>
            </div>

            <ScrollToTop />
        </div>
    );
}
