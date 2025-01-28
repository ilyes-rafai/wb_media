import NavLink from "@/Components/NavLink";
import TitleSection from "@/Components/TitleSection";
import Layout from "@/Layouts/Layout";
import { Head, usePage } from "@inertiajs/react";
import Wrapper from "./Admin/Components/Wrapper";
import CourseCard from "./Client/Course/CourseCard";
import PostCard from "./Client/Post/PostCard";
import ProjectCard from "./Client/Project/ProjectCard";

export default function Dashboard({ posts, courses, projects }) {
    const abilities = usePage().props.auth.abilities;

    return (
        <Layout header="Home Page">
            <Head title="Dashboard" />

            <div className="grid grid-cols-1 gap-6">
                <Wrapper>
                    <header className="mb-3 sm:mb-6 lg:mb-12 flex flex-col md:flex-row justify-between md:items-center gap-6 md:gap-0">
                        <TitleSection title="Latest projects" />
                        <NavLink href={route("projectList")}>
                            See all
                            <i className="fa-solid fa-arrow-right-long ms-2 text-sm"></i>
                        </NavLink>
                    </header>

                    <div className="">
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                            {projects.map((project) => (
                                <ProjectCard key={project.id} project={project} />
                            ))}
                        </div>
                    </div>
                </Wrapper>

                <Wrapper>
                    <header className="mb-3 sm:mb-6 lg:mb-12 flex flex-col md:flex-row justify-between md:items-center gap-6 md:gap-0">
                        <TitleSection title="Latest posts" />
                        <NavLink href={route("dashboard")}>
                            See all
                            <i className="fa-solid fa-arrow-right-long ms-2 text-sm"></i>
                        </NavLink>
                    </header>

                    <div className="">
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                            {posts.map((post) => (
                                <PostCard key={post.id} post={post} />
                            ))}
                        </div>
                    </div>
                </Wrapper>

                <Wrapper>
                    <header className="mb-3 sm:mb-6 lg:mb-12 flex flex-col md:flex-row justify-between md:items-center gap-6 md:gap-0">
                        <TitleSection title="Latest courses" />
                        <NavLink href={route("courseList")}>
                            See all
                            <i className="fa-solid fa-arrow-right-long ms-2 text-sm"></i>
                        </NavLink>
                    </header>

                    <div className="">
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                            {courses.map((course) => (
                                <CourseCard key={course.id} course={course} />
                            ))}
                        </div>
                    </div>
                </Wrapper>
            </div>
        </Layout>
    );
}
