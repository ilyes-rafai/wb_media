export default function Radio({ className = "", labelClassName, id, name, label, ...props }) {
    return (
        <>
            <input
                {...props}
                name={name}
                type="radio"
                id={id}
                className={
                    "rounded-full border-2 border-ilyes bg-white dark:bg-slate-900 accent-green-700 text-ilyes checked:bg-ilyes dark:checked:bg-ilyes " +
                    className
                }
            />

            <label
                htmlFor={id}
                label={label}
                className={
                    "text-sm font-medium dark:text-slate-300 text-slate-800 uppercase whitespace-nowrap " +
                    labelClassName
                }
            >
                {label}
            </label>
        </>
    );
}
