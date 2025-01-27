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
import React, { useState } from "react";

function Create({ topics }) {
    // add logic
    const { data, setData, post, processing, errors } = useForm({
        title: "",
        topics: [],
    });

    const [selectedTopics, setSelectedTopics] = useState([]);

    const toggleSelectedTopics = (selectedTopicId) => {
        setSelectedTopics((prevSelectedTopics) => {
            if (prevSelectedTopics.includes(selectedTopicId)) {
                return prevSelectedTopics.filter((id) => id !== selectedTopicId);
            } else {
                return [...prevSelectedTopics, selectedTopicId];
            }
        });
    };

    function submit(e) {
        e.preventDefault();
        setData("topics", selectedTopics);
        post(route("projects.store"));
    }

    return (
        <AuthenticatedLayout header="Projects">
            <Head title="Create Project" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-slate-200 dark:border-slate-800">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("projects.index")} active={route().current("projects.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to projects list
                    </NavLink>
                    <TitleSection title="Create new Project" />
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
