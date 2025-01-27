import ApplicationLogo from "@/Components/ApplicationLogo";
import Blur from "@/Components/Blur";
import Mode from "@/Components/Mode";
import NavLink from "@/Components/NavLink";
import Container from "@/Pages/Guest/Components/Container";
import { Link, usePage } from "@inertiajs/react";

export default function GuestLayout({ children }) {
    const user = usePage().props.auth.user;

    return (
        <div className="min-h-screen max-h-screen bg-gradient-to-br from-white via-ilyes/5 to-white dark:from-slate-900 dark:via-black dark:to-slate-950">
            <Blur top={32} left={0} />
            <Blur top={0} right={256} />
            <Blur bottom={0} right={0} />
            <Blur
                size="w-64"
                bgColor="bg-ilyes/20 dark:bg-ilyes/20"
                top={window.innerHeight * 0.3}
                left={window.innerWidth * 0.5}
                extraClasses="-translate-x-1/2 -translate-y-1/2"
            />

            <div className="h-[10vh] border-b border-slate-200 dark:border-slate-800">
                <div className="flex h-full justify-between items-center px-12">
                    <Link href={route("dashboard")}>
                        <ApplicationLogo className="block w-12 fill-current text-ilyes" />
                    </Link>

                    <div className="flex gap-6 items-center">
                        {user && user ? (
                            <Link
                                href={route("dashboard")}
                                className="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Platforme
                            </Link>
                        ) : (
                            <>
                                <NavLink href={route("login")}>Log in</NavLink>
                                <NavLink href={route("register")}>Register</NavLink>
                            </>
                        )}
                        <Mode />
                    </div>
                </div>
            </div>

            <div className="h-[88vh] max-h-[88vh] overflow-y-auto [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-white [&::-webkit-scrollbar-thumb]:bg-ilyes dark:[&::-webkit-scrollbar-track]:bg-slate-800 dark:[&::-webkit-scrollbar-thumb]:bg-ilyes">
                <div className="w-full">
                    <Container>{children}</Container>
                    <footer className="flex justify-center gap-2 mb-4">
                        <ApplicationLogo className="w-8 fill-current text-ilyes" />
                        <p className="text-slate-500 text-center">&copy; {new Date().getFullYear()}</p>
                    </footer>
                </div>
            </div>
        </div>
    );
}
