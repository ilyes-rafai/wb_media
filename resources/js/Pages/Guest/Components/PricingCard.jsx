import NavLink from "@/Components/NavLink";
import PrimaryButton from "@/Components/PrimaryButton";
import React from "react";

function PricingCard({ title, description, price, oldPrice, kind, features, isPopular }) {
    return (
        <div className="relative flex flex-col p-6 text-center text-slate-600 dark:text-slate-600 rounded-lg _border h-fit overflow-hidden dark:bg-black/5 bg-white/5 backdrop-blur">
            <h3 className="mb-4 text-2xl font-semibold text-ilyes uppercase">{title}</h3>
            <p className="font-medium text-slate-900 dark:text-slate-400">{description}</p>
            <p className="mr-1 text-5xl text-slate-400 dark:text-slate-600 font-extrabold line-through decoration-ilyes mt-8 mb-3">
                {oldPrice}
            </p>
            <div className="flex justify-center items-center mb-8">
                <div className="mr-2 font-extrabold">
                    <p className="mr-1 text-2xl text-ilyes">{price}</p>
                </div>
                <div className="font-medium">/{kind}</div>
            </div>
            <ul role="list" className="mb-8 space-y-4 text-left rtl:text-right">
                {features &&
                    features.map((feature, index) => (
                        <li key={index} className="flex items-baseline space-x-3 text-slate-800 dark:text-slate-200">
                            <i className="fa-solid fa-check text-ilyes"></i>
                            <span>{feature}</span>
                        </li>
                    ))}
            </ul>

            <a
                href="https://wa.me/+212604457507"
                target="_blank"
                className="px-6 py-2 flex items-center relative rounded transition duration-300 group overflow-hidden font-semibold dark:font-normal text-slate-800 dark:text-white hover:text-ilyes dark:hover:text-ilyes tracking-wide w-fit mx-auto text-lg"
            >
                <i className="fa-brands fa-whatsapp text-lg me-2 text-ilyes"></i>
                Get started
            </a>

            {isPopular && (
                <div className="absolute top-8 -right-6 px-8 rotate-[40deg] bg-ilyes text-black text-xs font-bold">
                    Most Popular
                </div>
            )}
        </div>
    );
}

export default PricingCard;
