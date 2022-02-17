import React from 'react';
import {useSelector, useDispatch} from "react-redux";
import {useEffect} from "react";
import Row from "./Row";
import {listSellers} from '../../../store/actions/sellersActions';
import AddingButton from "../../addingButton";
import SellerForm from "./sellerForm";

function Index() {

    const sellers = useSelector((state) => state.seller.sellers)
    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(listSellers())
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
                sellers?(
                    sellers.map(item => <Row key={item.id} seller={item} />)
                ):null
                }
                </tbody>
            </table>
            <AddingButton />
            <SellerForm />
        </div>
    )
}

export default Index;
