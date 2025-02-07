import React from "react";

function TableHead({ headers }) {
    return (
        <thead className="text-xs text-slate-700 uppercase dark:text-slate-400 _border">
            <tr>
                {headers &&
                    headers.map((head, index) => (
                        <th key={index} scope="col" className="px-6 py-3 whitespace-nowrap">
                            {head}
                        </th>
                    ))}
            </tr>
        </thead>
    );
}

export default TableHead;
