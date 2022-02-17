import React from 'react';
import {Link} from "react-router-dom";

function Row (props) {
    return (
        <tr>
            <td><Link to={"/sellers/"+ props.seller.id}>{props.seller.id}</Link></td>
            <td>{props.seller.name}</td>
        </tr>
    )
}

export default Row;
