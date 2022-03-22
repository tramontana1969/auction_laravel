<!DOCTYPE html>
<html>
<head>
    <title>{{ $auction['place'] }}, {{ $auction['date'] }}</title>
</head>
<body>
@extends('main')
@section('content')
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>date</th>
            <th>time</th>
            <th>place</th>
            <th>description</th>
        </tr>
        <tr>
            <td>{{ $auction['id'] }}</td>
            <td>{{ $auction['date'] }}</td>
            <td>{{ $auction['time'] }}</td>
            <td>{{ $auction['place'] }}</td>
            <td>{{ $auction['description'] }}</td>
        </tr>
    </table>

    @role('manager|admin')
        <button style="margin-left: 0.8%" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
            Edit
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Auction</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $auction['id'] }}"/>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Date:</label>
                                <input type="date" class="form-control" name="date" value="{{ $auction['date'] }}">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Time:</label>
                                <input type="time" class="form-control" name="time" value="{{ $auction['time'] }}">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Place:</label>
                                <input type="text" class="form-control" name="place" value="{{ $auction['place'] }}">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <input type="text" class="form-control" name="description" value="{{ $auction['description'] }}">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button style="background-color: darkred; color: black" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                        <a href="/auctions/delete/{{ $auction['id'] }}">
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
