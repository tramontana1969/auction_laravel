import React from 'react';
import {Route, Routes, BrowserRouter} from 'react-router-dom';
import Main from "./components/mainpage";
import ListSellers from "./components/pages/sellers/Index";
import ShowSeller from "./components/pages/sellers/showSeller";
import ListCustomers from "./components/pages/customers/Index";
import ShowCustomer from "./components/pages/customers/showCustomer";
import ListAuctions from "./components/pages/auctions/Index";
import ShowAuction from "./components/pages/auctions/showAuction";
import ListItems from "./components/pages/items/Index";
import OneItem from "./components/pages/items/showItem";
import ListAuction_Items from "./components/pages/auction_items/Index";
import One_Auction_Item from "./components/pages/auction_items/showAuction_Item";

function Routers()
{
    return (
        <BrowserRouter >
            <Routes >
                <Route path='/' element={<Main />} />
                <Route path='/sellers/' element={<ListSellers />}/>
                <Route path='/sellers/:id' element={<ShowSeller />}/>
                <Route path='/customers/' element={<ListCustomers />}/>
                <Route path='/customers/:id' element={<ShowCustomer />}/>
                <Route path='/auctions/' element={<ListAuctions />}/>
                <Route path='/auctions/:id' element={<ShowAuction />}/>
                <Route path='/items/' element={<ListItems />}/>
                <Route path='/items/:id' element={<OneItem />}/>
                <Route path='/prices/' element={<ListAuction_Items />}/>
                <Route path='/prices/:id' element={<One_Auction_Item />}/>
            </Routes>
        </BrowserRouter>
    )
}
export default Routers;
