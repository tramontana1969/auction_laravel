import React from "react";
import {addCustomer, editCustomer} from "../../../store/actions/customersActions";
import {useEffect, useState} from "react";
import {useDispatch, useSelector} from "react-redux";
import {useParams} from "react-router-dom";

function CustomerForm() {
    const dispatch = useDispatch()
    const [customerData, setCustomerData] = useState({name: ''});
    const customer = useSelector((state) => state.customer);
    const {id} = useParams()

    useEffect(() => {
        if (id != null) {
            setCustomerData(customer.one_customer)
        }
    }, [customer]);

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (id != null) {
            dispatch(editCustomer(id, customerData))
        } else {
            dispatch(addCustomer(customerData));
        }
    };

    return (
        <div className="modal fade" id="exampleModal" tabIndex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div className="modal-dialog">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title" id="exampleModalLabel">Customer Data</h5>
                        <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div className="modal-body">
                        <form onSubmit={handleSubmit}>
                            <div className="mb-3">
                                <label htmlFor="name" className="col-form-label">Name:</label>
                                <input value={customerData.name || ''} type="text" className="form-control" name='name' onChange={(e) => setCustomerData({...customerData, name: e.target.value })}/>
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

export default CustomerForm;
