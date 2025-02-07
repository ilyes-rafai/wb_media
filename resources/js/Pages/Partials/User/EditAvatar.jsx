import Avatar from "@/Components/Avatar";
import AvatarInconu from "@/Components/AvatarInconu";
import DropzoneInput from "@/Components/DropzoneInput";
import FloatInput from "@/Components/FloatInput";
import InputError from "@/Components/InputError";
import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head, useForm } from "@inertiajs/react";
import React from "react";

function EditAvatar({ user }) {
    const { data, setData, post, processing, errors, progress } = useForm({
        avatar: null,
        _method: "PUT",
    });

    function handleFileSelect(file) {
        setData("avatar", file); // Update the file in the form data
    }

    function submit(e) {
        e.preventDefault();
        post(route("users.update_avatar", user.id)); // Submit the form
    }

    return (
        <AuthenticatedLayout header="Users">
            <Head title={`Edit User Avatar - ${user.fullname}`} />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("users.index")} active={route().current("users.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to users list
                    </NavLink>

                    <div className="flex gap-3">
                        <TitleSection title={`Edit ${user.fullname} Avatar`} />
                        <div>
                            {user.avatar ? (
                                <Avatar src={user.avatar} alt={user.username} width={16} height={16} />
                            ) : (
                                <AvatarInconu user={user} width={16} height={16} size={4} />
                            )}
                        </div>
                    </div>
                </header>

                <div>
                    {/* Dropzone Component */}
                    <DropzoneInput
                        onFileSelect={handleFileSelect}
                        error={errors.avatar}
                        progress={progress}
                        accept={{
                            "image/png": [],
                            "image/jpeg": [],
                            "image/jpg": [],
                        }}
                        maxFiles={1}
                    />

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
