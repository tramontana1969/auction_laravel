import React from "react";
import {useEffect} from "react";
import {useDispatch, useSelector} from "react-redux";
import {useParams} from "react-router-dom";
import {showAuction_Item} from "../../../store/actions/auction_itemsActions";
import {Link} from "react-router-dom";
import EditingButton from "../../editingButton";
import AuctionItemForm from "./auctionItemForm";
import DeletingButton from "../../deletingButton";
import DeleteAuctionItem from "./deleteAuctionItem";

function One_Auction_Item () {
    const dispatch = useDispatch();
    const {id} = useParams();
    const auction_item = useSelector((state) => state.auction_item.one_auction_item);

    useEffect(() => {
        dispatch(showAuction_Item(id))
    }, []);
    return (
        <div>
            <table className="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>auction_id</th>
                    <th>item_id</th>
                    <th>start_price</th>
                    <th>actual_price</th>
                    <th>description</th>
                </tr>
                </thead>
                <tbody>
                {
                    <tr>
                        <td>{auction_item.id}</td>
                        <td><Link to={'/auctions/' + auction_item.auction_id}>{auction_item.auction_id}</Link></td>
                        <td><Link to={'/items/' + auction_item.item_id}>{auction_item.item_id}</Link></td>
                        <td>{auction_item.start_price}</td>
                        <td>{auction_item.actual_price}</td>
                        <td>{auction_item.description}</td>
                    </tr>
                }
                </tbody>
            </table>
            <EditingButton />
            <AuctionItemForm />
            <DeletingButton />
            <DeleteAuctionItem />
        </div>
    );
}

export default One_Auction_Item;
