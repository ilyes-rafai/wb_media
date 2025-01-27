import FloatInput from "@/Components/FloatInput";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head, useForm } from "@inertiajs/react";
import React, { useEffect, useState } from "react";

function EditPassword({ user }) {
    // Initialize form data with existing user data
    const { data, setData, put, processing, errors } = useForm({
        password: "",
    });

    function submit(e) {
        e.preventDefault();
        put(route("users.update_password", user.id)); // PUT method to update user password
    }

    return (
        <AuthenticatedLayout header="Users">
            <Head title={`Edit User Password - ${user.fullname}`} />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-slate-200 dark:border-slate-800">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("users.index")} active={route().current("users.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to users list
                    </NavLink>
                    <h2 className="text-4xl font-bold leading-tight dark:text-slate-400 text-slate-600 mt-3"></h2>
                    <TitleSection title={`Edit User Password - ${user.fullname}`} />
                </header>

                <div className="">
                    <form onSubmit={submit}>
                        {/* password */}
                        <div className="mb-6">
                            <InputLabel value="password" isRequired />
                            <TextInput
                                placeholder="password"
                                value={data.password}
                                onError={errors.password}
                                onChange={(e) => setData("password", e.target.value)}
                            />
                            {errors.password && <InputError message={errors.password} />}
                        </div>

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

export default EditPassword;
