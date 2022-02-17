import React from "react";
import {addSeller, editSeller} from "../../../store/actions/sellersActions";
import {useEffect, useState} from "react";
import {useDispatch, useSelector} from "react-redux";
import {useParams} from "react-router-dom";

function SellerForm() {
    const dispatch = useDispatch()
    const [sellerData, setSellerData] = useState({name: ''});
    const seller = useSelector((state) => state.seller);
    const {id} = useParams()

    useEffect(() => {
        if (id != null) {
            setSellerData(seller.one_seller)
        }
    }, [seller]);

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (id != null) {
            dispatch(editSeller(id, sellerData))
        } else {
            dispatch(addSeller(sellerData));
        }
    };

    return (
        <div className="modal fade" id="exampleModal" tabIndex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div className="modal-dialog">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title" id="exampleModalLabel">Seller Data</h5>
                        <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div className="modal-body">
                        <form onSubmit={handleSubmit}>
                            <div className="mb-3">
                                <label htmlFor="name" className="col-form-label">Name:</label>
                                <input type="text" value={sellerData.name || ''} className="form-control" name='name' onChange={(e) => setSellerData({name: e.target.value })}/>
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

export default SellerForm;
