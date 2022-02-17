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
import Auction_Items from "../../api/auction_itemsApi";

function listAuction_Items() {
    return function (dispatch) {
        Auction_Items.list().then(response => {
            dispatch({
                type: LIST_AUCTION_ITEMS,
                payload: response.data
            });
        }).catch(error => {
            dispatch({
                type: LIST_AUCTION_ITEMS_FAILURE,
                payload: error
            });
        });
    }
}

function showAuction_Item(id) {
    return function (dispatch) {
        Auction_Items.showOne(id).then(response => {
            dispatch({
                type: SHOW_AUCTION_ITEM,
                payload: response.data
            });
        }).catch(error => {
            dispatch({
                type: SHOW_AUCTION_ITEM_FAILURE,
                payload: error
            });
        });
    };
}

function addAuction_Item(data) {
    return function (dispatch) {
        Auction_Items.add(data).then(response => {
            window.location.replace("/prices/")
            dispatch({
                type: ADD_AUCTION_ITEM,
            });
        }).catch(error => {
            dispatch({
                type: ADD_AUCTION_ITEM_FAILURE,
                payload: error
            });
        })
    }
}

function editAuction_Item(id, data) {
    return function (dispatch) {
        Auction_Items.edit(id, data).then(response => {
            window.location.replace("/prices/" + id)
            dispatch({
                type: EDIT_AUCTION_ITEM,
            });
        }).catch(error => {
            dispatch({
                type: EDIT_AUCTION_ITEM_FAILURE,
                payload: error
            });
        })
    }
}

function deleteAuction_Item(id) {
    return function (dispatch) {
        Auction_Items.delete(id).then(response => {
            window.location.replace("/prices/")
            dispatch({
                type: DELETE_AUCTION_ITEM,
            });
        }).catch(error => {
            dispatch({
                type: DELETE_AUCTION_ITEM_FAILURE,
                payload: error
            });
        })
    }
}

export {listAuction_Items, showAuction_Item, addAuction_Item, editAuction_Item, deleteAuction_Item};
