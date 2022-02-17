import React from "react";
import {addAuction_Item, editAuction_Item} from "../../../store/actions/auction_itemsActions";
import {useEffect, useState} from "react";
import {useDispatch, useSelector} from "react-redux";
import {listAuctions} from "../../../store/actions/auctionsActions";
import {listItems} from "../../../store/actions/itemsActions";
import {useParams} from "react-router-dom";

function AuctionItemForm() {
    const dispatch = useDispatch();
    const {id} = useParams();
    const [auctionItemData, setAuctionItemData] = useState({auction_id: '', item_id:'', start_price:'', actual_price:'', description: ''});
    const auction_item = useSelector((state) => state.auction_item);
    const auctions = useSelector((state) => state.auction.auctions);
    const items = useSelector((state) => state.item.items);

    useEffect(() => {
        dispatch(listAuctions());
        dispatch(listItems());
        if (id != null) {
            setAuctionItemData(auction_item.one_auction_item);
        }
    }, [auction_item]);

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (id != null) {
            dispatch(editAuction_Item(id, auctionItemData));
        } else {
            dispatch(addAuction_Item(auctionItemData));
        }
    };

    return (
        <div className="modal fade" id="exampleModal" tabIndex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div className="modal-dialog">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title" id="exampleModalLabel">Data</h5>
                        <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div className="modal-body">
                        <form onSubmit={handleSubmit}>
                            <div className="mb-3">
                                <label htmlFor="auction_id" className="col-form-label">auction_id:</label>
                                <select value={auctionItemData.auction_id || ''} className="form-select" aria-label="Default select example" name="auction_id" onChange={(e) => setAuctionItemData({...auctionItemData, auction_id: e.target.value })}>
                                    <option defaultValue>Required Option!!!</option>
                                    {auctions ? (
                                        auctions.map(item => <option value={item.id} key={item.id}>{item.place}, {item.date}</option>)
                                    ) : null}
                                </select>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="item_id" className="col-form-label">item_id:</label>
                                <select value={auctionItemData.item_id || ''} className="form-select" aria-label="Default select example" name="item_id" onChange={(e) => setAuctionItemData({...auctionItemData, item_id: e.target.value })}>
                                    <option defaultValue>Required Option!!!</option>
                                    {items ? (
                                        items.map(item => <option value={item.id} key={item.id}>{item.name}</option>)
                                    ) : null}
                                </select>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="start_price" className="col-form-label">start_price:</label>
                                <input value={auctionItemData.start_price || ''} type="number" className="form-control" name='start_price' onChange={(e) => setAuctionItemData({...auctionItemData, start_price: e.target.value })}/>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="actual_price" className="col-form-label">actual_price:</label>
                                <input value={auctionItemData.actual_price || ''} type="number" className="form-control" name='actual_price' onChange={(e) => setAuctionItemData({...auctionItemData, actual_price: e.target.value })}/>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="description" className="col-form-label">Description:</label>
                                <input value={auctionItemData.description || ''} type="text" className="form-control" name='description' onChange={(e) => setAuctionItemData({...auctionItemData, description: e.target.value })}/>
                            </div>
                            <div className="modal-footer">
                                <button type='submit' className="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default AuctionItemForm;
