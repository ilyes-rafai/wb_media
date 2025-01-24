import React from "react";

function ButtonCircle({ icon, action }) {
    return (
        <span
            onClick={action} // Dynamically handle the onClick event with the passed action
            className={`text-zinc-500 dark:text-zinc-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-zinc-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-zinc-900 bg-white`}
        >
            <i className={`fa-solid fa-${icon}`}></i>
        </span>
    );
}

export default ButtonCircle;
