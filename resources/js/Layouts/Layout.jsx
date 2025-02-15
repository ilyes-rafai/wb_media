import ApplicationLogo from "@/Components/ApplicationLogo";
import Avatar from "@/Components/Avatar";
import AvatarInconu from "@/Components/AvatarInconu";
import Blur from "@/Components/Blur";
import Dropdown from "@/Components/Dropdown";
import Mode from "@/Components/Mode";
import NavLink from "@/Components/NavLink";
import ScrollToTop from "@/Components/ScrollToTop";
import Toast from "@/Components/Toast";
import { TranslationContext } from "@/contexts/TranslationProvider";
import Container from "@/Pages/Guest/Components/Container";
import { Link, usePage } from "@inertiajs/react";
import { useContext, useEffect, useState } from "react";
import Footer from "./Footer";
import Navbar from "./Navbar";

export default function Layout({ header, children }) {
    const { translations, switchLanguage } = useContext(TranslationContext);

    const { flash } = usePage().props;

    const lang = localStorage.getItem("lang");

    useEffect(() => {
        document.documentElement.setAttribute("dir", lang === "ar" ? "rtl" : "ltr");
        document.documentElement.classList.remove("font-sans", "font-arabic");
        document.documentElement.classList.add(lang === "ar" ? "font-arabic" : "font-sans");
    }, [lang]);

    return (
        <div className="min-h-screen bg-gradient-to-br from-white via-ilyes/5 to-white dark:from-slate-950 dark:via-black dark:to-slate-950">
            <Blur top={32} left={0} />
            <Blur top={0} right={256} />
            <Blur
                size="w-64"
                bgColor="bg-ilyes/20 dark:bg-ilyes/20"
                top={window.innerHeight * 0.3}
                left={window.innerWidth * 0.5}
                extraClasses="-translate-x-1/2 -translate-y-1/2"
            />

            {/* flash messages */}
            {flash?.success && <Toast message={flash.success} type="success" />}
            {flash?.error && <Toast message={flash.error} type="error" />}

            <div className="sticky top-0 z-50 dark:bg-ilyes/5 bg-white/50 backdrop-blur">
                <header className="_border_b bg-gradient-to-r from-ilyes/5 dark:via-black/50 via-white to-ilyes/5 dark:text-white text-xs font-semibold text-center py-2">
                    {translations.we_are_in_beta} 🎉 {translations.test_our_platform}.{" "}
                    {translations.share_your_thoughts + " "}
                    <span className="rtl:hidden">👉</span>
                    <span className="ltr:hidden">👈</span>
                    <a href="https://forms.gle/rJS28arQCRFRzRHX6" target="_blank" className="text-ilyes underline">
                        {translations.give_feedback}
                    </a>
                </header>

                <Navbar switchLanguage={switchLanguage} />
            </div>

            <Container className="">{children}</Container>

            <Footer />

            <ScrollToTop />
        </div>
    );
}
