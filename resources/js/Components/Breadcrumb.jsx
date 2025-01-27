import React from "react";
import NavLink from "./NavLink";

const Breadcrumb = ({ routes }) => {
    return (
        <div className="text-slate-500 flex items-center flex-wrap text-sm gap-1.5 mb-3 text-balance">
            {routes.map((route, index) => (
                <React.Fragment key={index}>
                    {index < routes.length - 1 ? (
                        <>
                            <NavLink href={route.href}>{route.label}</NavLink>
                            <i className="fa-solid fa-angle-right"></i>
                        </>
                    ) : (
                        <span className="text-ilyes font-semibold">{route.label}</span>
                    )}
                </React.Fragment>
            ))}
        </div>
    );
};

export default Breadcrumb;
