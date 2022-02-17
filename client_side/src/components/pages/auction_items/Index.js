import React, {useEffect} from "react";
import {useDispatch, useSelector} from "react-redux";
import Row from "./Row";
import {listAuction_Items} from "../../../store/actions/auction_itemsActions";
import AddingButton from "../../addingButton";
import AuctionItemForm from "./auctionItemForm";

function Index() {

    const dispatch = useDispatch();
    const auction_items = useSelector((state) => state.auction_item.auction_items);

    useEffect(() => {
        dispatch(listAuction_Items());
    }, [])

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
                    auction_items ?(
                        auction_items.map(item => <Row key={item.id} auction_item={item}/>)
                    ) : null
                }
                </tbody>
            </table>
            <AddingButton />
            <AuctionItemForm />
        </div>
    )
}

export default Index;
