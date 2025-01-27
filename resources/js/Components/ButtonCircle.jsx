import React from "react";

function ButtonCircle({ icon, action }) {
    return (
        <span
            onClick={action} // Dynamically handle the onClick event with the passed action
            className={`text-slate-500 dark:text-slate-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-slate-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-slate-900 bg-white`}
        >
            <i className={`fa-solid fa-${icon}`}></i>
        </span>
    );
}

export default ButtonCircle;
