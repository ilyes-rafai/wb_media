import HyperLink from "@/Components/HyperLink";
import { TranslationContext } from "@/contexts/TranslationProvider";
import React, { useContext, useEffect } from "react";
import TypeIt from "typeit";
import DeveloperSvg from "../Components/DeveloperSvg";
import SectionHeaderThree from "../Components/SectionHeaderThree";
import SectionHeaderTwo from "../Components/SectionHeaderTwo";

function Mentor() {
    useEffect(() => {
        const animations = [
            {
                selector: "#coding",
                strings: [
                    `<span class='text-ilyes'>const</span> session <span class='text-ilyes'>=</span> mentor <span class='text-ilyes'>+</span> you;`,
                    `<span class='text-ilyes'>console.log</span>(<span class='text-ilyes'>"Fast learning! ⚡"</span>);`,
                    `<br>`,
                    `<span class='text-ilyes'>try</span> {`,
                    `<span class='indent'>&ensp;&ensp;&ensp;&ensp;code();</span>`,
                    `<span class='text-ilyes'>} catch </span>(error) {`,
                    `<span class='indent'>&ensp;&ensp;&ensp;&ensp;mentor.fix(error);</span>`,
                    `<span class='indent'>&ensp;&ensp;&ensp;&ensp;console.log(<span class='text-ilyes'>"All good now! 😎"</span>);</span>`,
                    `<span class='text-ilyes'>}</span>`,
                ],
            },
        ];

        // Function to initialize TypeIt for each block
        const instances = animations.map(({ selector, strings }) => {
            return new TypeIt(selector, {
                strings,
                speed: 150,
                loop: true,
                waitUntilVisible: true,
            }).go();
        });

        // Cleanup function to destroy animations on unmount
        return () => instances.forEach((instance) => instance.destroy());
    }, []);

    const { translations } = useContext(TranslationContext);

    return (
        <section className="flex gap-12 flex-col lg:flex-row">
            <div className="flex-1">
                <SectionHeaderTwo title={translations.mentoring_title} className="mb-3" />
                <SectionHeaderThree title={translations.mentoring_subtitle} />

                <ul className="mt-6 mb-12 dark:text-slate-400 text-slate-500 text-balance sm:text-lg tracking-tight space-y-3">
                    {translations.mentoring_features.map((feature, index) => (
                        <li key={index} className="flex items-start gap-3">
                            <i className="fa-solid fa-check text-ilyes mt-1"></i>
                            <span>{feature}</span>
                        </li>
                    ))}
                </ul>

                <div className="flex">
                    <HyperLink href="https://wa.me/+212604457507" target="_blank">
                        <i className="fa-brands fa-whatsapp text-lg me-2"></i>
                        {translations.mentoring_cta}
                    </HyperLink>
                </div>
            </div>
            <div className="flex-1 grid place-content-center relative">
                <div className="w-full sm:w-96">
                    <DeveloperSvg />

                    <code
                        id="coding"
                        className="text-xs font-black hidden sm:block dark:text-slate-100 text-slate-800 code bg-black/10 backdrop-blur rounded-lg w-72 aspect-video absolute top-8 right-0"
                    ></code>
                </div>
            </div>
        </section>
    );
}

export default Mentor;
