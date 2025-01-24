export default function PrimaryButton({ className = "", disabled, children, ...props }) {
    return (
        <button
            {...props}
            className={
                `inline-flex items-center rounded-md bg-ilyes px-4 py-2 text-xs font-semibold uppercase tracking-widest text-zinc-900 transition duration-150 ease-in-out hover:bg-ilyes focus:bg-ilyes focus:outline-none  active:bg-ilyes ${
                    disabled && "opacity-25"
                } ` + className
            }
            disabled={disabled}
        >
            {children}
        </button>
    );
}
