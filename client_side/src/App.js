import React, { Component } from 'react';
import Sidebar from "./components/sidebar";
import Navbar from "./components/navbar";
import Routers from "./Routes";

class App extends Component {
    render() {
        return (
            <div className="d-flex" id="wrapper">
                <Sidebar />
                <div id="page-content-wrapper">
                    <nav className="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                        <Navbar />
                    </nav>
                    <div className="container-fluid">
                        <Routers/>
                    </div>
                </div>
            </div>
        )
    }
}
export default App;
