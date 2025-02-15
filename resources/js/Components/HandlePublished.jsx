import Checkbox from "@/Components/Checkbox";
import { useForm } from "@inertiajs/react";
import React from "react";

function HandlePublished({ item, actionRoute }) {
    const { data, setData, put, processing, errors } = useForm({
        is_published: item.is_published == 1, // Simplified condition
    });

    return (
        <Checkbox
            checked={data.is_published}
            onChange={(e) => {
                setData("is_published", e.target.checked);
                put(route(actionRoute, item), {
                    preserveScroll: true,
                });
            }}
        />
    );
}

export default HandlePublished;
