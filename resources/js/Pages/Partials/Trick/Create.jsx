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
        title_en: "",
        title_ar: "",
        title_fr: "",
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
        post(route("tricks.store"));
    }

    return (
        <AuthenticatedLayout header="Tricks">
            <Head title="Create Trick" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("tricks.index")} active={route().current("tricks.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to tricks list
                    </NavLink>
                    <TitleSection title="Create new Trick" />
                </header>

                <div className="">
                    <form onSubmit={submit}>
                        <div className="mb-6">
                            <InputLabel value="English title" isRequired />
                            <TextInput
                                placeholder="english title"
                                value={data.title_en}
                                onError={errors.title_en}
                                onChange={(e) => setData("title_en", e.target.value)}
                            />
                            {errors.title_en && <InputError message={errors.title_en} />}

                            <InputLabel value="Arabic title" isRequired />
                            <TextInput
                                placeholder="arabic title"
                                value={data.title_ar}
                                onError={errors.title_ar}
                                onChange={(e) => setData("title_ar", e.target.value)}
                            />
                            {errors.title_ar && <InputError message={errors.title_ar} />}

                            <InputLabel value="Frech title" isRequired />
                            <TextInput
                                placeholder="frech title"
                                value={data.title_fr}
                                onError={errors.title_fr}
                                onChange={(e) => setData("title_fr", e.target.value)}
                            />
                            {errors.title_fr && <InputError message={errors.title_fr} />}
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
