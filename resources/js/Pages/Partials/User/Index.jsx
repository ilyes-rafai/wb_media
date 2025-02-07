import ButtonCircle from "@/Components/ButtonCircle";
import FloatInput from "@/Components/FloatInput";
import InputError from "@/Components/InputError";
import NavLink from "@/Components/NavLink";
import Search from "@/Components/Search";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head, useForm } from "@inertiajs/react";
import React, { useState } from "react";
import UserCard from "./UserCard";

export default function Index({ users }) {
    // Search State
    const [filteredUsers, setFilteredUsers] = useState(users);

    // add modal
    const [isModalOpened, setIsModalOpened] = useState(false);

    const openModal = () => {
        setIsModalOpened(true);
    };

    const closeModal = () => {
        setIsModalOpened(false);
    };

    return (
        <AuthenticatedLayout header="Users">
            <Head title="Users List" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <div className="flex justify-between">
                        <div className="flex items-center gap-3">
                            <div className="">
                                <TitleSection title="Users list" data={users} />
                                <div className="mt-3">
                                    <NavLink href={route("users.create")} active={route().current("users.create")}>
                                        <i className="fa-solid fa-circle-plus me-2 text-lg"></i>
                                        Create new user
                                    </NavLink>
                                </div>
                            </div>
                        </div>

                        {/* Search Component */}
                        <div className="">
                            <Search
                                placeholder="Search in users..."
                                data={users}
                                columns={["name", "description", "user.username"]}
                                onSearch={setFilteredUsers}
                            />
                        </div>
                    </div>
                </header>

                {/* Users Grid */}
                <div className="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                    {/* {filteredUsers.length > 0 ? (
                    filteredUsers.map((user) => <UserCard key={user.id} user={user} />)
                ) : (
                    <div className="col-span-full text-center text-slate-500 dark:text-slate-400">No users found.</div>
                )} */}

                    {users.map((user) => (
                        <UserCard key={user.id} user={user} />
                    ))}
                </div>
            </div>

            {/* Pagination */}
            {/* <div className="mt-12 flex justify-center">
                <Pagination data={filteredUsers} />
            </div> */}
        </AuthenticatedLayout>
    );
}
