import React from "react";
import {useEffect} from "react";
import {useDispatch, useSelector} from "react-redux";
import {showSeller} from "../../../store/actions/sellersActions";
import {useParams} from "react-router-dom";
import EditingButton from "../../editingButton";
import SellerForm from "./sellerForm";
import DeletingButton from "../../deletingButton";
import DeleteSeller from "./deleteSeller";

function OneSeller () {

    const dispatch = useDispatch();
    const { id } = useParams();
    const seller = useSelector((state) => state.seller.one_seller);

    useEffect(() => {
        dispatch(showSeller(id))
    },[])

    return (
        <div>
            <table className="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                </tr>
                </thead>
                <tbody>
                {
                    <tr>
                        <td>{seller.id}</td>
                        <td>{seller.name}</td>
                    </tr>
                }
                </tbody>
            </table>
            <EditingButton />
            <SellerForm />
            <DeletingButton />
            <DeleteSeller />
            <DeleteSeller />
        </div>
    )
}

export default OneSeller;
