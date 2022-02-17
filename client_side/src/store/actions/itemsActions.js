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
import Items from "../../api/itemsApi";

function listItems() {
    return function (dispatch) {
        Items.list().then(response => {
            dispatch({
               type: LIST_ITEMS,
               payload: response.data
            });
        }).catch(error => {
           dispatch({
               type: LIST_ITEMS_FAILURE,
               payload: error
           });
        })
    }
}

function showItem(id) {
    return function (dispatch) {
        Items.showOne(id).then(response => {
            dispatch({
                type: SHOW_ITEMS,
                payload: response.data
            });
        }).catch(error => {
            dispatch({
                type: SHOW_ITEMS_FAILURE,
                payload: error
            });
        });
    }
}

function addItem(data) {
    return function (dispatch) {
        Items.add(data).then(response => {
            window.location.replace("/items/")
            dispatch({
                type: ADD_ITEMS,
            });
        }).catch(error => {
            dispatch({
                type: ADD_ITEMS_FAILURE,
                payload: error
            });
        })
    }
}

function editItem(id, data) {
    return function (dispatch) {
        Items.edit(id, data).then(response => {
            window.location.replace("/items/" + id)
            dispatch({
                type: EDIT_ITEMS,
            });
        }).catch(error => {
            dispatch({
                type: EDIT_ITEMS_FAILURE,
                payload: error
            });
        })
    }
}

function deleteItem(id) {
    return function (dispatch) {
        Items.delete(id).then(response => {
            window.location.replace("/items/")
            dispatch({
                type: DELETE_ITEM,
            });
        }).catch(error => {
            dispatch({
                type: DELETE_ITEM_FAILURE,
                payload: error
            });
        })
    }
}

export {listItems, showItem, addItem, editItem, deleteItem};
