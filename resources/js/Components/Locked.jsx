import { TranslationContext } from "@/contexts/TranslationProvider";
import React, { useContext } from "react";

function Locked() {
    const { translations } = useContext(TranslationContext);

    return (
        <span className="text-ilyes text-xs font-semibold">
            <i className="fa-solid fa-lock me-2"></i>
            {translations.locked_content}
        </span>
    );
}

export default Locked;
