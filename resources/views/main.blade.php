<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Auction Corporation</title>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/form.css') }}" rel="stylesheet" />
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">Auction Corporation</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/auctions">Auctions</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/items">Items</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/sellers">Sellers</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/customers">Customers</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Prices</a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle">Menu</button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        @section('content')
        <div class="container-fluid">
            <h1 class="mt-4">Auction Corporation Database</h1>
            <p>Here you can see an auction corporation database which consists of next tables:</p>
            <div>
                <ul>
                    <li class="nav-item active">Auctions table</li>
                    <li class="nav-item active">Items table</li>
                    <li class="nav-item active">Sellers table</li>
                    <li class="nav-item active">Customers table</li>
                    <li class="nav-item active">Prices table</li>
                </ul>
            </div>
            <p>
                All project was developed by using Laravel framework, Bootstrap and MySQL.
            </p>
        </div>
        @show
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
