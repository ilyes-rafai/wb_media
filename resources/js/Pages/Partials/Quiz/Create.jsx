import Checkbox from "@/Components/Checkbox";
import CustomSelect from "@/Components/CustomSelect";
import FloatInput from "@/Components/FloatInput";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import Radio from "@/Components/Radio";
import SearchableSelect from "@/Components/SearchableSelect";
import TextArea from "@/Components/TextArea";
import TextInput from "@/Components/TextInput";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head, useForm } from "@inertiajs/react";
import React, { useState } from "react";

function Create({ topics }) {
    // add logic
    const { data, setData, post, processing, errors } = useForm({
        topic_id: "",
        title: "",
        description: "",
        difficulty: "",
        is_published: false,
    });

    // Handle the selected topic change
    const handleChangeTopic = (value) => {
        setData("topic_id", value); // Update topic_id when a topic is selected
    };

    function submit(e) {
        e.preventDefault();
        post(route("quizzes.store"));
    }

    return (
        <AuthenticatedLayout header="Quizzes">
            <Head title="Create Quiz" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("quizzes.index")} active={route().current("quizzes.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to quizzes list
                    </NavLink>
                    <TitleSection title="Create new Quiz" />
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
                            <InputLabel value="Select a topic" isRequired />
                            <SearchableSelect
                                data={topics}
                                columns={["name"]}
                                selectedValue={data.topic_id}
                                onChange={handleChangeTopic}
                            />
                            {errors.topic_id && <InputError message={errors.topic_id} />}
                        </div>

                        <div className="mb-6">
                            <InputLabel value="description" />
                            <TextArea
                                placeholder="description"
                                value={data.description}
                                onError={errors.description}
                                onChange={(e) => setData("description", e.target.value)}
                            />
                            {errors.description && <InputError message={errors.description} />}
                        </div>

                        <div className="mb-6">
                            <InputLabel value="difficulty" isRequired />
                            <div className="flex gap-4">
                                <Radio
                                    label="Easy"
                                    id="Easy"
                                    name="difficulty"
                                    value="1"
                                    checked={data.difficulty === "1"}
                                    onChange={(e) => setData("difficulty", e.target.value)} // Set value to 1 for "easy"
                                />

                                <Radio
                                    label="Medium"
                                    id="Medium"
                                    name="difficulty"
                                    value="2"
                                    checked={data.difficulty === "2"}
                                    onChange={(e) => setData("difficulty", e.target.value)} // Set value to 2 for "medium"
                                />

                                <Radio
                                    label="Hard"
                                    id="Hard"
                                    name="difficulty"
                                    value="3"
                                    checked={data.difficulty === "3"}
                                    onChange={(e) => setData("difficulty", e.target.value)} // Set value to 3 for "hard"
                                />
                            </div>

                            {errors.difficulty && <InputError message={errors.difficulty} />}
                        </div>

                        <div className="mb-6">
                            <div className="mb-6">
                                <InputLabel value="is published" />
                                <Checkbox
                                    id="is_published"
                                    checked={data.is_published}
                                    onChange={(e) => setData("is_published", e.target.checked)} // Pass boolean value
                                />
                                {errors.is_published && <InputError message={errors.is_published} />}
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

export default Create;
