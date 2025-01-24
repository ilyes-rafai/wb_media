import React, { useEffect, useState } from "react";

const Mode = () => {
    const [darkMode, setDarkMode] = useState(() => {
        return localStorage.getItem("theme") === "dark";
    });

    // Toggle dark mode and save preference
    const toggleDarkMode = () => {
        const newMode = !darkMode;
        setDarkMode(newMode);
        localStorage.setItem("theme", newMode ? "dark" : "light");
    };

    // Apply dark mode class to the body
    useEffect(() => {
        if (darkMode) {
            document.body.classList.add("dark");
        } else {
            document.body.classList.remove("dark");
        }
    }, [darkMode]);

    return (
        <div className="cursor-pointer dark:text-zinc-300 text-zinc-600">
            <span onClick={toggleDarkMode}>
                {darkMode ? <i className="fa-solid fa-sun"></i> : <i className="fa-solid fa-moon"></i>}
            </span>
        </div>
    );
};

export default Mode;
