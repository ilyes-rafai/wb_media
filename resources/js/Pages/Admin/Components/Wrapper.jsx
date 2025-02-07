import React from "react";

function Wrapper({ children }) {
    return <div className="p-3 sm:p-6 rounded-lg _border w-full">{children}</div>;
}

export default Wrapper;
