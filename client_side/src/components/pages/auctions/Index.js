import React, {useEffect} from "react";
import {useDispatch, useSelector} from "react-redux";
import Row from './Row';
import {listAuctions} from "../../../store/actions/auctionsActions"
import AddingButton from "../../addingButton";
import AAddingAuction from "./auctionForm";

function Index () {

    const auctions = useSelector((state) => state.auction.auctions)
    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(listAuctions())
    },[])

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
                        auctions?(
                            auctions.map(item => <Row key={item.id} auction={item}/>)
                        ) : null
                    }
                    </tbody>
                </table>
                <AddingButton />
                <AAddingAuction />
            </div>
        )
}

export default Index;
