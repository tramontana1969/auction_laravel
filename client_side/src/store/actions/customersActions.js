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
import Customers from "../../api/customersApi";

function listCustomers () {
    return function (dispatch) {
        Customers.list().then(response => {
            dispatch({
                type: LIST_CUSTOMERS,
                payload: response.data
            });
        }).catch(error => {
            dispatch({
                type: LIST_CUSTOMERS_FAILURE,
                payload: error
            });
        });
    }
}

function showCustomer(id) {
    return function (dispatch) {
        Customers.showOne(id).then(response => {
            dispatch({
                type: SHOW_CUSTOMER,
                payload: response.data
            });
        }).catch(error => {
            dispatch({
                type: SHOW_CUSTOMER_FAILURE,
                payload: error
            });
        });
    }
}

function addCustomer(name) {
    return function (dispatch) {
        Customers.add(name).then(response => {
            window.location.replace("/customers/")
            dispatch({
                type: ADD_CUSTOMER
            })
        }).catch(error => {
            dispatch({
                type: ADD_CUSTOMER_FAILURE,
                payload: error
            });
        });
    }
}

function editCustomer(id, data) {
    return function (dispatch) {
        Customers.edit(id, data).then(response => {
            window.location.replace("/customers/" + id)
            dispatch({
                type: EDIT_CUSTOMER
            })
        }).catch(error => {
            dispatch({
                type: EDIT_CUSTOMER_FAILURE,
                payload: error
            });
        });
    }
}

function deleteCustomer(id) {
    return function (dispatch) {
        Customers.delete(id).then(response => {
            window.location.replace("/customers/")
            dispatch({
                type: DELETE_CUSTOMER
            })
        }).catch(error => {
            dispatch({
                type: DELETE_CUSTOMER_FAILURE,
                payload: error
            });
        });
    }
}

export {listCustomers, showCustomer, addCustomer, editCustomer, deleteCustomer};
