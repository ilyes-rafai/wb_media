export default function Checkbox({ className = "", id, label, ...props }) {
    return (
        <label htmlFor={id} className="relative inline-flex items-center cursor-pointer">
            <input {...props} type="checkbox" id={id} className="sr-only peer" />
            <div
                className="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-5
        peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-0.5
        after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5
        after:transition-all dark:border-slate-600 peer-checked:bg-ilyes"
            ></div>
            <span className="ms-2 text-sm font-medium dark:text-slate-300 text-slate-800 uppercase whitespace-nowrap">
                {label}
            </span>
        </label>
    );
}
