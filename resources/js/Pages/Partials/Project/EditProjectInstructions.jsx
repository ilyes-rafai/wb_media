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
import { InstructionCard } from "../Instruction/InstructionCard";

function EditProjectInstructions({ project, createdBy }) {
    // add logic
    const { data, setData, post, processing, errors, reset } = useForm({
        title: "",
        description: "",
        code: "",
        project_id: project.id,
        premium: false,
    });

    // State for modal visibility
    const [isFormAddInstructionOpen, setIsFormAddInstructionOpen] = useState(false);

    // Open modal form
    const openFormAddInstruction = () => {
        setIsFormAddInstructionOpen(true);
    };

    // Close modal form and reset data
    const closeFormAddInstruction = () => {
        reset(); // Reset form fields
        setIsFormAddInstructionOpen(false); // Close the form modal
    };

    // Submit form
    function submit(e) {
        e.preventDefault();
        post(route("instructions.store"), {
            onSuccess: () => {
                closeFormAddInstruction(); // Close the form and reset after successful submission
            },
        });
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
                    <TitleSection title="Instructions" />

                    <h3 className="text-xl my-6 font-bold leading-tight text-balance space-x-2 dark:text-slate-400 text-slate-600">
                        <sup className="text-ilyes">
                            <i className="fa-solid fa-quote-left"></i>
                        </sup>
                        <span>Project :</span>
                        <span className="mx-2">{project.title}</span>
                        <sub className="text-ilyes">
                            <i className="fa-solid fa-quote-right"></i>
                        </sub>
                    </h3>

                    <ButtonCircle icon="plus" action={openFormAddInstruction} />
                </header>

                {isFormAddInstructionOpen && (
                    <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-slate-200 dark:border-slate-800">
                        <div className="flex justify-between items-center mb-6">
                            <h2 className="text-xl font-bold leading-tight dark:text-slate-400 text-slate-600">
                                Add new <span className="dark:text-slate-200 text-slate-600">Instruction</span>
                            </h2>
                            <ButtonCircle icon="times" action={closeFormAddInstruction} />
                        </div>

                        <form onSubmit={submit}>
                            <div className="mb-6">
                                <InputLabel value="instruction title" isRequired />
                                <TextInput
                                    placeholder="instruction title"
                                    value={data.title}
                                    onError={errors.title}
                                    onChange={(e) => setData("title", e.target.value)}
                                />
                                {errors.title && <InputError message={errors.title} />}
                            </div>

                            <div className="mb-6">
                                <InputLabel value="instruction description" />
                                <TextArea
                                    placeholder="instruction description"
                                    value={data.description}
                                    onError={errors.description}
                                    onChange={(e) => setData("description", e.target.value)}
                                />
                                {errors.description && <InputError message={errors.description} />}
                            </div>

                            <div className="mb-6">
                                <InputLabel value="instruction code" />
                                <TextArea
                                    rows="10"
                                    placeholder="instruction code"
                                    value={data.code}
                                    onError={errors.code}
                                    onChange={(e) => setData("code", e.target.value)}
                                />
                                {errors.code && <InputError message={errors.code} />}
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
                    {project.instructions &&
                        project.instructions.map((instruction) => (
                            <InstructionCard instruction={instruction} key={instruction.id} />
                        ))}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default EditProjectInstructions;
