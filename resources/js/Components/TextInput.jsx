import { forwardRef, useEffect, useImperativeHandle, useRef } from "react";

export default forwardRef(function TextInput(
    { type = "text", placeholder = "", className = "", onError = false, isFocused = false, ...props },
    ref
) {
    const localRef = useRef(null);

    useImperativeHandle(ref, () => ({
        focus: () => localRef.current?.focus(),
    }));

    useEffect(() => {
        if (isFocused) {
            localRef.current?.focus();
        }
    }, [isFocused]);

    return (
        <input
            {...props}
            type={type}
            placeholder={`Enter ${placeholder} here...`}
            className={`font-semibold border text-slate-700 dark:text-slate-300 placeholder:font-medium dark:placeholder-slate-700 placeholder-slate-400 text-sm rounded-lg block w-full p-2.5 bg-transparent ${
                onError
                    ? "border-rose-500 focus:ring-rose-500 focus:border-rose-500"
                    : "_border focus:ring-ilyes focus:border-ilyes"
            }`}
            ref={localRef}
        />
    );
});
