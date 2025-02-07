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

function Edit({ trick, createdBy, topics }) {
    // add logic
    const { data, setData, put, processing, errors } = useForm({
        title: trick.title || "",
        premium: trick.premium == 1 ? true : false,
        topics: (trick.topics && trick.topics.map((topic) => topic.id)) || [],
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
        // put("tricks.store");
        // put(`/tricks-update/${trick.id}`);
        put(route("tricks.update", trick));
    }

    return (
        <AuthenticatedLayout header="Tricks">
            <Head title="Edit Trick" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("tricks.index")} active={route().current("tricks.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to tricks list
                    </NavLink>
                    <TitleSection title="Edit Trick" />
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
