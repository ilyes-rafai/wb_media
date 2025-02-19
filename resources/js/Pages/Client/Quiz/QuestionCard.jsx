import Modal from "@/Components/Modal";
import Radio from "@/Components/Radio";
import React from "react";

export const QuestionCard = ({ question, onAnswerChange, selectedAnswer }) => {
        let lang = localStorage.getItem("lang") || "en";
        let title =
            lang === "fr"
                ? question.title_fr
                : lang === "ar"
                ? question.title_ar
                : question.title_en;
    return (
        <div className="p-3 sm:p-6 rounded-lg _border">
            <div className="mb-3">
                <h3 className="text-xl font-normal leading-tight dark:text-slate-300 text-slate-700">
                    {title}
                </h3>
            </div>
            <div className="px-3 flex flex-col gap-1.5">
                {question.options &&
                    question.options.map((option, index) => {
                        let optionTitle =
                            lang === "fr"
                                ? option.title_fr
                                : lang === "ar"
                                ? option.title_ar
                                : option.title_en;
                        return (
                            <div key={index}>
                                <div>
                                    <Radio
                                        labelClassName="normal-case ms-3"
                                        label={optionTitle}
                                        name={`question${question.id}`}
                                        id={`option${option.id}`}
                                        checked={selectedAnswer === option.id} // This will bind the checked property
                                        onChange={() =>
                                            onAnswerChange(
                                                question.id,
                                                option.id
                                            )
                                        } // Update selected answer
                                    />
                                </div>
                            </div>
                        );
                    })}
            </div>
        </div>
    );
};
