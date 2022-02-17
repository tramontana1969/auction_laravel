import {LIST_SELLERS,
    LIST_SELLERS_FAILURE,
    SHOW_SELLER,
    SHOW_SELLER_FAILURE,
    ADD_SELLER,
    ADD_SELLER_FAILURE,
    EDIT_SELLER,
    EDIT_SELLER_FAILURE,
    DELETE_SELLER,
    DELETE_SELLER_FAILURE
} from "../types/sellersTypes";

const initialState = {
    sellers: [],
    one_seller: [],
    fetching: false,
    fetched: false,
    error: null,
};

const sellersReducer = function state (state = initialState, action) {
    switch (action.type) {
        case LIST_SELLERS:
            return {...state, fetching: false, fetched: true, sellers: action.payload};
        case LIST_SELLERS_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case ADD_SELLER:
            return {...state, fetching: false, fetched: true};
        case ADD_SELLER_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case SHOW_SELLER:
            return {...state, fetching: false, fetched: true, one_seller: action.payload};
        case SHOW_SELLER_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case EDIT_SELLER:
            return {...state, fetching: false, fetched: true};
        case EDIT_SELLER_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case DELETE_SELLER:
            return {...state, fetching: false, fetched: true};
        case DELETE_SELLER_FAILURE:
            return {...state, fetching: false, error: action.payload};
        default:
            return state;
    }
}

export default sellersReducer;
