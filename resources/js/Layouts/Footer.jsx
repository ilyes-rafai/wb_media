import ApplicationLogo from "@/Components/ApplicationLogo";
import React from "react";

function Footer() {
    return (
        <footer className="flex justify-center gap-2 py-6">
            <ApplicationLogo className="w-8 fill-current text-ilyes" />
            <p className="text-slate-500 text-center">&copy; {new Date().getFullYear()}</p>
        </footer>
    );
}

export default Footer;
