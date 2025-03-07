import Checkbox from "@/Components/Checkbox";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import TextArea from "@/Components/TextArea";
import TextInput from "@/Components/TextInput";
import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/Layout";
import { Head, useForm } from "@inertiajs/react";
import React from "react";

function Edit({ vocabulary }) {
    const { data, setData, put, processing, errors } = useForm({
        term: vocabulary.term || "",
        meaning: vocabulary.meaning || "",
        example: vocabulary.example || "",
    });

    function submit(e) {
        e.preventDefault();
        put(route("vocabularies.update", vocabulary));
    }

    return (
        <AuthenticatedLayout header="Vocabularies">
            <Head title={`Edit the term ${vocabulary.term}`} />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg _border">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <NavLink href={route("vocabularies.index")} active={route().current("vocabularies.index")}>
                        <i className="fa-solid fa-arrow-left-long me-2 text-lg"></i>
                        Back to vocabulary
                    </NavLink>
                    <TitleSection title={`Edit the term "${vocabulary.term}"`} />
                </header>

                <div className="">
                    <form onSubmit={submit}>
                        <div className="mb-6">
                            <InputLabel value="term" isRequired />
                            <TextInput
                                placeholder="term"
                                value={data.term}
                                onError={errors.term}
                                onChange={(e) => setData("term", e.target.value)}
                            />
                            {errors.term && <InputError message={errors.term} />}
                        </div>

                        <div className="mb-6">
                            <InputLabel value="meaning" />
                            <TextArea
                                rows="10"
                                placeholder="meaning"
                                value={data.meaning}
                                onError={errors.meaning}
                                onChange={(e) => setData("meaning", e.target.value)}
                            />
                            {errors.meaning && <InputError message={errors.meaning} />}
                        </div>

                        <div className="mb-6">
                            <InputLabel value="example" />
                            <TextArea
                                rows="10"
                                placeholder="example"
                                value={data.example}
                                onError={errors.example}
                                onChange={(e) => setData("example", e.target.value)}
                            />
                            {errors.example && <InputError message={errors.example} />}
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
