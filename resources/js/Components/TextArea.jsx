import { forwardRef, useEffect, useImperativeHandle, useRef } from "react";

export default forwardRef(function TextArea(
    { rows, placeholder = "", className = "", onError = false, isFocused = false, ...props },
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
        <textarea
            {...props}
            rows={rows}
            placeholder={`Enter ${placeholder} here...`}
            className={`font-semibold border text-zinc-700 dark:text-zinc-300 placeholder:font-medium dark:placeholder-zinc-700 placeholder-zinc-400 text-sm rounded-lg block w-full p-2.5 bg-transparent ${
                onError
                    ? "border-pink-500 focus:ring-pink-500 focus:border-pink-500"
                    : "dark:border-zinc-900 border-zinc-300 focus:ring-ilyes focus:border-ilyes"
            }`}
            ref={localRef}
        />
    );
});
