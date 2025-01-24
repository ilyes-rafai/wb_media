import FloatInput from "@/Components/FloatInput";
import InputError from "@/Components/InputError";
import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import React, { useState } from "react";
import { useDropzone } from "react-dropzone";

function EditAvatar({ user }) {
    const { data, setData, post, processing, errors, progress } = useForm({
        avatar: null,
        _method: "PUT",
    });

    const [preview, setPreview] = useState(null); // For displaying the preview inside the dropzone

    const onDrop = (acceptedFiles) => {
        if (acceptedFiles.length) {
            const file = acceptedFiles[0];
            setData("avatar", file); // Set the selected file
            setPreview(URL.createObjectURL(file)); // Create a preview URL for the file
        }
    };

    const { getRootProps, getInputProps, isDragActive } = useDropzone({
        onDrop,
        accept: {
            "image/png": [],
            "image/jpeg": [],
            "image/jpg": [],
        },
        maxFiles: 1, // Allow only one file
    });

    function submit(e) {
        e.preventDefault();
        post(route("users.update_avatar", user.id)); // POST request to update the avatar
    }

    return (
        <AuthenticatedLayout header="Users">
            <Head title={`Edit User Avatar - ${user.fullname}`} />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-zinc-200 dark:border-zinc-800">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("users.index")} active={route().current("users.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to users list
                    </NavLink>

                    <TitleSection title={`Edit User Avatar - ${user.fullname}`} />
                </header>

                <div>
                    {/* Dropzone */}
                    <div
                        {...getRootProps()}
                        className={`mb-6 flex justify-center items-center border-2 ${
                            isDragActive ? "border-ilyes bg-ilyes/10" : "border-dashed"
                        } rounded-lg px-6 py-24 cursor-pointer dark:border-zinc-700 bg-emerald-50 dark:bg-zinc-950`}
                    >
                        <input {...getInputProps()} />
                        {preview ? (
                            <img src={preview} alt="Preview" className="max-h-40 rounded-lg object-cover" />
                        ) : isDragActive ? (
                            <p className="text-zinc-700 dark:text-zinc-300">Drop the file here...</p>
                        ) : (
                            <p className="text-zinc-700 dark:text-zinc-300">
                                Drag & drop your avatar here, or click to select a file.
                            </p>
                        )}
                    </div>

                    {errors.avatar && <InputError message={errors.avatar} />}

                    {/* Progress Bar */}
                    {progress && (
                        <div className="mb-4">
                            <progress
                                value={progress.percentage}
                                max="100"
                                className="w-full h-2 rounded-lg bg-zinc-200 dark:bg-zinc-700"
                            >
                                {progress.percentage}%
                            </progress>
                            <span className="text-sm font-medium text-zinc-500 dark:text-zinc-400">
                                {progress.percentage}%
                            </span>
                        </div>
                    )}

                    {/* Submit Button */}
                    <form onSubmit={submit}>
                        <PrimaryButton
                            type="submit"
                            disabled={processing || !data.avatar} // Disable button if no file is selected
                            className="flex items-center gap-2"
                        >
                            {processing ? (
                                <>
                                    <i className="fa-solid fa-spinner animate-spin"></i>
                                    Processing...
                                </>
                            ) : (
                                "Save Changes"
                            )}
                        </PrimaryButton>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default EditAvatar;
