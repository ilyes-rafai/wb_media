import React from "react";

function TableBody({ data, renderRow }) {
    if (!data || data.length === 0) {
        return (
            <tbody>
                <tr>
                    <td colSpan="100%" className="text-center py-4">
                        No data available.
                    </td>
                </tr>
            </tbody>
        );
    }

    return (
        <tbody>
            {data.map((element, index) => (
                <tr key={index} className="_border dark:even:bg-slate-950 even:bg-ilyes/5">
                    {renderRow(element)}
                </tr>
            ))}
        </tbody>
    );
}

export default TableBody;
