import Checkbox from "@/Components/Checkbox";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { useForm } from "@inertiajs/react";
import React from "react";

function AddOption({ question }) {
    const { data, setData, post, processing, errors } = useForm({
        title: "",
        question_id: question.id,
        is_correct: false,
    });

    function submit(e) {
        e.preventDefault();
        post(route("options.store"), {
            preserveScroll: true,
        });
    }

    return (
        <form onSubmit={submit} className="">
            <div className="mb-6">
                <InputLabel value="option" isRequired />
                <TextInput
                    placeholder="option"
                    value={data.title}
                    onError={errors.title}
                    onChange={(e) => setData("title", e.target.value)}
                />
                {errors.title && <InputError message={errors.title} />}
            </div>

            <div className="mb-6">
                <InputLabel value="is the correct option" isRequired />
                <Checkbox
                    checked={data.is_correct} // Use 'checked' to bind checkbox state
                    onChange={(e) => setData("is_correct", e.target.checked)} // Update with e.target.checked (true/false)
                />
                {errors.is_correct && <InputError message={errors.is_correct} />}
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
    );
}

export default AddOption;
