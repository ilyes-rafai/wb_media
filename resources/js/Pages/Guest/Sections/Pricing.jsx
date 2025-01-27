import React from "react";
import PricingCard from "../Components/PricingCard";
import SectionHeader from "../Components/SectionHeader";
import SectionSubHeader from "../Components/SectionSubHeader";

function Pricing() {
    const member = [
        "Access to free resources, including videos and project source codes",
        "Participation in WebilyMedia’s community discussions and forums",
        "Regular updates on new free content",
    ];

    const subscriber = [
        "Full access to premium resources, including advanced videos and exclusive project source codes",
        "Downloadable eBooks and learning guides",
        "Invitations to webinars hosted by industry experts",
        "Priority support for learning queries or technical issues",
    ];

    const student = [
        "Everything in the Subscriber Plan",
        "Ability to choose a topic and create your own tutorial series",
        "Free WebilyMedia merchandise for every completed project",
        "Certificate of contribution for completed courses",
        "Access to an exclusive mentorship program for personal guidance",
    ];

    return (
        <div className="">
            <SectionHeader title="Choose the right plan for you" className="text-center" />

            <SectionSubHeader className="text-center">
                Choose an affordable plan that’s packed with the best features for engaging your audience, creating
                customer loyalty, and driving sales.
            </SectionSubHeader>

            <div className="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                <PricingCard
                    title="Member"
                    description="Access free resources: videos, projects, and source code."
                    price="0"
                    kind="All time"
                    features={member}
                ></PricingCard>
                <PricingCard
                    title="Subscriber"
                    description="Unlock premium tutorials, projects, and insider development tips."
                    price="200"
                    kind="Month"
                    features={subscriber}
                ></PricingCard>
                <PricingCard
                    title="Student"
                    description="Learn, specialize in topics, and receive exclusive free gifts."
                    price="250"
                    kind="Session"
                    features={student}
                ></PricingCard>
            </div>
        </div>
    );
}

export default Pricing;
