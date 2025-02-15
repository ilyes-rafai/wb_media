import React from "react";

function FormatDate({ wantedDate }) {
    const formatDate = (date, lang) => {
        const locales = {
            en: "en-GB", // English (UK) - DD/MM/YY
            fr: "fr-FR", // French - JJ/MM/AAAA
            mar: "ar-MA", // Moroccan Arabic - YYYY/MM/DD
            ar: "ar", // Standard Arabic - YYYY/MM/DD
        };

        return new Date(date)
            .toLocaleDateString(locales[lang] || "en-GB", {
                day: "2-digit",
                month: "short",
                year: "2-digit",
            })
            .toUpperCase();
    };

    const formatTime = (date, lang) => {
        const locales = {
            en: "en-GB",
            fr: "fr-FR",
            mar: "ar-MA",
            ar: "ar",
        };

        return new Date(date).toLocaleTimeString(locales[lang] || "en-GB", {
            hour: "2-digit",
            minute: "2-digit",
            hour12: false, // 24-hour format
        });
    };

    const lang = localStorage.getItem("lang") || "en";

    return (
        <div className="flex gap-2">
            <span className="text-xs font-semibold text-slate-500" title="Created at">
                {formatDate(wantedDate, lang)}
            </span>

            <span className="text-xs font-semibold text-slate-500">{formatTime(wantedDate, lang)}</span>
        </div>
    );
}

export default FormatDate;
