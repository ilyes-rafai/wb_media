import React, { useEffect } from "react";
import TypeIt from "typeit";
import SectionHeader from "../Components/SectionHeader";
import SectionSubHeader from "../Components/SectionSubHeader";
function Hero() {
    useEffect(() => {
        // TypeIt animations
        new TypeIt("#htmlCode", {
            strings: [
                `<span class='text-ilyes'>&lt;h1&gt;</span>This is a title<span class='text-ilyes'>&lt;/h1&gt;</span>`,
                `<span class='text-ilyes'>&lt;p&gt;</span>Hi, Webilymedia<span class='text-ilyes'>&lt;/p&gt;</span>`,
            ],
            speed: 100,
            loop: true,
        }).go();

        new TypeIt("#scssCode", {
            strings: [
                `$color: <span class='text-violet-500'>#00E472</span>;`,
                `<span class='text-ilyes'>.class {</span>`,
                `&ensp;&ensp;color: $color;`,
                `&ensp;&ensp;font-size: <span class='text-yellow-500'>1.2</span><span class='text-ilyes'>rem</span>;`,
                `<span class='text-ilyes'>}</span>`,
            ],
            speed: 100,
            loop: true,
        }).go();

        new TypeIt("#jsCode", {
            strings: [
                `<span class='text-ilyes'>function</span> sayHello<span class='text-yellow-500'>(</span>name<span class='text-yellow-500'>)</span> {`,
                `&ensp;&ensp;console.log<span class='text-yellow-500'>(</span>&ldquo;hello&ldquo;, name<span class='text-yellow-500'>)</span>;`,
                `}`,
                `sayHello<span class='text-yellow-500'>(</span>'Webilymedia'<span class='text-yellow-500'>)</span>;`,
            ],
            speed: 100,
            loop: true,
        }).go();
    }, []);

    return (
        <div className="min-h-[70vh] flex flex-col items-center justify-center gap-4">
            <div className="">
                <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <SectionHeader title="Online mentoring &amp; collaboration" span="." />

                        <SectionSubHeader>
                            Learn at your own pace with high-quality tutorials, project source codes, and a passionate
                            community, to build your skills effectively!
                        </SectionSubHeader>
                        <a
                            href="#_"
                            className="px-5 py-2.5 text-lg relative rounded group overflow-hidden font-medium bg-white dark:bg-slate-900 text-ilyes inline-block"
                        >
                            <span className="absolute top-0 left-0 flex w-full h-0 mb-0 transition-all duration-300 ease-out transform translate-y-0 bg-ilyes group-hover:h-full opacity-90"></span>
                            <span className="relative group-hover:text-slate-800">Button Text</span>
                        </a>
                    </div>
                    <div className="relative space-y-8">
                        <div className="dark:bg-slate-950 border bg-white p-4 w-64 h-40 rounded-lg border-slate-200 dark:border-slate-800">
                            <div className="mb-4 flex justify-between items-center text-xs pb-4 border-b border-slate-950/10 dark:border-slate-50/[0.06]">
                                <div className="">
                                    <i className="fa-brands fa-html5 text-orange-500"></i>
                                    <span className="ms-2 font-bold uppercase dark:text-slate-100 text-slate-800">
                                        html
                                    </span>
                                </div>
                                <div className="flex gap-1">
                                    <div className="w-2 h-2 dark:bg-slate-700 bg-slate-300 rounded-full"></div>
                                    <div className="w-2 h-2 dark:bg-slate-700 bg-slate-300 rounded-full"></div>
                                    <div className="w-2 h-2 dark:bg-slate-700 bg-slate-300 rounded-full"></div>
                                </div>
                            </div>
                            <div
                                className="text-xs font-semibold __code dark:text-slate-100 text-slate-800"
                                id="htmlCode"
                            ></div>
                        </div>

                        <div className="ms-8 dark:bg-slate-950 border bg-white p-4 w-64 h-52 rounded-lg border-slate-200 dark:border-slate-800 rotate-6 -translate-y-14">
                            <div className="mb-4 flex justify-between items-center text-xs pb-4 border-b border-slate-950/10 dark:border-slate-50/[0.06]">
                                <div className="">
                                    <i className="fa-brands fa-sass text-rose-500"></i>
                                    <span className="ms-2 font-bold uppercase dark:text-slate-100 text-slate-800">
                                        scss
                                    </span>
                                </div>
                                <div className="flex gap-1">
                                    <div className="w-2 h-2 dark:bg-slate-700 bg-slate-300 rounded-full"></div>
                                    <div className="w-2 h-2 dark:bg-slate-700 bg-slate-300 rounded-full"></div>
                                    <div className="w-2 h-2 dark:bg-slate-700 bg-slate-300 rounded-full"></div>
                                </div>
                            </div>
                            <div
                                className="text-xs font-semibold __code dark:text-slate-100 text-slate-800"
                                id="scssCode"
                            ></div>
                        </div>

                        <div className="ms-16 dark:bg-slate-950 border bg-white p-4 w-64 h-36 rounded-lg border-slate-200 dark:border-slate-800 -rotate-6 -translate-y-28">
                            <div className="mb-4 flex justify-between items-center text-xs pb-4 border-b border-slate-950/10 dark:border-slate-50/[0.06]">
                                <div className="">
                                    <i className="fa-brands fa-js text-amber-500"></i>
                                    <span className="ms-2 font-bold uppercase dark:text-slate-100 text-slate-800">
                                        js
                                    </span>
                                </div>
                                <div className="flex gap-1">
                                    <div className="w-2 h-2 dark:bg-slate-700 bg-slate-300 rounded-full"></div>
                                    <div className="w-2 h-2 dark:bg-slate-700 bg-slate-300 rounded-full"></div>
                                    <div className="w-2 h-2 dark:bg-slate-700 bg-slate-300 rounded-full"></div>
                                </div>
                            </div>
                            <div
                                className="text-xs font-semibold __code dark:text-slate-100 text-slate-800"
                                id="jsCode"
                            ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Hero;
