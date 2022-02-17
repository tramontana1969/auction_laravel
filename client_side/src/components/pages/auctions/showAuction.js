import React from "react";
import {useEffect} from "react";
import {useSelector, useDispatch} from "react-redux";
import {useParams} from "react-router-dom";
import {showAuction} from "../../../store/actions/auctionsActions";
import EditingButton from "../../editingButton";
import AuctionForm from "./auctionForm";
import DeletingButton from "../../deletingButton";
import DeleteAuction from "./deleteAuction";

function ShowAuction(props) {
    const dispatch = useDispatch();
    const {id} = useParams();
    const auction = useSelector((state) => state.auction.one_auction);

    useEffect(() => {
        dispatch(showAuction(id))
    },[]);

    return (
        <div>
            <table className="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>date</th>
                    <th>time</th>
                    <th>place</th>
                    <th>description</th>
                </tr>
                </thead>
                <tbody>
                {
                    <tr>
                        <td>{auction.id}</td>
                        <td>{auction.date}</td>
                        <td>{auction.time}</td>
                        <td>{auction.place}</td>
                        <td>{auction.description}</td>
                    </tr>
                }
                </tbody>
            </table>
            <EditingButton />
            <AuctionForm />
            <DeletingButton />
            <DeleteAuction />
        </div>
    );
}

export default ShowAuction;
