import { combineReducers } from 'redux';
import sellersReducer from "./sellersReducer";
import customersReducer from "./customersReducer";
import auctionsReducer from "./auctionsReducer";
import itemsReducer from "./itemsReducer";
import auction_itemsReducer from "./actions_itemsReducers";

const rootReducer = combineReducers({
    seller: sellersReducer,
    customer: customersReducer,
    auction: auctionsReducer,
    item: itemsReducer,
    auction_item: auction_itemsReducer,
    });

export default rootReducer;
