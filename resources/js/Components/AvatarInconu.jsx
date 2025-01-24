import React from "react";

function AvatarInconu({ user, width, height, size }) {
    return (
        <div
            className={`w-${width} h-${height} dark:bg-zinc-800 bg-ilyes/15 text-ilyes aspect-square  rounded-full flex justify-center items-center`}
        >
            <span className={`text-${size}xl dark:font-light`}>
                {user.fullname
                    ? user.fullname
                          .split(" ")
                          .map((word) => word[0])
                          .slice(0, 1)
                          .join("")
                          .toUpperCase()
                    : "?"}{" "}
            </span>
        </div>
    );
}

export default AvatarInconu;
