export default function Radio({ className = "", id, name, label, ...props }) {
    return (
        <>
            <input
                {...props}
                name={name}
                type="radio"
                id={id}
                className={
                    "rounded border-ilyes bg-white dark:bg-slate-900 text-ilyes shadow-sm focus:ring-ilyes " + className
                }
            />

            <label
                htmlFor={id}
                label={label}
                className="text-sm font-medium dark:text-slate-300 text-slate-800 uppercase whitespace-nowrap"
            >
                {label}
            </label>
        </>
    );
}
