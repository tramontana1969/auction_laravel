import {
    LIST_SELLERS,
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
import Sellers from '../../api/sellersApi';

function listSellers() {
    return function (dispatch) {
        Sellers.list().then(response => {
            dispatch({
                type: LIST_SELLERS,
                payload: response.data
            });
        }).catch(error => {
            dispatch({
                type: LIST_SELLERS_FAILURE,
                payload: error
            });
        });
    }
}

function showSeller(id) {
    return function (dispatch) {
        Sellers.showOne(id).then(response => {
            dispatch({
                type: SHOW_SELLER,
                payload: response.data
            });
        }).catch(error => {
            dispatch({
                type: SHOW_SELLER_FAILURE,
                payload: error
            });
        })
    }
}

function addSeller(name) {
    return function (dispatch) {
        Sellers.add(name).then(response => {
            window.location.replace("/sellers/")
            dispatch({
                type: ADD_SELLER,
            });
        }).catch(error => {
            dispatch({
                type: ADD_SELLER_FAILURE,
                payload: error
            });
        })
    }
}

function editSeller(id, data) {
    return function (dispatch) {
        Sellers.edit(id, data).then(response => {
            window.location.replace("/sellers/" + id)
            dispatch({
                type: EDIT_SELLER,
            });
        }).catch(error => {
            dispatch({
                type: EDIT_SELLER_FAILURE,
                payload: error
            });
        })
    }
}

function deleteSeller(id) {
    return function (dispatch) {
        Sellers.delete(id).then(response => {
            window.location.replace('/sellers/');
            dispatch({
                type: DELETE_SELLER
            });
        }).catch(error => {
            dispatch({
                type: DELETE_SELLER_FAILURE,
                payload: error
            });
        });
    }
}

export {listSellers, showSeller, addSeller, editSeller, deleteSeller};
