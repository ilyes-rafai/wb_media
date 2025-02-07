import React, { useState } from "react";

const Accordion = ({ faqs }) => {
    const [openIndex, setOpenIndex] = useState(null);

    const toggleAccordion = (index) => {
        setOpenIndex(openIndex === index ? null : index);
    };

    return (
        <div className="max-w-2xl mx-auto">
            {faqs.map((faq, index) => (
                <div key={index} className="mb-4 _border_b">
                    {/* Question */}
                    <button
                        onClick={() => toggleAccordion(index)}
                        className="w-full text-left py-3 px-4 flex justify-between items-center text-slate-700 dark:text-slate-400 font-medium hover:text-ilyes transition-all duration-300"
                    >
                        {faq.question}
                        <span className="text-xl">{openIndex === index ? "−" : "+"}</span>
                    </button>

                    {/* Answer */}
                    <div
                        className={`overflow-hidden transition-all duration-300 ${
                            openIndex === index ? "max-h-40 py-3 px-4 opacity-100" : "max-h-0 opacity-0"
                        }`}
                    >
                        <p className="text-slate-900 dark:text-slate-200 font-semibold">{faq.answer}</p>
                    </div>
                </div>
            ))}
        </div>
    );
};

export default Accordion;
