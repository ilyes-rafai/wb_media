import Checkbox from "@/Components/Checkbox";
import { useForm } from "@inertiajs/react";
import React from "react";

function HandleCorrectOption({ option }) {
    const { data, setData, put, processing, errors } = useForm({
        is_correct: option.is_correct == 1, // Simplified condition
    });

    return (
        <Checkbox
            checked={data.is_correct}
            onChange={(e) => {
                setData("is_correct", e.target.checked);
                put(route("options.handle_correct_option", option), {
                    preserveScroll: true,
                });
            }}
        />
    );
}

export default HandleCorrectOption;
