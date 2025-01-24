import FloatInput from "@/Components/FloatInput";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import React from "react";

function Edit({ topic, createdBy }) {
    // add logic
    const { data, setData, put, processing, errors } = useForm({
        name: topic.name || "",
        description: topic.description || "",
        svg: topic.svg || "",
    });

    function submit(e) {
        e.preventDefault();
        put(route("topics.update", topic));
    }

    return (
        <AuthenticatedLayout header="Topics">
            <Head title="Edit Topic" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-zinc-200 dark:border-zinc-800">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("topics.index")} active={route().current("topics.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to topics list
                    </NavLink>
                    <TitleSection title={`Edit Topic - ${topic.name}`} />
                    {createdBy && (
                        <h2 className="text-xl font-bold leading-tight dark:text-zinc-400 text-zinc-600">
                            Created by <span className="dark:text-zinc-200 text-zinc-600">@{createdBy}</span>
                        </h2>
                    )}
                </header>

                <div className="">
                    <form onSubmit={submit}>
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div className="">
                                <InputLabel value="name" isRequired />
                                <TextInput
                                    placeholder="name"
                                    value={data.name}
                                    onError={errors.name}
                                    onChange={(e) => setData("name", e.target.value)}
                                />
                                {errors.name && <InputError message={errors.name} />}
                            </div>

                            <div className="">
                                <InputLabel value="svg" isRequired />
                                <TextInput
                                    placeholder="svg"
                                    value={data.svg}
                                    onError={errors.svg}
                                    onChange={(e) => setData("svg", e.target.value)}
                                />
                                {errors.svg && <InputError message={errors.svg} />}
                            </div>
                        </div>

                        <div className="mb-6">
                            <InputLabel value="description" isRequired />
                            <TextInput
                                placeholder="description"
                                value={data.description}
                                onError={errors.description}
                                onChange={(e) => setData("description", e.target.value)}
                            />
                            {errors.description && <InputError message={errors.description} />}
                        </div>

                        <PrimaryButton type="submit" className="flex items-center gap-2">
                            {processing ? (
                                <>
                                    <i className="fa-solid fa-spinner animate-spin"></i>
                                    Processing...
                                </>
                            ) : (
                                "Save changes"
                            )}
                        </PrimaryButton>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default Edit;
