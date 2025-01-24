import React from "react";

function Avatar({ src, alt, width, height }) {
    return (
        <img
            className="aspect-square rounded-full bg-white dark:bg-black object-cover"
            src={`${import.meta.env.VITE_APP_URL}/${src}`}
            alt={alt}
            width={width}
            height={height}
            title="User avatar"
        />
    );
}

export default Avatar;
