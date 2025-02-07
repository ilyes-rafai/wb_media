import { TranslationContext } from "@/contexts/TranslationProvider";
import React, { useContext } from "react";
import PricingCard from "../Components/PricingCard";
import SectionHeader from "../Components/SectionHeader";
import SectionHeaderTwo from "../Components/SectionHeaderTwo";
import SectionSubHeader from "../Components/SectionSubHeader";

function Pricing() {
    const member = [
        "Lorem ipsum dolor sit.",
        "Lorem ipsum dolor sit.",
        "Lorem ipsum dolor sit.",
        "Lorem ipsum dolor sit.",
    ];

    const subscriber = [
        "Lorem ipsum dolor sit.",
        "Lorem ipsum dolor sit.",
        "Lorem ipsum dolor sit.",
        "Lorem ipsum dolor sit.",
    ];

    const student = [
        "One-on-one mentoring",
        "Lorem ipsum dolor sit.",
        "Lorem ipsum dolor sit.",
        "Lorem ipsum dolor sit.",
        "Lorem ipsum dolor sit.",
    ];

    const { translations } = useContext(TranslationContext);

    return (
        <div className="">
            <SectionHeaderTwo title={translations.plan_title} className="text-center" />

            <SectionSubHeader className="text-center">{translations.plan_sub}</SectionSubHeader>

            <div className="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0 items-center">
                <PricingCard
                    title="Member"
                    description="Access free resources: videos, tricks, and source code."
                    price="0"
                    kind="All time"
                    features={member}
                ></PricingCard>

                <PricingCard
                    isPopular
                    title="Student"
                    description="Tailored one-on-one mentoring for individual development."
                    price="250"
                    kind="Session"
                    features={student}
                ></PricingCard>

                <PricingCard
                    title="Subscriber"
                    description="Unlock premium tutorials, tricks, and insider development tips."
                    price="500"
                    kind="Month"
                    features={subscriber}
                ></PricingCard>
            </div>
        </div>
    );
}

export default Pricing;
