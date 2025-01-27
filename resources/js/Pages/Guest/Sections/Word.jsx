import React from "react";
import SectionHeader from "../Components/SectionHeader";
import SectionSubHeader from "../Components/SectionSubHeader";

function Word() {
    return (
        <section className="">
            <div className="max-w-screen-md mx-auto">
                <SectionHeader title="Code Inspire 🔥" className="text-center" />

                <figure>
                    <SectionSubHeader className="text-center">
                        I've created Webilymedia to empower individuals in the world of coding and to ignite their
                        inspiration for crafting remarkable digital innovations. Join our family of creative minds as we
                        embark on this exciting journey together.
                    </SectionSubHeader>

                    <figcaption className="mt-6 flex items-center justify-center space-x-4 text-left relative">
                        <div className="absolute bottom-0 left-[50%] top-[50%] h-[250px] w-[250px] translate-x-[-90%] translate-y-[-50%] z-[-1] rounded-full bg-[radial-gradient(circle_farthest-side,rgba(0,190,0,.15),rgba(255,255,255,0))]"></div>
                        <img
                            src={`${import.meta.env.VITE_APP_URL}/img/brand/ilyes_rafai.jpg`}
                            alt="Ilyes Rafai"
                            className="w-14 h-14 rounded-full"
                            loading="lazy"
                            decoding="async"
                        />
                        <div>
                            <cite className="text-slate-900 font-semibold not-italic dark:text-white">Ilyes Rafai</cite>
                            <div className="mt-0.5 text-sm leading-6 dark:text-slate-400 text-slate-600">
                                Creator of Webilymedia
                            </div>
                        </div>
                    </figcaption>
                </figure>
            </div>
        </section>
    );
}

export default Word;
