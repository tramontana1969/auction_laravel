import React from "react";
import {addItem, editItem} from "../../../store/actions/itemsActions";
import {useEffect, useState} from "react";
import {useDispatch, useSelector} from "react-redux";
import {listSellers} from "../../../store/actions/sellersActions";
import {listCustomers} from "../../../store/actions/customersActions";
import {useParams} from "react-router-dom";

function ItemForm() {
    const dispatch = useDispatch()
    const [itemData, setItemData] = useState({name: '', lot:'', seller_id:'', customer_id:''});
    const item = useSelector((state) => state.item);
    const sellers = useSelector((state) => state.seller.sellers);
    const customers = useSelector((state) => state.customer.customers);
    const {id} = useParams();

    useEffect(() => {
        dispatch(listCustomers())
        dispatch(listSellers())
        if (id != null) {
            setItemData(item.one_item)
        }
    }, [item]);

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (id != null) {
            dispatch(editItem(id, itemData))
        } else {
            dispatch(addItem(itemData));
        }
    };

    return (
        <div className="modal fade" id="exampleModal" tabIndex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div className="modal-dialog">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title" id="exampleModalLabel">Item Data</h5>
                        <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div className="modal-body">
                        <form onSubmit={handleSubmit}>
                            <div className="mb-3">
                                <label htmlFor="name" className="col-form-label">Name:</label>
                                <input value={itemData.name || ''} type="text" className="form-control" name='name' onChange={(e) => setItemData({...itemData, name: e.target.value })}/>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="lot" className="col-form-label">Lot:</label>
                                <input value={itemData.lot || ''} type="number" className="form-control" name='lot' onChange={(e) => setItemData({...itemData, lot: e.target.value })}/>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="seller_id" className="col-form-label">seller_id:</label>
                                <select value={itemData.seller_id || ''} className="form-select" aria-label="Default select example" name="seller_id" onChange={(e) => setItemData({...itemData, seller_id: e.target.value })}>
                                    <option defaultValue>Required Option!!!</option>
                                    {sellers ? (
                                        sellers.map(item => <option value={item.id} key={item.id}>{item.name}</option>)
                                    ) : null}
                                </select>
                            </div>
                            <div className="mb-3">
                                <label htmlFor="customer_id" className="col-form-label">customer_id:</label>
                                <select value={itemData.customer_id || ''} className="form-select" aria-label="Default select example" name="customer_id" onChange={(e) => setItemData({...itemData, customer_id: e.target.value })}>
                                    <option defaultValue> </option>
                                    {customers ? (
                                        customers.map(item => <option value={item.id} key={item.id}>{item.name}</option>)
                                    ) : null}
                                </select>
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

export default ItemForm;
