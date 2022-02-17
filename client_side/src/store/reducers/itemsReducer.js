import {LIST_ITEMS,
    LIST_ITEMS_FAILURE,
    SHOW_ITEMS,
    SHOW_ITEMS_FAILURE,
    ADD_ITEMS,
    ADD_ITEMS_FAILURE,
    EDIT_ITEMS,
    EDIT_ITEMS_FAILURE,
    DELETE_ITEM,
    DELETE_ITEM_FAILURE
} from "../types/itemsTypes";

const initialState = {
    items: [],
    one_item: [],
    fetching: false,
    fetched: false,
    error: null
}

const itemsReducer = function state(state = initialState, action) {
    switch (action.type) {
        case LIST_ITEMS:
            return {...state, fetching: false, fetched: true, items: action.payload};
        case LIST_ITEMS_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case ADD_ITEMS:
            return {...state, fetching: false, fetched: true};
        case ADD_ITEMS_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case SHOW_ITEMS:
            return {...state, fetching: false, fetched: true, one_item: action.payload};
        case SHOW_ITEMS_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case EDIT_ITEMS:
            return {...state, fetching: false, fetched: true};
        case EDIT_ITEMS_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case DELETE_ITEM:
            return {...state, fetching: false, fetched: true};
        case DELETE_ITEM_FAILURE:
            return {...state, fetching: false, error: action.payload};
        default:
            return state;
    }
}

export default itemsReducer;
