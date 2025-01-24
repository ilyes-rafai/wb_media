export default function InputLabel({ value, isRequired, className = "", children, ...props }) {
    return (
        <label {...props} className={`block text-sm font-medium text-zinc-500 mb-2 ` + className}>
            {value ? (
                <>
                    <span className="uppercase">{value}</span> {isRequired && <span className="text-pink-500">*</span>}
                </>
            ) : (
                children
            )}
        </label>
    );
}
