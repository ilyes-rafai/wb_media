import React from "react";
import { Prism as SyntaxHighlighter } from "react-syntax-highlighter";
import { zTouch } from "react-syntax-highlighter/dist/esm/styles/prism";

function Code({ children, language }) {
    return (
        <SyntaxHighlighter
            showLineNumbers
            language={language}
            customStyle={{ background: "transparent" }}
            className="_border max-h-[40vh] overflow-auto [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-white [&::-webkit-scrollbar-thumb]:bg-ilyes dark:[&::-webkit-scrollbar-track]:bg-slate-800 dark:[&::-webkit-scrollbar-thumb]:bg-ilyes"
            style={zTouch}
        >
            {children}
        </SyntaxHighlighter>
    );
}

export default Code;
