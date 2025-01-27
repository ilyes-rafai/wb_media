import ButtonCircle from "@/Components/ButtonCircle";
import Checkbox from "@/Components/Checkbox";
import InputError from "@/Components/InputError";
import InputFile from "@/Components/InputFile";
import InputLabel from "@/Components/InputLabel";
import Modal from "@/Components/Modal";
import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TextArea from "@/Components/TextArea";
import TextInput from "@/Components/TextInput";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head, useForm } from "@inertiajs/react";
import React, { useEffect, useState } from "react";
import { ChapterCard } from "../Chapter/ChapterCard";

function EditCourseChapters({ course, createdBy }) {
    // add logic
    const { data, setData, post, processing, errors, reset, progress } = useForm({
        title: "",
        description: "",
        episode: null,
        cover: null,
        course_id: course.id,
        premium: false,
    });

    // State for modal visibility
    const [isFormAddChapterOpen, setIsFormAddChapterOpen] = useState(false);

    // Open modal form
    const openFormAddChapter = () => {
        setIsFormAddChapterOpen(true);
    };

    // Close modal form and reset data
    const closeFormAddChapter = () => {
        reset(); // Reset form fields
        setIsFormAddChapterOpen(false); // Close the form modal
    };

    // Submit form
    function submit(e) {
        e.preventDefault();
        post(route("chapters.store"), {
            onSuccess: () => {
                closeFormAddChapter(); // Close the form and reset after successful submission
            },
        });
    }

    return (
        <AuthenticatedLayout header="Courses">
            <Head title="Edit Course" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-slate-200 dark:border-slate-800">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("courses.index")} active={route().current("courses.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to courses list
                    </NavLink>
                    <TitleSection title="Chapters" />

                    <h3 className="text-xl my-6 font-bold leading-tight text-balance space-x-2 dark:text-slate-400 text-slate-600">
                        <sup className="text-ilyes">
                            <i className="fa-solid fa-quote-left"></i>
                        </sup>
                        <span>Course :</span>
                        <span className="mx-2">{course.title}</span>
                        <sub className="text-ilyes">
                            <i className="fa-solid fa-quote-right"></i>
                        </sub>
                    </h3>

                    <ButtonCircle icon="plus" action={openFormAddChapter} />
                </header>

                {isFormAddChapterOpen && (
                    <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-slate-200 dark:border-slate-800">
                        <div className="flex justify-between items-center mb-6">
                            <h2 className="text-xl font-bold leading-tight dark:text-slate-400 text-slate-600">
                                Add new <span className="dark:text-slate-200 text-slate-600">Chapter</span>
                            </h2>
                            <ButtonCircle icon="times" action={closeFormAddChapter} />
                        </div>

                        <form onSubmit={submit}>
                            <div className="mb-6">
                                <InputLabel value="chapter title" isRequired />
                                <TextInput
                                    placeholder="chapter title"
                                    value={data.title}
                                    onError={errors.title}
                                    onChange={(e) => setData("title", e.target.value)}
                                />
                                {errors.title && <InputError message={errors.title} />}
                            </div>

                            <div className="mb-6">
                                <InputLabel value="chapter description" />
                                <TextArea
                                    placeholder="chapter description"
                                    value={data.description}
                                    onError={errors.description}
                                    onChange={(e) => setData("description", e.target.value)}
                                />
                                {errors.description && <InputError message={errors.description} />}
                            </div>

                            <div className="grid sm:grid-cols-2 gap-6 mb-6">
                                <div className="">
                                    <InputLabel value="episode" isRequired />
                                    <InputFile
                                        accept=".mp4,.webm,.ogg,.avi,.mpeg,.quicktime,.mkv"
                                        onChange={(e) => setData("episode", e.target.files[0])}
                                    />
                                    {errors.episode && <InputError message={errors.episode} />}
                                </div>

                                <div className="">
                                    <InputLabel value="cover" isRequired />

                                    <InputFile
                                        accept=".jpg, .jpeg, .png"
                                        onChange={(e) => setData("cover", e.target.files[0])}
                                    />
                                    {errors.cover && <InputError message={errors.cover} />}
                                </div>
                            </div>

                            {progress && (
                                <div className="mb-4">
                                    <progress
                                        value={progress.percentage}
                                        max="100"
                                        className="w-full h-2 rounded-lg bg-slate-200 dark:bg-slate-700"
                                    >
                                        {progress.percentage}%
                                    </progress>
                                    <span className="text-sm font-medium text-slate-500 dark:text-slate-400">
                                        {progress.percentage}%
                                    </span>
                                </div>
                            )}

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
                )}

                <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {course.chapters &&
                        course.chapters.map((chapter) => <ChapterCard chapter={chapter} key={chapter.id} />)}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default EditCourseChapters;
