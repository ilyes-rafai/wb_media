import InputError from "@/Components/InputError";
import React, { useState } from "react";
import { useDropzone } from "react-dropzone";

function DropzoneInput({ onFileSelect, error, progress, accept = {}, maxFiles = 1 }) {
    const [preview, setPreview] = useState(null); // For previewing the uploaded image

    const onDrop = (acceptedFiles) => {
        if (acceptedFiles.length) {
            const file = acceptedFiles[0];
            onFileSelect(file); // Pass the file back to the parent
            setPreview(URL.createObjectURL(file)); // Generate a preview URL
        }
    };

    const { getRootProps, getInputProps, isDragActive } = useDropzone({
        onDrop,
        accept,
        maxFiles,
    });

    return (
        <div className="mb-6">
            {/* Dropzone Area */}
            <div
                {...getRootProps()}
                className={`flex justify-center items-center border-2 ${
                    isDragActive ? "border-ilyes bg-ilyes/10" : "border-dashed"
                } rounded-lg px-6 py-24 cursor-pointer dark:border-slate-700 bg-emerald-50 dark:bg-slate-950`}
            >
                <input {...getInputProps()} />
                {preview ? (
                    <img src={preview} alt="Preview" className="max-h-40 rounded-lg object-cover" />
                ) : isDragActive ? (
                    <p className="text-slate-700 dark:text-slate-300">Drop the file here...</p>
                ) : (
                    <p className="text-slate-700 dark:text-slate-300">
                        Drag & drop your file here, or click to select one.
                    </p>
                )}
            </div>

            {/* Error Message */}
            {error && <InputError message={error} />}

            {/* Progress Bar */}
            {progress && (
                <div className="mt-4">
                    <progress
                        value={progress.percentage}
                        max="100"
                        className="w-full h-2 rounded-lg bg-slate-200 dark:bg-slate-700"
                    >
                        {progress.percentage}%
                    </progress>
                    <span className="text-sm font-medium text-slate-500 dark:text-slate-400">
                        {progress.percentage}%
                    </span>
                </div>
            )}
        </div>
    );
}

export default DropzoneInput;
