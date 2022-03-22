<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $seller['name'] }}</title>
</head>
<body>
@extends('main')
@section('content')
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
        <tr>
            <td>{{ $seller['id'] }}</td>
            <td>{{ $seller['name'] }}</td>
        </tr>
    </table>

    <!-- Button trigger modal -->
    @role('admin')
        <button style="margin-left: 10px; background-color: darkred; color: black" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Delete
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Please confirm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        This action will delete data. Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="/sellers/delete/{{ $seller['id'] }}">
                            <button style="background-color: darkred; color: black" type="button" class="btn btn-primary">Delete</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endrole
@endsection
</body>
</html>
