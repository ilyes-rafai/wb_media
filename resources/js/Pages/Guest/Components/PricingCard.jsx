import React from "react";

function PricingCard({ title, description, price, kind, features }) {
    return (
        <div className="flex flex-col p-6 text-center text-slate-600 dark:text-slate-600 border rounded-lg border-slate-200 dark:border-slate-800 h-fit">
            <h3 className="mb-4 text-2xl font-semibold text-ilyes">{title}</h3>
            <p className="font-medium sm:text-lg text-slate-600 dark:text-slate-400">{description}</p>
            <div className="flex justify-center items-baseline my-8">
                <div className="mr-2 text-5xl font-extrabold">
                    <span className="mr-1 text-ilyes">{price} DH</span>
                </div>
                <div className="font-medium">/{kind}</div>
            </div>
            <ul role="list" className="mb-8 space-y-4 text-left">
                {features &&
                    features.map((feature, index) => (
                        <li key={index} className="flex items-baseline space-x-3 text-slate-800 dark:text-slate-400">
                            <i className="fa-solid fa-check text-ilyes"></i>
                            <span>{feature}</span>
                        </li>
                    ))}
            </ul>
            <a
                href="#"
                className="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900"
            >
                Get started
            </a>
        </div>
    );
}

export default PricingCard;
