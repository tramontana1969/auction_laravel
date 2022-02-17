import {LIST_AUCTION_ITEMS,
    LIST_AUCTION_ITEMS_FAILURE,
    SHOW_AUCTION_ITEM,
    SHOW_AUCTION_ITEM_FAILURE,
    ADD_AUCTION_ITEM,
    ADD_AUCTION_ITEM_FAILURE,
    EDIT_AUCTION_ITEM,
    EDIT_AUCTION_ITEM_FAILURE,
    DELETE_AUCTION_ITEM,
    DELETE_AUCTION_ITEM_FAILURE
} from "../types/auction_itemsTypes";

const initialState = {
    auction_items: [],
    one_auction_item: [],
    fetching: false,
    fetched: false,
    error: null
}

const auction_itemsReducer = function state(state = initialState, action) {
    switch (action.type) {
        case LIST_AUCTION_ITEMS:
            return {...state, fetching: false, fetched: true, auction_items: action.payload};
        case LIST_AUCTION_ITEMS_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case ADD_AUCTION_ITEM:
            return {...state, fetching: false, fetched: true};
        case ADD_AUCTION_ITEM_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case SHOW_AUCTION_ITEM:
            return {...state, fetching: false, fetched: true, one_auction_item: action.payload};
        case SHOW_AUCTION_ITEM_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case EDIT_AUCTION_ITEM:
            return {...state, fetching: false, fetched: true};
        case EDIT_AUCTION_ITEM_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case DELETE_AUCTION_ITEM:
            return {...state, fetching: false, fetched: true};
        case DELETE_AUCTION_ITEM_FAILURE:
            return {...state, fetching: false, error: action.payload};
        default:
            return state;
    }
}

export default auction_itemsReducer;
