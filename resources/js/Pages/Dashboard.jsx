import TitleSection from "@/Components/TitleSection";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from "@inertiajs/react";
import PostCard from "./Partials/Post/PostCard";

export default function Dashboard({ posts }) {
    const abilities = usePage().props.auth.abilities;

    return (
        <AuthenticatedLayout header="Home Page">
            <Head title="Dashboard" />

            <div className="p-3 sm:p-6 lg:p-12 rounded-lg border border-zinc-200 dark:border-zinc-800 max-w-screen-lg mx-auto">
                <header className="mb-3 sm:mb-6 lg:mb-12">
                    <TitleSection title="Latest posts" />
                </header>

                <div className="">
                    <div className="grid grid-cols-1 gap-3 sm:gap-6">
                        {posts.map((post) => (
                            <PostCard key={post.id} post={post} />
                        ))}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
