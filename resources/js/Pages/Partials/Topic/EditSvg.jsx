import DropzoneInput from "@/Components/DropzoneInput";
import FloatInput from "@/Components/FloatInput";
import InputError from "@/Components/InputError";
import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head, useForm } from "@inertiajs/react";
import React from "react";

function EditSvg({ topic }) {
    const { data, setData, post, processing, errors, progress } = useForm({
        svg: null,
        _method: "PUT",
    });

    function handleFileSelect(file) {
        setData("svg", file); // Update the file in the form data
    }

    function submit(e) {
        e.preventDefault();
        post(route("topics.update_svg", topic.id)); // Submit the form
    }

    return (
        <AuthenticatedLayout header="Topics">
            <Head title={`Edit Topic Svg - ${topic.name}`} />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("topics.index")} active={route().current("topics.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to topics list
                    </NavLink>

                    <div className="flex gap-3">
                        <TitleSection title={`Edit ${topic.name} Svg`} />
                        <div className="w-16 aspect-square">
                            <img
                                className="w-full aspect-square object-contain"
                                src={`${import.meta.env.VITE_APP_URL}/${topic.svg}`}
                                alt={topic.name}
                            />
                        </div>
                    </div>
                </header>

                <div>
                    {/* Dropzone Component */}
                    <DropzoneInput
                        onFileSelect={handleFileSelect}
                        error={errors.svg}
                        progress={progress}
                        accept={{
                            "image/png": [],
                            "image/jpeg": [],
                            "image/jpg": [],
                        }}
                        maxFiles={1}
                    />

                    {/* Submit Button */}
                    <form onSubmit={submit}>
                        <PrimaryButton
                            type="submit"
                            disabled={processing || !data.svg} // Disable button if no file is selected
                            className="flex items-center gap-2"
                        >
                            {processing ? (
                                <>
                                    <i className="fa-solid fa-spinner animate-spin"></i>
                                    Processing...
                                </>
                            ) : (
                                "Save Changes"
                            )}
                        </PrimaryButton>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default EditSvg;
