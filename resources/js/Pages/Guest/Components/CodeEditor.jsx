import React from "react";

function CodeEditor({ lang, icon, color, id, className }) {
    return (
        <div className={`w-72 aspect-video rounded-lg _border backdrop-blur-lg absolute ` + className}>
            <div className="p-3 mb-3 flex justify-between items-center text-xs _border_b">
                <div className="flex items-center">
                    <i className={`text-xl fa-brands fa-${icon} ${color}`}></i>
                    <span className="ms-2 font-bold uppercase dark:text-slate-400 text-slate-800">{lang}</span>
                </div>
                <div className="flex gap-1">
                    <div className="w-2 h-2 bg-rose-500 rounded-full"></div>
                    <div className="w-2 h-2 bg-yellow-500 rounded-full"></div>
                    <div className="w-2 h-2 bg-emerald-500 rounded-full"></div>
                </div>
            </div>
            <div className="p-3">
                <code className="text-sm font-black dark:text-slate-100 text-slate-800" id={id}></code>
            </div>
        </div>
    );
}

export default CodeEditor;
