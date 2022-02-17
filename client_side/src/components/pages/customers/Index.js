import React, {useEffect} from "react";
import {useDispatch, useSelector} from "react-redux";
import Row from './Row';
import {listCustomers} from "../../../store/actions/customersActions";
import AddingButton from "../../addingButton";
import AddingCustomer from "./customerForm";

function Index () {

    const customers = useSelector((state) => state.customer.customers)
    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(listCustomers())
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
                    customers?(
                        customers.map(item => <Row key={item.id} customer={item}/>)
                    ) : null
                }
                </tbody>
            </table>
            <AddingButton />
            <AddingCustomer />
        </div>
    )
}

export default Index;
