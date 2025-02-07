import Accordion from "@/Components/Accordion";
import { TranslationContext } from "@/contexts/TranslationProvider";
import React, { useContext } from "react";
import SectionHeader from "../Components/SectionHeader";
import SectionHeaderTwo from "../Components/SectionHeaderTwo";

function FAQ() {
    const { translations } = useContext(TranslationContext);

    const faqs = [
        {
            question: "What is this platform about?",
            answer: "This platform helps you improve your coding skills through tricks, quizzes, exercises, vocabulary, and video courses.",
        },
        {
            question: "Is this platform free to use?",
            answer: "Yes! We offer a free plan with access to coding tricks and basic quizzes. Premium plans unlock advanced content and features.",
        },
        {
            question: "Who is this platform for?",
            answer: "Whether you're a beginner, intermediate, or advanced coder, our platform provides structured learning to help you grow.",
        },
        {
            question: "What programming languages do you cover?",
            answer: "We cover popular languages like JavaScript, Python, PHP, Laravel, and more, with new content added regularly.",
        },
        {
            question: "How do I access the video courses?",
            answer: "You can access video courses by signing up for a free or premium account. Some courses may be exclusive to premium members.",
        },
        {
            question: "Do I get a certificate after completing a course?",
            answer: "Currently, we don’t offer certificates, but we are working on adding this feature in the future.",
        },
        {
            question: "Can I contribute my own coding tricks or quizzes?",
            answer: "Absolutely! We're building a community-driven platform. Stay tuned for ways to contribute.",
        },
    ];

    return (
        <div>
            <SectionHeaderTwo title={translations.faq} className="text-center" />

            <Accordion faqs={faqs} />
        </div>
    );
}

export default FAQ;
