import { Link } from "@inertiajs/react";

export default function HyperLink({ className = "", disabled, children, ...props }) {
    return (
        <a
            {...props}
            className={
                `flex items-center middle none center mr-3 rounded-lg bg-ilyes py-3 px-6 font-sans text-xs font-bold uppercase text-black shadow-md shadow-ilyes/20 transition-all hover:shadow-lg hover:shadow-ilyes/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ${
                    disabled && "opacity-25"
                } ` + className
            }
            disabled={disabled}
        >
            {children}
        </a>
    );
}
