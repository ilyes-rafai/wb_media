import { forwardRef, useEffect, useImperativeHandle, useRef, useState } from "react";

export default forwardRef(function TextInput(
    { type = "text", placeholder = "", className = "", onError = false, isFocused = false, ...props },
    ref
) {
    const localRef = useRef(null);
    const [showPassword, setShowPassword] = useState(false);

    useImperativeHandle(ref, () => ({
        focus: () => localRef.current?.focus(),
    }));

    useEffect(() => {
        if (isFocused) {
            localRef.current?.focus();
        }
    }, [isFocused]);

    return (
        <div className="relative">
            {/* Input Field */}
            <input
                {...props}
                type={type == "password" && showPassword ? "text" : type}
                placeholder={`Enter ${placeholder} here...`}
                className={`font-semibold border text-slate-700 dark:text-slate-300 placeholder:font-medium dark:placeholder-slate-700 placeholder-slate-400 text-sm rounded-lg block w-full p-2.5 bg-transparent ${
                    onError
                        ? "border-rose-500 focus:ring-rose-500 focus:border-rose-500"
                        : "_border focus:ring-ilyes focus:border-ilyes"
                }`}
                ref={localRef}
            />

            {/* Show/Hide Password Button */}
            {type === "password" && (
                <button
                    type="button"
                    className="absolute top-1/2 ltr:right-3 rtl:left-3 transform -translate-y-1/2 text-slate-500 dark:text-slate-400"
                    onClick={() => setShowPassword(!showPassword)}
                >
                    <i className={`fa-solid ${showPassword ? "fa-eye-slash" : "fa-eye"}`}></i>
                </button>
            )}
        </div>
    );
});
