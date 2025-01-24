import FloatInput from "@/Components/FloatInput";
import InputError from "@/Components/InputError";
import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, router, useForm } from "@inertiajs/react";
import React from "react";

function EditAvatar({ user }) {
    const { data, setData, post, processing, errors, progress } = useForm({
        avatar: null,
        _method: "PUT",
    });

    function submit(e) {
        e.preventDefault();

        post(route("users.update_avatar", user.id));
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
                    <h2 className="text-4xl font-bold leading-tight dark:text-zinc-400 text-zinc-600 mt-3">
                        Edit User Avatar - {user.fullname}
                    </h2>
                </header>

                <div>
                    <form onSubmit={submit}>
                        {/* Avatar */}
                        <div className="mb-6">
                            <label
                                htmlFor="avatar"
                                className="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2"
                            >
                                Upload Avatar
                            </label>
                            <input
                                type="file"
                                id="avatar"
                                accept="image/png,image/jpg,image/jpeg"
                                onChange={(e) => setData("avatar", e.target.files[0])} // Remove "value"
                                className="block w-full text-sm text-zinc-700 bg-zinc-50 border border-zinc-300 rounded-lg cursor-pointer focus:outline-none focus:ring-ilyes focus:border-ilyes dark:text-zinc-300 dark:border-zinc-700 dark:bg-zinc-900 dark:placeholder-zinc-500"
                            />

                            {errors.avatar && <InputError message={errors.avatar} />}
                        </div>

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
                        <PrimaryButton type="submit" className="flex items-center gap-2">
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
