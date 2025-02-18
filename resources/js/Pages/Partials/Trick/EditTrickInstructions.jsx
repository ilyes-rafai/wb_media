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

function EditTrickInstructions({ trick, createdBy }) {
    // add logic
    const { data, setData, post, processing, errors, reset } = useForm({
        title_en: "",
        title_ar: "",
        title_fr: "",
        description_en: "",
        description_ar: "",
        description_fr: "",
        code: "",
        trick_id: trick.id,
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
        <AuthenticatedLayout header="Tricks">
            <Head title="Edit Trick" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink
                        href={route("tricks.index")}
                        active={route().current("tricks.index")}
                    >
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to tricks list
                    </NavLink>
                    <TitleSection title="Instructions" />

                    <h3 className="text-xl my-6 font-bold leading-tight text-balance space-x-2 dark:text-slate-400 text-slate-600">
                        <sup className="text-ilyes">
                            <i className="fa-solid fa-quote-left"></i>
                        </sup>
                        <span>Trick :</span>
                        <span className="mx-2">{trick.title_en}</span>
                        <sub className="text-ilyes">
                            <i className="fa-solid fa-quote-right"></i>
                        </sub>
                    </h3>

                    <ButtonCircle icon="plus" action={openFormAddInstruction} />
                </header>

                {isFormAddInstructionOpen && (
                    <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                        <div className="flex justify-between items-center mb-6">
                            <h2 className="text-xl font-bold leading-tight dark:text-slate-400 text-slate-600">
                                Add new{" "}
                                <span className="dark:text-slate-200 text-slate-600">
                                    Instruction
                                </span>
                            </h2>
                            <ButtonCircle
                                icon="times"
                                action={closeFormAddInstruction}
                            />
                        </div>

                        <form onSubmit={submit}>
                            {/* TITLES INPUT */}
                            <div className="mb-16">
                                <div className="mb-6">
                                    <InputLabel
                                        value="instruction English title"
                                        isRequired
                                    />
                                    <TextInput
                                        placeholder="instruction english title"
                                        value={data.title_en}
                                        onError={errors.title_en}
                                        onChange={(e) =>
                                            setData("title_en", e.target.value)
                                        }
                                    />
                                    {errors.title_en && (
                                        <InputError message={errors.title_en} />
                                    )}
                                </div>
                                <div className="mb-6">
                                    <InputLabel
                                        value="instruction Arabic title"
                                        isRequired
                                    />
                                    <TextInput
                                        placeholder="instruction arabic title"
                                        value={data.title_ar}
                                        onError={errors.title_ar}
                                        onChange={(e) =>
                                            setData("title_ar", e.target.value)
                                        }
                                    />
                                    {errors.title_ar && (
                                        <InputError message={errors.title_ar} />
                                    )}
                                </div>
                                <div className="mb-6">
                                    <InputLabel
                                        value="instruction French title"
                                        isRequired
                                    />
                                    <TextInput
                                        placeholder="instruction french title"
                                        value={data.title_fr}
                                        onError={errors.title_fr}
                                        onChange={(e) =>
                                            setData("title_fr", e.target.value)
                                        }
                                    />
                                    {errors.title_fr && (
                                        <InputError message={errors.title_fr} />
                                    )}
                                </div>
                            </div>

                            {/* DESCRIPTION INPUT */}
                            <div className="mb-16">
                                <div className="mb-6">
                                    <InputLabel value="instruction English description" />
                                    <TextArea
                                        placeholder="instruction english description"
                                        value={data.description_en}
                                        onError={errors.description_en}
                                        onChange={(e) =>
                                            setData(
                                                "description_en",
                                                e.target.value
                                            )
                                        }
                                    />
                                    {errors.description_en && (
                                        <InputError
                                            message={errors.description_en}
                                        />
                                    )}
                                </div>
                                <div className="mb-6">
                                    <InputLabel value="instruction Arabic description" />
                                    <TextArea
                                        placeholder="instruction arabic description"
                                        value={data.description_ar}
                                        onError={errors.description_ar}
                                        onChange={(e) =>
                                            setData(
                                                "description_ar",
                                                e.target.value
                                            )
                                        }
                                    />
                                    {errors.description_ar && (
                                        <InputError
                                            message={errors.description_ar}
                                        />
                                    )}
                                </div>
                                <div className="mb-6">
                                    <InputLabel value="instruction French description" />
                                    <TextArea
                                        placeholder="instruction french description"
                                        value={data.description_fr}
                                        onError={errors.description_fr}
                                        onChange={(e) =>
                                            setData(
                                                "description_fr",
                                                e.target.value
                                            )
                                        }
                                    />
                                    {errors.description_fr && (
                                        <InputError
                                            message={errors.description_fr}
                                        />
                                    )}
                                </div>
                            </div>

                            <div className="mb-6">
                                <InputLabel value="instruction code" />
                                <TextArea
                                    rows="10"
                                    placeholder="instruction code"
                                    value={data.code}
                                    onError={errors.code}
                                    onChange={(e) =>
                                        setData("code", e.target.value)
                                    }
                                />
                                {errors.code && (
                                    <InputError message={errors.code} />
                                )}
                            </div>

                            <div className="mb-6">
                                <div className="mb-6">
                                    <InputLabel value="premium" />
                                    <Checkbox
                                        id="premium"
                                        checked={data.premium}
                                        onChange={(e) =>
                                            setData("premium", e.target.checked)
                                        } // Pass boolean value
                                        label="premium"
                                    />
                                    {errors.premium && (
                                        <InputError message={errors.premium} />
                                    )}
                                </div>
                            </div>

                            <PrimaryButton
                                type="submit"
                                className="flex items-center gap-2"
                            >
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
                    {trick.instructions &&
                        trick.instructions.map((instruction) => (
                            <InstructionCard
                                instruction={instruction}
                                key={instruction.id}
                            />
                        ))}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default EditTrickInstructions;
