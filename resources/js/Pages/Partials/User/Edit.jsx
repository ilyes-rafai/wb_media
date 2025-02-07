import Checkbox from "@/Components/Checkbox";
import FloatInput from "@/Components/FloatInput";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import Radio from "@/Components/Radio";
import TextInput from "@/Components/TextInput";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head, useForm } from "@inertiajs/react";
import React, { useEffect, useState } from "react";

function Edit({ user, roles }) {
    // Initialize form data with existing user data
    const { data, setData, put, processing, errors } = useForm({
        fullname: user.fullname || "",
        username: user.username || "",
        email: user.email || "",
        gender: user.gender == 1 ? true : false,
        roles: (user.roles && user.roles.map((role) => role.id)) || [],
    });

    const [selectedRoles, setSelectedRoles] = useState(data.roles);

    const toggleSelectedRoles = (selectedRoleId) => {
        setSelectedRoles((prevSelectedRoles) => {
            if (prevSelectedRoles.includes(selectedRoleId)) {
                return prevSelectedRoles.filter((id) => id !== selectedRoleId);
            } else {
                return [...prevSelectedRoles, selectedRoleId];
            }
        });
    };

    // Sync roles with form data on state change
    useEffect(() => {
        setData("roles", selectedRoles);
    }, [selectedRoles]);

    function submit(e) {
        e.preventDefault();
        put(route("users.update", user.id)); // PUT method to update user
    }

    return (
        <AuthenticatedLayout header="Users">
            <Head title={`Edit User - ${user.fullname}`} />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("users.index")} active={route().current("users.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to users list
                    </NavLink>

                    <TitleSection title={`Edit User - ${user.fullname}`} />
                </header>

                <div className="">
                    <form onSubmit={submit}>
                        {/* fullname + username + gender */}
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            {/* fullname */}
                            <div className="">
                                <InputLabel value="fullname" isRequired />
                                <TextInput
                                    placeholder="fullname"
                                    value={data.fullname}
                                    onError={errors.fullname}
                                    onChange={(e) => setData("fullname", e.target.value)}
                                />
                                {errors.fullname && <InputError message={errors.fullname} />}
                            </div>

                            {/* username */}
                            <div className="">
                                <InputLabel value="username" isRequired />
                                <TextInput
                                    placeholder="username"
                                    value={data.username}
                                    onError={errors.username}
                                    onChange={(e) => setData("username", e.target.value)}
                                />
                                {errors.username && <InputError message={errors.username} />}
                            </div>

                            {/* gender */}
                            <div>
                                <InputLabel value="gender" isRequired />

                                <div className="flex items-center gap-4">
                                    {/* Male Option */}

                                    <Radio
                                        name="gender"
                                        id="Male"
                                        checked={data.gender === false}
                                        onChange={() => setData("gender", false)}
                                        label="male"
                                    />

                                    <Radio
                                        name="gender"
                                        id="Female"
                                        checked={data.gender === true}
                                        onChange={() => setData("gender", true)}
                                        label="female"
                                    />
                                </div>
                                {errors.gender && <InputError message={errors.gender} />}
                            </div>
                        </div>

                        {/* email + password */}
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div className="">
                                <InputLabel value="email" isRequired />
                                <TextInput
                                    placeholder="email"
                                    value={data.email}
                                    onError={errors.email}
                                    onChange={(e) => setData("email", e.target.value)}
                                />
                                {errors.email && <InputError message={errors.email} />}
                            </div>

                            <div className="">
                                <InputLabel value="password" isRequired />
                                <TextInput
                                    placeholder="password"
                                    value={data.password}
                                    onError={errors.password}
                                    onChange={(e) => setData("password", e.target.value)}
                                />
                                {errors.password && <InputError message={errors.password} />}
                            </div>
                        </div>

                        {/* roles */}
                        <div className="mb-3 grid md:grid-cols-1 md:gap-6">
                            <div>
                                <InputLabel value="choose roles" isRequired />

                                <div className="flex gap-6 flex-wrap">
                                    {roles &&
                                        roles.map((role) => (
                                            <div className="flex items-center mb-4" key={role.id}>
                                                <Checkbox
                                                    id={`role-${role.id}`}
                                                    checked={selectedRoles.includes(role.id)}
                                                    onChange={() => toggleSelectedRoles(role.id)}
                                                    label={role.name}
                                                />
                                            </div>
                                        ))}
                                </div>
                                {errors.roles && <InputError message={errors.roles} />}
                            </div>
                        </div>

                        <PrimaryButton type="submit" className="flex items-center gap-2">
                            {processing ? (
                                <>
                                    <i className="fa-solid fa-spinner animate-spin"></i>
                                    Processing...
                                </>
                            ) : (
                                "Save"
                            )}
                        </PrimaryButton>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default Edit;
