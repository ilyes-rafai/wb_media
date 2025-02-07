import { TranslationContext } from "@/contexts/TranslationProvider";
import React, { useContext } from "react";
import SectionHeader from "../Components/SectionHeader";
import SectionHeaderTwo from "../Components/SectionHeaderTwo";
import SectionSubHeader from "../Components/SectionSubHeader";

function Topics() {
    const topics = [
        { icon: "html5" },
        { icon: "css3" },
        { icon: "js" },
        { icon: "sass" },
        { icon: "react" },
        { icon: "vuejs" },
        { icon: "angular" },
        { icon: "node" },
        { icon: "bootstrap" },
        { icon: "php" },
        { icon: "laravel" },
        { icon: "python" },
        { icon: "linux" },
        { icon: "windows" },
        { icon: "git" },
    ];

    const { translations } = useContext(TranslationContext);

    return (
        <div>
            <SectionHeaderTwo title={translations.services_title} className="text-center" />
            <SectionSubHeader className="text-center">{translations.services_sub}</SectionSubHeader>

            {/* <div className="_ticker_container">
                <div className="_ticker_wrapper">
                    {topics &&
                        topics.map((topic) => (
                            <div className="_ticker_item">
                                <div
                                    className={`bg-clip-text text-transparent bg-gradient-to-b from-slate-800 via-slate-700 to-slate-950 text-5xl sm:text-6xl md:text-7xl lg:text-8xl`}
                                >
                                    <i className={`fa-brands fa-${topic.icon}`}></i>
                                </div>
                            </div>
                        ))}
                </div>
            </div> */}

            <div className="overflow-hidden whitespace-nowrap relative w-full h-24">
                <div className="inline-flex animate-ticker" style={{ width: "200%" }}>
                    {topics &&
                        [...topics, ...topics].map(
                            (
                                topic,
                                index // Duplicate for seamless scrolling
                            ) => (
                                <div className="inline-block mx-6" key={index}>
                                    <div className="bg-clip-text text-transparent bg-gradient-to-b from-ilyes/40 via-ilyes/20 to-ilyes/40 text-6xl md:text-7xl lg:text-8xl hover:bg-ilyes transition duration-300">
                                        <i className={`fa-brands fa-${topic.icon}`}></i>
                                    </div>
                                </div>
                            )
                        )}
                </div>
            </div>
        </div>
    );
}

export default Topics;
