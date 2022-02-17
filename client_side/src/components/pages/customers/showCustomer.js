import React from "react";
import {useEffect} from "react";
import {useDispatch, useSelector} from "react-redux";
import {showCustomer} from "../../../store/actions/customersActions";
import {useParams} from "react-router-dom";
import EditingButton from "../../editingButton";
import CustomerForm from "./customerForm";
import DeletingButton from "../../deletingButton";
import DeleteCustomer from "./deleteCustomer";

function OneCustomer() {

    const dispatch = useDispatch();
    const customer = useSelector((state => state.customer.one_customer));
    const { id } = useParams();

    useEffect(() => {
        dispatch(showCustomer(id))
    }, []);

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
                        <td>{customer.id}</td>
                        <td>{customer.name}</td>
                    </tr>
                }
                </tbody>
            </table>
            <EditingButton />
            <CustomerForm />
            <DeletingButton />
            <DeleteCustomer />
        </div>
    )
}

export default OneCustomer;
