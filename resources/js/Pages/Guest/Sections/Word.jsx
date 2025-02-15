import { TranslationContext } from "@/contexts/TranslationProvider";
import React, { useContext } from "react";
import SectionHeader from "../Components/SectionHeader";
import SectionHeaderTwo from "../Components/SectionHeaderTwo";
import SectionSubHeader from "../Components/SectionSubHeader";

function Word() {
    const { translations } = useContext(TranslationContext);

    return (
        <section className="">
            <div className="max-w-screen-md mx-auto">
                <SectionHeaderTwo title={translations.word_title} className="text-center" />

                <figure>
                    <SectionSubHeader className="text-center">
                        {translations.word_sub}{" "}
                        <span className="dark:text-slate-200 text-slate-800">{translations.word_inside}</span>
                    </SectionSubHeader>

                    <figcaption className="mt-6 flex items-center justify-center text-left rtl:text-right">
                        <img
                            src={`${import.meta.env.VITE_APP_URL}/img/brand/ilyes_rafai.jpg`}
                            alt="Ilyes Rafai"
                            className="w-20 h-20 rounded-full shadow-2xl shadow-ilyes/50"
                            loading="lazy"
                            decoding="async"
                        />
                        <div className="mx-2"></div>
                        <div>
                            <cite className="text-slate-900 font-semibold not-italic dark:text-white text-lg">
                                Ilyes Rafai
                            </cite>
                            <div className="mt-0.5 leading-6 dark:text-slate-400 text-slate-600">
                                {translations.word_creator}
                            </div>
                        </div>
                    </figcaption>
                </figure>
            </div>
        </section>
    );
}

export default Word;
