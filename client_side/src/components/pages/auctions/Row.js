import React from "react";
import {Link} from "react-router-dom";

function Row(props) {
    return (
        <tr>
            <td><Link to={'/auctions/' + props.auction.id}>{props.auction.id}</Link></td>
            <td>{props.auction.date}</td>
            <td>{props.auction.time}</td>
            <td>{props.auction.place}</td>
            <td>{props.auction.description}</td>
        </tr>
    )
}

export default Row;
