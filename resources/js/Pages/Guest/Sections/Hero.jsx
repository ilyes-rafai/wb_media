import PrimaryButtonLink from "@/Components/PrimaryButtonLink";
import { TranslationContext } from "@/contexts/TranslationProvider";
import React, { useContext, useEffect } from "react";
import TypeIt from "typeit";
import CodeEditor from "../Components/CodeEditor";
import SectionHeader from "../Components/SectionHeader";
import SectionSubHeader from "../Components/SectionSubHeader";
function Hero() {
    const { translations } = useContext(TranslationContext);

    useEffect(() => {
        const animations = [
            {
                selector: "#htmlCode",
                strings: [
                    `<span class='text-ilyes'>&lt;h1&gt;</span>Hi, I'm Ilyes RAFAI<span class='text-ilyes'>&lt;/h1&gt;</span>`,
                    `<span class='text-ilyes'>&lt;p&gt;</span>Welcome to Webilymedia!<span class='text-ilyes'>&lt;/p&gt;</span>`,
                ],
            },
            {
                selector: "#scssCode",
                strings: [
                    `$color: <span class='text-ilyes'>#00E472</span>;`,
                    `<span class='text-ilyes'>.class {</span>`,
                    `&ensp;&ensp;color: $color;`,
                    `&ensp;<span class='text-ilyes'>}</span>`,
                ],
            },
            {
                selector: "#jsCode",
                strings: [
                    `<span class='text-ilyes'>function</span> greet<span class='text-ilyes'>(</span>name<span class='text-ilyes'>)</span> {`,
                    `&ensp;&ensp;console.log<span class='text-ilyes'>(</span>&ldquo;hello&ldquo;, name<span class='text-ilyes'>)</span>;`,
                    `}`,
                    `greet<span class='text-ilyes'>(</span>'Webilymedia'<span class='text-ilyes'>)</span>;`,
                ],
            },
            {
                selector: "#jsCode2",
                strings: [
                    `<span class='text-ilyes'>function</span> greet<span class='text-ilyes'>(</span>name<span class='text-ilyes'>)</span> {`,
                    `&ensp;&ensp;console.log<span class='text-ilyes'>(</span>&ldquo;hello&ldquo;, name<span class='text-ilyes'>)</span>;`,
                    `}`,
                    `greet<span class='text-ilyes'>(</span>'Webilymedia'<span class='text-ilyes'>)</span>;`,
                ],
            },
        ];

        // Function to initialize TypeIt for each block
        const instances = animations.map(({ selector, strings }) => {
            return new TypeIt(selector, {
                strings,
                speed: 200,
                loop: true,
                waitUntilVisible: true,
            }).go();
        });

        // Cleanup function to destroy animations on unmount
        return () => instances.forEach((instance) => instance.destroy());
    }, []);

    return (
        <div className="min-h-[80vh] grid place-items-center">
            <div className="">
                <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div className="h-fit">
                        <SectionHeader
                            title={translations.hero_title}
                            span="."
                            className="text-center sm:ltr:text-left sm:rtl:text-right"
                        />

                        <SectionSubHeader className="text-center sm:ltr:text-left sm:rtl:text-right">
                            {translations.hero_sub}
                        </SectionSubHeader>

                        <PrimaryButtonLink href={route("login")}>{translations.login_now}</PrimaryButtonLink>
                    </div>
                    <div className="relative space-y-8 min-h-[450px]">
                        <CodeEditor lang="html" icon="html5" color="text-orange-500" id="htmlCode" />
                        <CodeEditor
                            lang="scss"
                            icon="sass"
                            color="text-pink-500"
                            id="scssCode"
                            className="left-1/2 top-1/2 -translate-x-1/2 -translate-y-28"
                        />
                        <div className="rtl:hidden">
                            <CodeEditor
                                lang="js"
                                icon="js"
                                color="text-yellow-500"
                                id="jsCode"
                                className="right-0 bottom-0"
                            />
                        </div>
                        <div className="ltr:hidden">
                            <CodeEditor
                                lang="js"
                                icon="js"
                                color="text-yellow-500"
                                id="jsCode2"
                                className="bottom-0 left-0"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Hero;
