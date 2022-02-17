import React from 'react';

function Sidebar() {
    return (
        <div className="border-end bg-white" id="sidebar-wrapper">
            <div className="sidebar-heading border-bottom bg-light">Auction Corporation</div>
            <div className="list-group list-group-flush">
                <a className="list-group-item list-group-item-action list-group-item-light p-3"
                   href="/auctions">Auctions</a>

                <a className="list-group-item list-group-item-action list-group-item-light p-3"
                   href="/items">Items</a>
                <a className="list-group-item list-group-item-action list-group-item-light p-3"
                   href="/sellers">Sellers</a>
                <a className="list-group-item list-group-item-action list-group-item-light p-3"
                   href="/customers">Customers</a>
                <a className="list-group-item list-group-item-action list-group-item-light p-3"
                   href="/prices">Prices</a>
            </div>
        </div>
    );
}
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            document.body.classList.toggle('sb-sidenav-toggled');
        }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
export default Sidebar;
