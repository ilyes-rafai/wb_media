import { Link } from "@inertiajs/react";

export default function NavLink({ active = false, className = "", children, ...props }) {
    return (
        <Link
            {...props}
            className={
                "flex items-center text-sm font-medium leading-5 transition duration-150 ease-in-out focus:outline-none whitespace-nowrap w-fit " +
                (active
                    ? "text-ilyes dark:text-ilyes border-ilyes dark:border-ilyes"
                    : "dark:text-slate-400 dark:hover:text-slate-200 text-slate-600 hover:text-slate-800 dark:transparent border-transparent") +
                className
            }
        >
            {children}
        </Link>
    );
}
