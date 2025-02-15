import ApplicationLogo from "@/Components/ApplicationLogo";
import Avatar from "@/Components/Avatar";
import AvatarInconu from "@/Components/AvatarInconu";
import Dropdown from "@/Components/Dropdown";
import Mode from "@/Components/Mode";
import NavLink from "@/Components/NavLink";
import { TranslationContext } from "@/contexts/TranslationProvider";
import Container from "@/Pages/Guest/Components/Container";
import { Link, usePage } from "@inertiajs/react";
import React, { useContext } from "react";
import Burger from "./Burger";
import NavbarLinks from "./NavbarLinks";

function Navbar({ switchLanguage }) {
    const user = usePage().props.auth.user;
    const lang = localStorage.getItem("lang") || "en";

    const { translations } = useContext(TranslationContext);

    const locals = [
        {
            locale: "en",
            flag: "united-kingdom.png",
            label: "English",
        },
        {
            locale: "fr",
            flag: "france.png",
            label: "Français",
        },
        {
            locale: "ar",
            flag: "saudi-arabia.png",
            label: "العربية",
        },
        {
            locale: "mar",
            flag: "morocco.png",
            label: "Darija",
        },
    ];

    return (
        <>
            {/* main navbar */}
            <div className="hidden lg:block mb-6 _border_b py-3">
                <Container>
                    <div className="flex h-full justify-between items-center">
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

                            <NavbarLinks />
                        </div>

                        <div className="flex items-center gap-3">
                            {user && user ? (
                                <div className="relative">
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
                                ""
                            )}

                            <Mode />

                            <div className="relative">
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
                                                        <i className="fa-solid fa-language"></i>
                                                    </div>
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
                                        {locals &&
                                            locals.map((pay, index) => (
                                                <Dropdown.Button
                                                    key={index}
                                                    className={`flex gap-2 items-center ${
                                                        pay.locale == "ar" ? "font-arabic" : ""
                                                    }`}
                                                    onClick={() => switchLanguage(pay.locale)}
                                                >
                                                    <img
                                                        src={`${import.meta.env.VITE_APP_URL}/img/flags/${pay.flag}`}
                                                        className="w-6 h-6 aspect-square rounded-full object-cover"
                                                    />
                                                    <div className="">
                                                        {pay.label}

                                                        {pay.locale == "mar" && (
                                                            <span className="text-xs block font-semibold text-ilyes">
                                                                {translations.coming_soon}
                                                            </span>
                                                        )}
                                                    </div>

                                                    {pay.locale == lang && (
                                                        <span className="text-ilyes">
                                                            <i className="fa-solid fa-check"></i>
                                                        </span>
                                                    )}
                                                </Dropdown.Button>
                                            ))}
                                    </Dropdown.Content>
                                </Dropdown>
                            </div>
                        </div>
                    </div>
                </Container>
            </div>

            {/* responsive navbar */}
            <div className="block lg:hidden mb-6 border-b border-slate-200 dark:border-slate-900 py-3">
                <Container>
                    <div className="flex h-full justify-between items-center">
                        <Link href={route("welcome")}>
                            <ApplicationLogo className="block w-12 fill-current text-ilyes" />
                        </Link>

                        <div className="flex items-center gap-6">
                            {user && user ? (
                                <>
                                    <div className="relative">
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
                                    <Burger />
                                </>
                            ) : (
                                ""
                            )}

                            <Mode />

                            <div className="relative">
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
                                                        <i className="fa-solid fa-language"></i>
                                                    </div>
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
                                        {locals &&
                                            locals.map((pay, index) => (
                                                <Dropdown.Button
                                                    key={index}
                                                    className="flex gap-2 items-center"
                                                    onClick={() => switchLanguage(pay.locale)}
                                                >
                                                    <img
                                                        src={`${import.meta.env.VITE_APP_URL}/img/flags/${pay.flag}`}
                                                        className="w-6 h-6 aspect-square rounded-full object-cover"
                                                    />
                                                    {pay.label}

                                                    {pay.locale == lang && (
                                                        <span className="text-ilyes">
                                                            <i className="fa-solid fa-check"></i>
                                                        </span>
                                                    )}
                                                </Dropdown.Button>
                                            ))}
                                    </Dropdown.Content>
                                </Dropdown>
                            </div>
                        </div>
                    </div>
                </Container>
            </div>
        </>
    );
}

export default Navbar;
