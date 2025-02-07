import { createContext, useEffect, useState } from "react";
import en from "../lang/en.json"; // Import English translations
import fr from "../lang/fr.json"; // Import French translations
import mar from "../lang/mar.json"; // Import Spanish translations

// Create Translation Context
export const TranslationContext = createContext();

export default function TranslationProvider({ children }) {
    // Load language from localStorage or default to English
    const [language, setLanguage] = useState(() => localStorage.getItem("lang") || "en");

    // Function to get correct translation file
    const getTranslations = (lang) => {
        switch (lang) {
            case "fr":
                return fr;
            case "mar":
                return mar;
            default:
                return en; // Default to English
        }
    };

    const [translations, setTranslations] = useState(getTranslations(language));

    // Function to switch language
    const switchLanguage = (lang) => {
        if (!["en", "fr", "mar"].includes(lang)) return; // Prevent invalid languages
        setLanguage(lang);
        setTranslations(getTranslations(lang));
        localStorage.setItem("lang", lang);
    };

    // Provide translations and function globally
    return (
        <TranslationContext.Provider value={{ translations, switchLanguage }}>{children}</TranslationContext.Provider>
    );
}
