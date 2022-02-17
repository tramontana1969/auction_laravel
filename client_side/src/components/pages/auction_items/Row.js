import React from "react";
import {Link} from "react-router-dom";

function Row(props) {
    return (
        <tr>
            <td><Link to={'/prices/' + props.auction_item.id}>{props.auction_item.id}</Link></td>
            <td><Link to={'/auctions/' + props.auction_item.auction_id}>{props.auction_item.auction_id}</Link></td>
            <td><Link to={'/items/' + props.auction_item.item_id}>{props.auction_item.item_id}</Link></td>
            <td>{props.auction_item.start_price}</td>
            <td>{props.auction_item.actual_price}</td>
            <td>{props.auction_item.description}</td>
        </tr>
    )
}

export default Row;
