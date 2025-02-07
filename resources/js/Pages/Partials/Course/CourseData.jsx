import ButtonCircle from "@/Components/ButtonCircle";
import DangerButton from "@/Components/DangerButton";
import { Free } from "@/Components/Free";
import HandlePremium from "@/Components/HandlePremium";
import Modal from "@/Components/Modal";
import { Premium } from "@/Components/Premium";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TableData from "@/Components/TableData";
import { Link, useForm } from "@inertiajs/react";
import React, { useState } from "react";

function CourseData({ course }) {
    const { delete: destroy, processing } = useForm();

    function submit(e) {
        e.preventDefault();
        destroy(route("courses.destroy", { id: course.id }));
    }

    const [confirmingCourseDeletion, setConfirmingCourseDeletion] = useState(false);

    const confirmCourseDeletion = () => {
        setConfirmingCourseDeletion(true);
    };
    const closeModal = () => {
        setConfirmingCourseDeletion(false);
    };

    return (
        <>
            <TableData>{course.title}</TableData>
            <TableData>{course.chapters_count}</TableData>
            <TableData scope="row">
                <div className="flex flex-wrap gap-3">
                    {course.topics.map((topic, index) => (
                        <div className="border dark:border-slate-800 px-2 rounded-full" key={index}>
                            <span className="">{topic.name}</span>
                        </div>
                    ))}
                </div>
            </TableData>
            <TableData>
                <div className="flex items-center">
                    <HandlePremium item={course} actionRoute="handleCoursePremium" />
                    {course.premium ? <Premium /> : <Free />}
                </div>
            </TableData>
            <TableData>@{course.user.username}</TableData>
            <TableData>
                <span className="whitespace-nowrap">
                    {new Date(course.created_at)
                        .toLocaleDateString("en-GB", {
                            day: "2-digit",
                            month: "short",
                            year: "2-digit",
                        })
                        .toUpperCase()}
                </span>
            </TableData>
            <TableData>
                <div className="flex gap-3">
                    <Link
                        className={`text-slate-500 dark:text-slate-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-slate-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-slate-900 bg-white`}
                        href={route("courses.edit_chapters_page", course)}
                    >
                        <i className="fa-solid fa-film"></i>
                    </Link>

                    <Link
                        className={`text-slate-500 dark:text-slate-400 hover:bg-ilyes dark:hover:bg-ilyes hover:text-white dark:hover:text-slate-800 w-8 h-8 rounded-full flex items-center justify-center transition duration-300 text-sm cursor-pointer dark:bg-slate-900 bg-white`}
                        href={route("courses.edit", course)}
                    >
                        <i className="fa-solid fa-pen"></i>
                    </Link>

                    <ButtonCircle icon="trash" action={confirmCourseDeletion} />
                </div>
            </TableData>

            <Modal show={confirmingCourseDeletion} onClose={closeModal}>
                <form onSubmit={submit} className="p-6 text-center">
                    <h2 className="text-lg font-medium text-slate-500 dark:text-slate-500">
                        Are you sure you want to delete this course?
                    </h2>
                    <h2 className="font-medium text-slate-500 dark:text-slate-500">
                        All of this course chapters will also be deleted
                    </h2>

                    <div className="mt-6 flex gap-6 justify-center">
                        <SecondaryButton onClick={closeModal}>
                            <i className="fa-solid fa-times me-2"></i>
                            Cancel
                        </SecondaryButton>

                        <PrimaryButton type="submit" className="flex items-center gap-2">
                            {processing ? (
                                <>
                                    <i className="fa-solid fa-spinner me-2 animate-spin"></i>
                                    Processing...
                                </>
                            ) : (
                                <>
                                    <i className="fa-solid fa-check me-2"></i> Yes, delete
                                </>
                            )}
                        </PrimaryButton>
                    </div>
                </form>
            </Modal>
        </>
    );
}

export default CourseData;
