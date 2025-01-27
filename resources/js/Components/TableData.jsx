import React from "react";

function TableData({ children }) {
    return (
        <td scope="row" className="px-6 py-2 text-slate-500 font-medium">
            {children}
        </td>
    );
}

export default TableData;
