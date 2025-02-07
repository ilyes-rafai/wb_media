import Checkbox from "@/Components/Checkbox";
import { useForm } from "@inertiajs/react";
import React from "react";

function HandlePremium({ item, actionRoute }) {
    const { data, setData, put, processing, errors } = useForm({
        premium: item.premium == 1, // Simplified condition
    });

    return (
        <Checkbox
            checked={data.premium}
            onChange={(e) => {
                setData("premium", e.target.checked);
                put(route(actionRoute, item), {
                    preserveScroll: true,
                });
            }}
        />
    );
}

export default HandlePremium;
