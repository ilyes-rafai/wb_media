import Checkbox from "@/Components/Checkbox";
import CustomSelect from "@/Components/CustomSelect";
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

function Edit({ project, createdBy, topics }) {
    // add logic
    const { data, setData, put, processing, errors } = useForm({
        title: project.title || "",
        premium: project.premium == 1 ? true : false,
        topics: (project.topics && project.topics.map((topic) => topic.id)) || [],
    });

    const [selectedTopics, setSelectedTopics] = useState(data.topics);

    const toggleSelectedTopics = (selectedTopicId) => {
        setSelectedTopics((prevSelectedTopics) => {
            if (prevSelectedTopics.includes(selectedTopicId)) {
                return prevSelectedTopics.filter((id) => id !== selectedTopicId);
            } else {
                return [...prevSelectedTopics, selectedTopicId];
            }
        });
    };

    // Sync topics with form data on state change
    useEffect(() => {
        setData("topics", selectedTopics);
    }, [selectedTopics]);

    function submit(e) {
        e.preventDefault();
        // put("projects.store");
        // put(`/projects-update/${project.id}`);
        put(route("projects.update", project));
    }

    return (
        <AuthenticatedLayout header="Projects">
            <Head title="Edit Project" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-slate-200 dark:border-slate-800">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("projects.index")} active={route().current("projects.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to projects list
                    </NavLink>
                    <TitleSection title="Edit Project" />
                    {createdBy && (
                        <h2 className="text-xl font-bold leading-tight dark:text-slate-400 text-slate-600">
                            Created by <span className="dark:text-slate-200 text-slate-600">@{createdBy}</span>
                        </h2>
                    )}
                </header>

                <div className="">
                    <form onSubmit={submit}>
                        <div className="mb-6">
                            <InputLabel value="title" isRequired />
                            <TextInput
                                placeholder="title"
                                value={data.title}
                                onError={errors.title}
                                onChange={(e) => setData("title", e.target.value)}
                            />
                            {errors.title && <InputError message={errors.title} />}
                        </div>

                        <div className="mb-6">
                            <div className="mb-6">
                                <InputLabel value="premium" />
                                <Checkbox
                                    id="premium"
                                    checked={data.premium}
                                    onChange={(e) => setData("premium", e.target.checked)} // Pass boolean value
                                    label="premium"
                                />
                                {errors.premium && <InputError message={errors.premium} />}
                            </div>
                        </div>

                        {/* topics */}
                        <div className="mb-6">
                            <InputLabel value="choose topics" isRequired />

                            <div className="flex gap-x-6 gap-y-3 flex-wrap">
                                {topics &&
                                    topics.map((topic) => (
                                        <div className="" key={topic.id}>
                                            <Checkbox
                                                id={`topic-${topic.id}`}
                                                checked={selectedTopics.includes(topic.id)}
                                                onChange={() => toggleSelectedTopics(topic.id)}
                                                label={topic.name}
                                            />
                                        </div>
                                    ))}
                            </div>
                            {errors.topics && <InputError message={errors.topics} />}
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
