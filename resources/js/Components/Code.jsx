import React from "react";
import { Prism as SyntaxHighlighter } from "react-syntax-highlighter";
import { dracula, prism } from "react-syntax-highlighter/dist/esm/styles/prism"; // Dark theme

function Code({ children, language }) {
    const isDark = localStorage.getItem("theme") === "dark";
    const theme = isDark ? dracula : prism;

    return (
        <SyntaxHighlighter
            showLineNumbers
            language={language}
            customStyle={{ background: "transparent" }}
            className="border border-slate-200 dark:border-slate-800 max-h-[40vh] overflow-auto [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-white [&::-webkit-scrollbar-thumb]:bg-ilyes dark:[&::-webkit-scrollbar-track]:bg-slate-800 dark:[&::-webkit-scrollbar-thumb]:bg-ilyes"
            style={theme}
        >
            {children}
        </SyntaxHighlighter>
    );
}

export default Code;
