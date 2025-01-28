import Checkbox from "@/Components/Checkbox";
import { useForm } from "@inertiajs/react";
import React from "react";

function HandlePremium({ instruction }) {
    const { data, setData, put, processing, errors } = useForm({
        premium: instruction.premium == 1, // Simplified condition
    });

    function submit(e) {
        e.preventDefault();
        put(route("handleInstructionAvailability", instruction));
    }

    return (
        <Checkbox
            id="premium"
            checked={data.premium}
            onChange={(e) => {
                setData("premium", e.target.checked); // Update the form data
                put(route("handleInstructionAvailability", instruction)); // Submit the form immediately
            }}
        />
    );
}

export default HandlePremium;
