import {LIST_AUCTIONS,
    LIST_AUCTIONS_FAILURE,
    SHOW_AUCTION,
    SHOW_AUCTION_FAILURE,
    ADD_AUCTION,
    ADD_AUCTION_FAILURE,
    EDIT_AUCTION,
    EDIT_AUCTION_FAILURE,
    DELETE_AUCTION,
    DELETE_AUCTION_FAILURE
} from "../types/auctionsTypes";

const initialState = {
    auctions: [],
    one_auction: [],
    fetching: false,
    fetched: false,
    error: null,
}

const auctionsReducer = function state(state = initialState, action) {
    switch (action.type) {
        case LIST_AUCTIONS:
            return {...state, fetching: false, fetched: true, auctions: action.payload};
        case LIST_AUCTIONS_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case ADD_AUCTION:
            return {...state, fetching: false, fetched: true};
        case ADD_AUCTION_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case SHOW_AUCTION:
            return {...state, fetching: false, fetched: true, one_auction: action.payload};
        case SHOW_AUCTION_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case EDIT_AUCTION:
            return {...state, fetching: false, fetched: true};
        case EDIT_AUCTION_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case DELETE_AUCTION:
            return {...state, fetching: false, fetched: true};
        case DELETE_AUCTION_FAILURE:
            return {...state, fetching: false, error: action.payload};
        default:
            return state;
    }
}

export default auctionsReducer;
