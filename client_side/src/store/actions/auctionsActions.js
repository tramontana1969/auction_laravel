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
} from '../types/auctionsTypes';
import Auctions from "../../api/auctionsApi";

function listAuctions() {
    return function (dispatch) {
        Auctions.list().then(response => {
            dispatch({
                type: LIST_AUCTIONS,
                payload: response.data
            });
        }).catch(error => {
            dispatch({
                type: LIST_AUCTIONS_FAILURE,
                payload: error
            });
        })
    }
}

function showAuction(id) {
    return function (dispatch) {
        Auctions.showOne(id).then(response => {
            dispatch({
                type: SHOW_AUCTION,
                payload: response.data
            });
        }).catch(error => {
            dispatch({
                type: SHOW_AUCTION_FAILURE,
                payback: error
            });
        });
    };
}

function addAuction(data) {
    return function (dispatch) {
        Auctions.add(data).then(response => {
            window.location.replace("/auctions/")
            dispatch({
                type: ADD_AUCTION,
            });
        }).catch(error => {
            dispatch({
                type: ADD_AUCTION_FAILURE,
                payload: error
            });
        })
    }
}

function editAuction(id, data) {
    return function (dispatch) {
        Auctions.edit(id, data).then(response => {
            window.location.replace("/auctions/" +id)
            dispatch({
                type: EDIT_AUCTION,
            });
        }).catch(error => {
            dispatch({
                type: EDIT_AUCTION_FAILURE,
                payload: error
            });
        })
    }
}

function deleteAuction(id) {
    return function (dispatch) {
        Auctions.delete(id).then(response => {
            window.location.replace("/auctions/")
            dispatch({
                type: DELETE_AUCTION,
            });
        }).catch(error => {
            dispatch({
                type: DELETE_AUCTION_FAILURE,
                payload: error
            });
        })
    }
}

export {listAuctions, showAuction, addAuction, editAuction, deleteAuction};
