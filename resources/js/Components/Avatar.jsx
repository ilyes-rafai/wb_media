import React from "react";

function Avatar({ src, alt, width, height }) {
    return (
        <img
            className={`w-${width} h-${height} aspect-square rounded-full bg-white dark:bg-black object-cover`}
            src={`${import.meta.env.VITE_APP_URL}/${src}`}
            alt={alt}
            title="User avatar"
        />
    );
}

export default Avatar;
