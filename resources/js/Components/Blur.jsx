import React from "react";

function Blur({
    size = "w-20",
    top,
    left,
    bottom,
    right,
    bgColor = "bg-ilyes dark:bg-ilyes/80",
    animation = "animate-bounce-slow",
    extraClasses = "",
}) {
    return (
        <div
            className={`${animation} ${size} aspect-square ${bgColor} rounded-full fixed blur-3xl pointer-events-none ${extraClasses}`}
            style={{
                top: top !== undefined ? `${top}px` : undefined,
                left: left !== undefined ? `${left}px` : undefined,
                bottom: bottom !== undefined ? `${bottom}px` : undefined,
                right: right !== undefined ? `${right}px` : undefined,
            }}
        ></div>
    );
}

export default Blur;
