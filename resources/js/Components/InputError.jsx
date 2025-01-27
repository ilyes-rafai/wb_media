export default function InputError({ message, className = "", ...props }) {
    return message ? (
        <p {...props} className={"mt-3 text-sm font-semibold text-rose-600 " + className}>
            {message}
        </p>
    ) : null;
}
