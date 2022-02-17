import React, {useEffect} from "react";
import {useDispatch, useSelector} from "react-redux";
import Row from './Row';
import {listItems} from "../../../store/actions/itemsActions";
import AddingButton from "../../addingButton";
import ItemForm from "./itemForm";

function Index () {
    const dispatch = useDispatch();
    const items = useSelector((state) => state.item.items);
    useEffect(() => {
        dispatch(listItems())
    }, []);
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
                    items?(
                        items.map(item => <Row key={item.id} item={item}/>)
                    ) : null
                }
                </tbody>
            </table>
            <AddingButton />
            <ItemForm />
        </div>
    );
}

export default Index;
