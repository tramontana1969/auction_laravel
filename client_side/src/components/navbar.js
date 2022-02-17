import React from "react";

function Navbar () {
    return (
        <div className="container-fluid">
            <button className="btn btn-primary" id="sidebarToggle">Menu</button>
            <button className="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse" id="navbarSupportedContent">
                <ul className="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li className="nav-item active"><a className="nav-link" href="/">Home</a></li>
                </ul>
            </div>
        </div>
    )
}


export default Navbar;
