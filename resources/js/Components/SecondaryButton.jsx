export default function SecondaryButton({ type = "button", className = "", disabled, children, ...props }) {
    return (
        <button
            {...props}
            type={type}
            className={
                `inline-flex items-center rounded-md border border-slate-300 dark:border-slate-600 dark:bg-slate-300 bg-slate-200 px-4 py-2 text-xs font-semibold uppercase tracking-widest dark:text-slate-900 text-slate-600 shadow-sm transition duration-150 ease-in-out hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-ilyes focus:ring-offset-2 disabled:opacity-25 ${
                    disabled && "opacity-25"
                } ` + className
            }
            disabled={disabled}
        >
            {children}
        </button>
    );
}
