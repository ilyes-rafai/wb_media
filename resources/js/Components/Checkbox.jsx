export default function Checkbox({ className = "", id, label, ...props }) {
    return (
        <>
            <input
                {...props}
                type="checkbox"
                id={id}
                className={
                    "rounded border-ilyes bg-white dark:bg-zinc-900 text-ilyes shadow-sm focus:ring-ilyes " + className
                }
            />

            <label
                htmlFor={id}
                label={label}
                className="ms-2 text-sm font-medium dark:text-zinc-300 text-zinc-800 uppercase whitespace-nowrap"
            >
                {label}
            </label>
        </>
    );
}
