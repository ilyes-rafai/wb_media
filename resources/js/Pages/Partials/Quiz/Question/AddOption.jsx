import Checkbox from "@/Components/Checkbox";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { useForm } from "@inertiajs/react";
import React from "react";

function AddOption({ question }) {
    const { data, setData, post, processing, errors } = useForm({
        title_en: "",
        title_ar: "",
        title_fr: "",
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
            <div className="mb-14">
                <InputLabel value="option in english" isRequired />
                <TextInput
                    placeholder="option in english"
                    value={data.title_en}
                    onError={errors.title_en}
                    onChange={(e) => setData("title_en", e.target.value)}
                />
                {errors.title_en && <InputError message={errors.title_en} />}
                <InputLabel value="option in arabic" isRequired />
                <TextInput
                    placeholder="option in arabic"
                    value={data.title_ar}
                    onError={errors.title_ar}
                    onChange={(e) => setData("title_ar", e.target.value)}
                />
                {errors.title_ar && <InputError message={errors.title_ar} />}
                <InputLabel value="option in french" isRequired />
                <TextInput
                    placeholder="option in french"
                    value={data.title_fr}
                    onError={errors.title_fr}
                    onChange={(e) => setData("title_fr", e.target.value)}
                />
                {errors.title_fr && <InputError message={errors.title_fr} />}
            </div>

            <div className="mb-14">
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
