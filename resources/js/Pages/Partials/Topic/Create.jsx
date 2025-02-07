import FloatInput from "@/Components/FloatInput";
import InputError from "@/Components/InputError";
import InputFile from "@/Components/InputFile";
import InputLabel from "@/Components/InputLabel";
import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head, useForm } from "@inertiajs/react";
import React from "react";

function Create() {
    // add logic
    const { data, setData, post, processing, errors } = useForm({
        name: "",
        description: "",
        svg: "",
    });

    function submit(e) {
        e.preventDefault();
        post(route("topics.store"));
    }

    return (
        <AuthenticatedLayout header="Topics">
            <Head title="Create Topic" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("topics.index")} active={route().current("topics.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to topics list
                    </NavLink>
                    <h2 className="text-4xl font-bold leading-tight dark:text-slate-400 text-slate-600 mt-3">
                        Create new topic
                    </h2>
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
                                <InputFile
                                    accept=".jpg, .jpeg, .png"
                                    onChange={(e) => setData("svg", e.target.files[0])} // Set the file object
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
                                "Save"
                            )}
                        </PrimaryButton>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default Create;
