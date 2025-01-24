import { Link } from "@inertiajs/react";

export default function NavLink({ active = false, className = "", children, ...props }) {
    return (
        <Link
            {...props}
            className={
                "flex items-center text-sm font-medium leading-5 transition duration-150 ease-in-out focus:outline-none whitespace-nowrap w-fit " +
                (active
                    ? "text-ilyes dark:text-ilyes border-ilyes dark:border-ilyes"
                    : "dark:text-zinc-400 dark:hover:text-zinc-200 text-zinc-600 hover:text-zinc-800 dark:transparent border-transparent") +
                className
            }
        >
            {children}
        </Link>
    );
}
