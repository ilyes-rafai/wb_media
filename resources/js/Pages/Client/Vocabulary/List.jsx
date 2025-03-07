import Breadcrumb from "@/Components/Breadcrumb";
import TitleSection from "@/Components/TitleSection";
import { TranslationContext } from "@/contexts/TranslationProvider";
import Layout from "@/Layouts/Layout";
import { Head } from "@inertiajs/react";
import React, { useContext, useState } from "react";

function List({ vocabularies }) {
    const { translations } = useContext(TranslationContext);

    // Flatten the vocabularies object into an array for easier navigation
    const allVocabList = Object.values(vocabularies).flat();

    const [openMeaning, setOpenMeaning] = useState(false);
    const [currentIndex, setCurrentIndex] = useState(null);
    const [selectedVocab, setSelectedVocab] = useState({ term: "", meaning: "", example: "" });

    const handleClick = (vocab) => {
        const index = allVocabList.findIndex((item) => item.id === vocab.id);
        setCurrentIndex(index);
        setSelectedVocab(vocab);
        setOpenMeaning(true);
    };

    const handleNext = () => {
        if (currentIndex !== null) {
            const newIndex = (currentIndex + 1) % allVocabList.length; // Loop back to first
            setCurrentIndex(newIndex);
            setSelectedVocab(allVocabList[newIndex]);
        }
    };

    const handlePrevious = () => {
        if (currentIndex !== null) {
            const newIndex = (currentIndex - 1 + allVocabList.length) % allVocabList.length; // Loop back to last
            setCurrentIndex(newIndex);
            setSelectedVocab(allVocabList[newIndex]);
        }
    };

    return (
        <Layout>
            <Head title={translations.list_of_vocabulary} />

            <div className="p-3 sm:p-6 rounded-lg _border">
                <Breadcrumb
                    routes={[
                        { href: route("dashboard"), label: translations.home },
                        { label: translations.list_of_vocabulary },
                    ]}
                />
                <header className="mb-3 sm:mb-6 flex flex-col md:flex-row justify-between md:items-center gap-6 md:gap-0">
                    <TitleSection title={translations.list_of_vocabulary} />
                </header>

                <div className="grid grid-cols-1 lg:grid-cols-5 gap-12">
                    {Object.keys(vocabularies)
                        .sort()
                        .map((letter) => (
                            <div key={letter}>
                                <h2 className="text-2xl font-bold text-ilyes">{letter}</h2>
                                <ul className="mt-2 space-y-1">
                                    {vocabularies[letter].map((vocab) => (
                                        <li
                                            key={vocab.id}
                                            className="text-slate-700 dark:text-slate-300 hover:underline cursor-pointer"
                                            onClick={() => handleClick(vocab)}
                                        >
                                            {vocab.term}
                                        </li>
                                    ))}
                                </ul>
                            </div>
                        ))}
                </div>
            </div>

            {/* Meaning Section */}
            <div
                className={`_border fixed w-full p-6 lg:p-12 dark:bg-black/10 bg-white/10 backdrop-blur h-[60vh] left-0 text-slate-700 dark:text-slate-300 transition-all duration-500 ${
                    openMeaning ? "bottom-0" : "-bottom-full"
                }`}
            >
                <span
                    className="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-ilyes w-8 h-8 flex justify-center items-center text-white rounded-full cursor-pointer"
                    onClick={() => setOpenMeaning(false)}
                >
                    <i className="fa-solid fa-times"></i>
                </span>

                <p className="text-xl">{selectedVocab.term || "Term"}</p>
                <p className="text-2xl text-slate-800 dark:text-slate-200 mb-3">{selectedVocab.meaning || "Meaning"}</p>
                <span>Example:</span>
                <p className="text-slate-800 dark:text-slate-200">{selectedVocab.example || "Example"}</p>

                {/* Navigation for Next & Previous Terms */}
                <div className="flex flex-col items-start gap-3 mt-12">
                    <div
                        className="flex justify-center items-center gap-3 text-white rounded-full cursor-pointer"
                        onClick={handleNext}
                    >
                        <i className="fa-solid fa-angle-right text-ilyes"></i>
                        <span className="text-slate-800 dark:text-slate-200 hover:text-ilyes dark:hover:text-ilyes transition duration-300">
                            {allVocabList[(currentIndex + 1) % allVocabList.length]?.term}
                        </span>
                    </div>
                    <div
                        className="flex justify-center items-center gap-3 text-white rounded-full cursor-pointer"
                        onClick={handlePrevious}
                    >
                        <i className="fa-solid fa-angle-left text-ilyes"></i>
                        <span className="text-slate-800 dark:text-slate-200 hover:text-ilyes dark:hover:text-ilyes transition duration-300">
                            {allVocabList[(currentIndex - 1 + allVocabList.length) % allVocabList.length]?.term}
                        </span>
                    </div>
                </div>
            </div>
        </Layout>
    );
}

export default List;
