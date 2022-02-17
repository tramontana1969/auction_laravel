import React from "react";
import {Link} from "react-router-dom";

function Row (props) {
    return (
        <tr>
            <td><Link to={'/items/' + props.item.id}>{props.item.id}</Link></td>
            <td>{props.item.name}</td>
            <td>{props.item.lot}</td>
            <td><Link to={'/sellers/' + props.item.seller_id}>{props.item.seller_id}</Link></td>
            <td><Link to={'/customers/' + props.item.customer_id}>{props.item.customer_id}</Link></td>
        </tr>
    )
}

export default Row;
