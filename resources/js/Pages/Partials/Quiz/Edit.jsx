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
import React, { useEffect, useState } from "react";

function Edit({ quiz, topics }) {
    // add logic
    const { data, setData, put, processing, errors } = useForm({
        title: quiz.title_en || "",
        title: quiz.title_ar || "",
        title: quiz.title_fr || "",
        is_published: quiz.is_published == 1 ? true : false,
        topic_id: quiz.topic_id || "",
        description: quiz.description_en || "",
        description: quiz.description_ar || "",
        description: quiz.description_fr || "",
        difficulty: quiz.difficulty || "",
    });

    const handleChangeTopic = (value) => {
        setData("topic_id", value); // Update topic_id when a topic is selected
    };

    function submit(e) {
        e.preventDefault();
        put(route("quizzes.update", quiz));
    }

    return (
        <AuthenticatedLayout header="Quizzes">
            <Head title="Edit Quiz" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("quizzes.index")} active={route().current("quizzes.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to quizzes list
                    </NavLink>
                    <TitleSection title="Edit Quiz" />
                </header>

                <div className="">
                    <form onSubmit={submit}>
                        <div className="mb-14">
                            <InputLabel value="title_en" isRequired />
                            <TextInput
                                placeholder="title_en"
                                value={data.title_en}
                                onError={errors.title_en}
                                onChange={(e) => setData("title_en", e.target.value)}
                            />
                            {errors.title_en && <InputError message={errors.title_en} />}
                            <InputLabel value="title_ar" isRequired />
                            <TextInput
                                placeholder="title_ar"
                                value={data.title_ar}
                                onError={errors.title_ar}
                                onChange={(e) => setData("title_ar", e.target.value)}
                            />
                            {errors.title_ar && <InputError message={errors.title_ar} />}
                            <InputLabel value="title_fr" isRequired />
                            <TextInput
                                placeholder="title_fr"
                                value={data.title_fr}
                                onError={errors.title_fr}
                                onChange={(e) => setData("title_fr", e.target.value)}
                            />
                            {errors.title_fr && <InputError message={errors.title_fr} />}
                        </div>

                        {/* topics */}
                        <div className="mb-14">
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
                            <InputLabel value="description_en" />
                            <TextArea
                                placeholder="description_en"
                                value={data.description_en}
                                onError={errors.description_en}
                                onChange={(e) => setData("description_en", e.target.value)}
                            />
                            {errors.description_en && <InputError message={errors.description_en} />}
                            <InputLabel value="description_ar" />
                            <TextArea
                                placeholder="description_ar"
                                value={data.description_ar}
                                onError={errors.description_ar}
                                onChange={(e) => setData("description_ar", e.target.value)}
                            />
                            {errors.description_ar && <InputError message={errors.description_ar} />}
                            <InputLabel value="description_fr" />
                            <TextArea
                                placeholder="description_fr"
                                value={data.description_fr}
                                onError={errors.description_fr}
                                onChange={(e) => setData("description_fr", e.target.value)}
                            />
                            {errors.description_fr && <InputError message={errors.description_fr} />}
                        </div>

                        <div className="mb-14">
                            <InputLabel value="difficulty" isRequired />
                            <div className="flex gap-4">
                                <Radio
                                    label="Easy"
                                    id="Easy"
                                    name="difficulty"
                                    value="1"
                                    checked={data.difficulty == "1"}
                                    onChange={(e) => setData("difficulty", e.target.value)} // Set value to 1 for "easy"
                                />

                                <Radio
                                    label="Medium"
                                    id="Medium"
                                    name="difficulty"
                                    value="2"
                                    checked={data.difficulty == "2"}
                                    onChange={(e) => setData("difficulty", e.target.value)} // Set value to 2 for "medium"
                                />

                                <Radio
                                    label="Hard"
                                    id="Hard"
                                    name="difficulty"
                                    value="3"
                                    checked={data.difficulty == "3"}
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

export default Edit;
