import ButtonCircle from "@/Components/ButtonCircle";
import Checkbox from "@/Components/Checkbox";
import InputError from "@/Components/InputError";
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
import { QuestionCard } from "./Question/Questioncard";

function EditQuizQuestions({ quiz }) {
    // add logic
    const { data, setData, post, processing, errors, reset } = useForm({
        title_en: "",
        title_ar: "",
        title_fr: "",
        quiz_id: quiz.id,
    });

    // State for modal visibility
    const [isFormAddQuestionOpen, setIsFormAddQuestionOpen] = useState(false);

    // Open modal form
    const openFormAddQuestion = () => {
        setIsFormAddQuestionOpen(true);
    };

    // Close modal form and reset data
    const closeFormAddQuestion = () => {
        reset(); // Reset form fields
        setIsFormAddQuestionOpen(false); // Close the form modal
    };

    // Submit form
    function submit(e) {
        e.preventDefault();
        post(route("questions.store"), {
            preserveScroll: true,
            onSuccess: () => {
                closeFormAddQuestion(); // Close the form and reset after successful submission
            },
        });
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
                    <TitleSection title="Questions" />

                    <h3 className="text-xl my-6 font-bold leading-tight text-balance space-x-2 dark:text-slate-400 text-slate-600">
                        <sup className="text-ilyes">
                            <i className="fa-solid fa-quote-left"></i>
                        </sup>
                        <span>Quiz :</span>
                        <span className="mx-2">{quiz.title_en}</span>
                        <sub className="text-ilyes">
                            <i className="fa-solid fa-quote-right"></i>
                        </sub>
                    </h3>

                    <ButtonCircle icon="plus" action={openFormAddQuestion} />
                </header>

                {isFormAddQuestionOpen && (
                    <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                        <div className="flex justify-between items-center mb-6">
                            <h2 className="text-xl font-bold leading-tight dark:text-slate-400 text-slate-600">
                                Add new <span className="dark:text-slate-200 text-slate-600">Question</span>
                            </h2>
                            <ButtonCircle icon="times" action={closeFormAddQuestion} />
                        </div>

                        <form onSubmit={submit}>
                            <div className="mb-14">
                                <InputLabel value="question english title" isRequired />
                                <TextInput
                                    placeholder="question english title"
                                    value={data.title_en}
                                    onError={errors.title_en}
                                    onChange={(e) => setData("title_en", e.target.value)}
                                />
                                {errors.title_en && <InputError message={errors.title_en} />}
                                <InputLabel value="question arabic title" isRequired />
                                <TextInput
                                    placeholder="question arabic title"
                                    value={data.title_ar}
                                    onError={errors.title_ar}
                                    onChange={(e) => setData("title_ar", e.target.value)}
                                />
                                {errors.title_ar && <InputError message={errors.title_ar} />}
                                <InputLabel value="question french title" isRequired />
                                <TextInput
                                    placeholder="question french title"
                                    value={data.title_fr}
                                    onError={errors.title_fr}
                                    onChange={(e) => setData("title_fr", e.target.value)}
                                />
                                {errors.title_fr && <InputError message={errors.title_fr} />}
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

                <div className="grid grid-cols-1 gap-6">
                    {quiz.questions &&
                        quiz.questions.map((question) => <QuestionCard question={question} key={question.id} />)}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default EditQuizQuestions;
