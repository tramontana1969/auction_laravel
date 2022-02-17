import React from "react";
import {addAuction, editAuction} from "../../../store/actions/auctionsActions";
import {useEffect, useState} from "react";
import {useDispatch, useSelector} from "react-redux";
import {useParams} from "react-router-dom";

function AuctionForm() {
    const dispatch = useDispatch()
    const [auctionData, setAuctionData] = useState({date: '', time:'', place:'', description:''});
    const auction = useSelector((state) => state.auction.one_auction);
    const {id} = useParams();

    useEffect(() => {
        if (id != null) {
            setAuctionData(auction);
        }
    }, [auction]);

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (id != null) {
            dispatch(editAuction(id, auctionData))
        } else {
            dispatch(addAuction(auctionData));
        }

    };

    return (
        <div className="modal fade" id="exampleModal" tabIndex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div className="modal-dialog">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title" id="exampleModalLabel">Auction Data</h5>
                        <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div className="modal-body">
                        <form onSubmit={handleSubmit}>
                            <div className="mb-3">
                                <label htmlFor="date" className="col-form-label">Date:</label>
                                <input value={auctionData.date || ''} type="date" className="form-control" name='date' onChange={(e) => setAuctionData({...auctionData, date: e.target.value })}/>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="time" className="col-form-label">Time:</label>
                                <input value={auctionData.time || ''} type="time" className="form-control" name='time' onChange={(e) => setAuctionData({...auctionData, time: e.target.value })}/>
                            </div>
                                <label htmlFor="place" className="col-form-label">Place:</label>
                                <input value={auctionData.place || ''} type="text" className="form-control" name='place' onChange={(e) => setAuctionData({...auctionData, place: e.target.value })}/>
                            <div className="mb-3">
                                <label htmlFor="description" className="col-form-label">Description:</label>
                                <input value={auctionData.description || ''} type="text" className="form-control" name='description' onChange={(e) => setAuctionData({...auctionData, description: e.target.value })}/>
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

export default AuctionForm;
