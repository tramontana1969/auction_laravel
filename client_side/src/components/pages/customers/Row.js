import React from "react";
import {Link} from "react-router-dom";

function Row(props) {
    return (
        <tr>
            <td><Link to={'/customers/' + props.customer.id}>{props.customer.id}</Link></td>
            <td>{props.customer.name}</td>
        </tr>
    )
}

export default Row;
