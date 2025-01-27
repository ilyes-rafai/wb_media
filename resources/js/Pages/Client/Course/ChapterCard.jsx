import ButtonCircle from "@/Components/ButtonCircle";
import { Card } from "@/Components/Card";
import { Free } from "@/Components/Free";
import Modal from "@/Components/Modal";
import { Premium } from "@/Components/Premium";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { useForm } from "@inertiajs/react";
import React, { useState } from "react";

export const ChapterCard = ({ chapter }) => {
    return (
        <>
            <Card>
                <video
                    className="w-full aspect-video mb-6 rounded-lg border border-slate-200 dark:border-slate-800"
                    controls
                    poster={`${import.meta.env.VITE_APP_URL}/${chapter.cover}`}
                >
                    <source src={`${import.meta.env.VITE_APP_URL}/${chapter.episode}`} />
                </video>
                <h3 className="font-medium leading-tight dark:text-slate-200 text-slate-800 mb-3">{chapter.title}</h3>

                {/* Description */}
                {chapter.description && <p className="text-slate-500">{chapter.description}</p>}
                <div className="mb-1 flex items-center justify-between gap-3 mt-3">
                    <span>{chapter.premium == 1 ? <Premium /> : <Free />}</span>
                </div>
            </Card>
        </>
    );
};
