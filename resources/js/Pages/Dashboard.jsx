import NavLink from "@/Components/NavLink";
import TitleSection from "@/Components/TitleSection";
import { TranslationContext } from "@/contexts/TranslationProvider";
import Layout from "@/Layouts/Layout";
import { Head, usePage } from "@inertiajs/react";
import { useContext } from "react";
import Wrapper from "./Admin/Components/Wrapper";
import CourseCard from "./Client/Course/CourseCard";
import PostCard from "./Client/Post/PostCard";
import QuizCard from "./Client/Quiz/QuizCard";
import TrickCard from "./Client/Trick/TrickCard";

export default function Dashboard({ posts, courses, tricks, quizzes }) {
    const abilities = usePage().props.auth.abilities;

    const { translations } = useContext(TranslationContext);

    return (
        <Layout header="Home Page">
            <Head title="Dashboard" />

            <div className="grid grid-cols-1 gap-6">
                <Wrapper>
                    <header className="mb-3 sm:mb-6 flex flex-col md:flex-row md:items-center gap-6">
                        <TitleSection title={translations.latest_tricks} />
                        <NavLink href={route("trickList")}>
                            {translations.see_all}
                            <span className="rtl:hidden">
                                <span className="rtl:hidden">
                                    <i className="fa-solid fa-arrow-right-long ms-2 text-sm"></i>
                                </span>
                                <span className="ltr:hidden">
                                    <i className="fa-solid fa-arrow-left-long ms-2 text-sm"></i>
                                </span>
                            </span>
                            <span className="ltr:hidden">
                                <i className="fa-solid fa-arrow-left-long ms-2 text-sm"></i>
                            </span>
                        </NavLink>
                    </header>

                    <div className="">
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                            {tricks.map((trick) => (
                                <TrickCard key={trick.id} trick={trick} />
                            ))}
                        </div>
                    </div>
                </Wrapper>

                {/* <Wrapper>
                    <header className="mb-3 sm:mb-6 flex flex-col md:flex-row md:items-center gap-6">
                        <TitleSection title={translations.latest_posts} />
                        <NavLink href={route("dashboard")}>
                            {translations.see_all}
                             <span className="rtl:hidden">
                                <i className="fa-solid fa-arrow-right-long ms-2 text-sm"></i>
                            </span>
                            <span className="ltr:hidden">
                                <i className="fa-solid fa-arrow-left-long ms-2 text-sm"></i>
                            </span>
                        </NavLink>
                    </header>

                    <div className="">
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                            {posts.map((post) => (
                                <PostCard key={post.id} post={post} />
                            ))}
                        </div>
                    </div>
                </Wrapper> */}

                {/* <Wrapper>
                    <header className="mb-3 sm:mb-6 flex flex-col md:flex-row md:items-center gap-6">
                        <TitleSection title={translations.latest_courses} />
                        <NavLink href={route("courseList")}>
                            {translations.see_all}
                            <span className="rtl:hidden">
                                <i className="fa-solid fa-arrow-right-long ms-2 text-sm"></i>
                            </span>
                            <span className="ltr:hidden">
                                <i className="fa-solid fa-arrow-left-long ms-2 text-sm"></i>
                            </span>
                        </NavLink>
                    </header>

                    <div className="">
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                            {courses.map((course) => (
                                <CourseCard key={course.id} course={course} />
                            ))}
                        </div>
                    </div>
                </Wrapper> */}

                <Wrapper>
                    <header className="mb-3 sm:mb-6 flex flex-col md:flex-row md:items-center gap-6">
                        <TitleSection title={translations.latest_quizzes} />
                        <NavLink href={route("quizList")}>
                            {translations.see_all}
                            <span className="rtl:hidden">
                                <span className="rtl:hidden">
                                    <i className="fa-solid fa-arrow-right-long ms-2 text-sm"></i>
                                </span>
                                <span className="ltr:hidden">
                                    <i className="fa-solid fa-arrow-left-long ms-2 text-sm"></i>
                                </span>
                            </span>
                            <span className="ltr:hidden">
                                <i className="fa-solid fa-arrow-left-long ms-2 text-sm"></i>
                            </span>
                        </NavLink>
                    </header>

                    <div className="">
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                            {quizzes.map((quiz) => (
                                <QuizCard key={quiz.id} quiz={quiz} />
                            ))}
                        </div>
                    </div>
                </Wrapper>
            </div>
        </Layout>
    );
}
