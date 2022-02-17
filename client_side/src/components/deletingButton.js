import React from "react";

function deletingButton () {
    return (
        <button style={{background: 'darkred', marginLeft: '10px'}} type="button" className="btn btn-primary"
                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Delete
        </button>
    )
}

export default deletingButton;
