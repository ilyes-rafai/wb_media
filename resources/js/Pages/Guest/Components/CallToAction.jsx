import HyperLink from "@/Components/HyperLink";
import { TranslationContext } from "@/contexts/TranslationProvider";
import React, { useContext } from "react";
import SectionHeaderTwo from "./SectionHeaderTwo";
import SectionSubHeader from "./SectionSubHeader";

function CallToAction() {
    const { translations } = useContext(TranslationContext);

    const data = [
        {
            src: "0152",
        },
        {
            src: "654512",
        },
        {
            src: "5454121",
        },
        {
            src: "0545454",
        },
        {
            src: "56452132",
        },
    ];

    return (
        <div className="">
            <SectionHeaderTwo title={translations.cta_title} />

            <div className="flex items-center justify-between gap-3 flex-wrap mx-auto">
                <div className="flex flex-col text-left rtl:text-right">
                    <h2 className="dark:text-slate-200 text-slate-800 font-bold text-balance text-2xl mb-1">
                        {translations.cta_join}
                    </h2>
                    <div className="flex items-center flex-wrap gap-3">
                        <div className="flex items-center -space-x-4">
                            {data &&
                                data.map((img, index) => (
                                    <img
                                        key={index}
                                        src={`${import.meta.env.VITE_APP_URL}/img/index_members/${img.src}.jpg`}
                                        className="h-12 w-12 !rounded-full object-cover p-1 bg-white dark:bg-black"
                                    />
                                ))}
                        </div>
                        <SectionSubHeader className="!mb-0 rtl:ms-4">{translations.cta_members}</SectionSubHeader>
                    </div>
                </div>

                <HyperLink href="https://wa.me/+212604457507" target="_blank">
                    <i className="fa-brands fa-whatsapp text-lg me-2"></i>
                    {translations.cta_btn}
                </HyperLink>
            </div>
        </div>
    );
}

export default CallToAction;
