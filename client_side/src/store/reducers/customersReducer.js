import {LIST_CUSTOMERS,
    LIST_CUSTOMERS_FAILURE,
    SHOW_CUSTOMER,
    SHOW_CUSTOMER_FAILURE,
    ADD_CUSTOMER,
    ADD_CUSTOMER_FAILURE,
    EDIT_CUSTOMER,
    EDIT_CUSTOMER_FAILURE,
    DELETE_CUSTOMER,
    DELETE_CUSTOMER_FAILURE
} from "../types/customersTypes";

const initialState = {
    customers: [],
    one_customer: [],
    fetching: false,
    fetched: false,
    error: null,
}

const customersReducer = function state (state = initialState, action) {
    switch (action.type) {
        case LIST_CUSTOMERS:
            return {...state, fetching: false, fetched: true, customers: action.payload};
        case LIST_CUSTOMERS_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case ADD_CUSTOMER:
            return {...state, fetching: false, fetched: true};
        case ADD_CUSTOMER_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case SHOW_CUSTOMER:
            return {...state, fetching: false, fetched: true, one_customer: action.payload};
        case SHOW_CUSTOMER_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case EDIT_CUSTOMER:
            return {...state, fetching: false, fetched: true};
        case EDIT_CUSTOMER_FAILURE:
            return {...state, fetching: false, error: action.payload};
        case DELETE_CUSTOMER:
            return {...state, fetching: false, fetched: true};
        case DELETE_CUSTOMER_FAILURE:
            return {...state, fetching: false, error: action.payload};
        default:
            return state;
    }
}

export default customersReducer;
