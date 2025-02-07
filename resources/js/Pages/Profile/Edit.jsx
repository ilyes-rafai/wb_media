import AuthenticatedLayout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";
import DeleteUserForm from "./Partials/DeleteUserForm";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm";

export default function Edit({ mustVerifyEmail, status }) {
    return (
        <AuthenticatedLayout header={<h2 className="text-xl font-semibold leading-tight">Profile</h2>}>
            <Head title="Profile" />

            <div className="py-12">
                <div className="grid grid-cols-1 gap-6 sm:gap-12">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-12">
                        <div className="p-3 sm:p-6 rounded-lg _border">
                            <UpdateProfileInformationForm mustVerifyEmail={mustVerifyEmail} status={status} />
                        </div>
                        <div className="p-3 sm:p-6 rounded-lg _border">
                            <UpdateProfileInformationForm mustVerifyEmail={mustVerifyEmail} status={status} />
                        </div>
                    </div>

                    <div className="p-3 sm:p-6 rounded-lg _border">
                        <UpdatePasswordForm />
                    </div>
                    {/* 
                    <div className="p-3 sm:p-6 rounded-lg _border">
                        <DeleteUserForm className="max-w-xl" />
                    </div> */}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
