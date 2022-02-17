import React from "react";
import {Link} from "react-router-dom";
import {useEffect} from "react";
import {useParams} from "react-router-dom";
import {useDispatch, useSelector} from "react-redux";
import {showItem} from "../../../store/actions/itemsActions";
import EditingButton from "../../editingButton";
import ItemForm from "./itemForm";
import DeletingButton from "../../deletingButton";
import DeleteItem from "./deleteItem";

function OneItem(props) {
    const {id} = useParams();
    const dispatch = useDispatch()
    const item = useSelector((state) => state.item.one_item)

    useEffect(() => {
        dispatch(showItem(id))
    }, [])
    return (
        <div>
            <table className="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>lot</th>
                    <th>seller_id</th>
                    <th>customer_id</th>
                </tr>
                </thead>
                <tbody>
                {
                    <tr>
                        <td>{item.id}</td>
                        <td>{item.name}</td>
                        <td>{item.lot}</td>
                        <td><Link to={'/sellers/' + item.seller_id}>{item.seller_id}</Link></td>
                        <td><Link to={'/customers/' + item.customer_id}>{item.customer_id}</Link></td>
                    </tr>
                }
                </tbody>
            </table>
            <EditingButton />
            <ItemForm />
            <DeletingButton />
            <DeleteItem />
        </div>
    )
}

export default OneItem;
