import { forwardRef, useEffect, useImperativeHandle, useRef } from "react";

export default forwardRef(function FileInput({ className = "", isFocused = false, accept = "", ...props }, ref) {
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
            type="file"
            className={
                "rounded-md border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 " + className
            }
            ref={localRef}
            accept={accept} // Accept specific file types (e.g., image/*)
        />
    );
});
