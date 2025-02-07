import React, { useEffect, useState } from "react";
import NavbarLinks from "./NavbarLinks";

function Burger() {
    const [menuOpen, setMenuOpen] = useState(false);

    const openMenu = () => {
        setMenuOpen(true);
    };

    const closeMenu = () => {
        setMenuOpen(false);
    };

    // Log menuOpen whenever it changes
    useEffect(() => {}, [menuOpen]);

    return (
        <div className="">
            <span onClick={openMenu} className="cursor-pointer dark:text-slate-300 text-slate-600 text-xl">
                <i className="fa-solid fa-bars-staggered"></i>
            </span>

            <div
                className={`fixed dark:bg-ilyes/5 bg-ilyes/5 backdrop-blur top-0 left-0 w-screen h-full z-50 transition-all duration-500 ${
                    menuOpen ? "opacity-100 pointer-events-auto" : "opacity-0 pointer-events-none"
                } `}
            >
                <div className={`p-6 flex flex-col justify-center gap-6 h-full transition-all duration-500`}>
                    <NavbarLinks />
                </div>

                <span
                    onClick={closeMenu}
                    className="absolute top-4 right-8 cursor-pointer dark:text-slate-200 text-slate-800 text-xl font-semibold dark:font-normal whitespace-nowrap"
                >
                    <i className="fa-solid fa-times me-2"></i>
                    Close menu
                </span>
            </div>
        </div>
    );
}

export default Burger;
