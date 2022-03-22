<!DOCTYPE html>
<head>
    <title>Auctions</title>
</head>
<html>
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
        @for($i = 0; $i < count($auctions); $i++)
            <tr>
                <td><a href="/auctions/{{ $auctions[$i]['id'] }}">{{ $auctions[$i]['id'] }}</a></td>
                    <td>{{ $auctions[$i]['date'] }}</td>
                    <td>{{ $auctions[$i]['time'] }}</td>
                    <td>{{ $auctions[$i]['place'] }}</td>
                    <td>{{ $auctions[$i]['description'] }}</td>
            </tr>
        @endfor
    </table>

    @role('manager|admin')
        <button style="margin-left: 0.8%" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
            Add auction
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Auction</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Date:</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Time:</label>
                                <input type="time" class="form-control" name="time">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Place:</label>
                                <input type="text" class="form-control" name="place">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endrole
@endsection
</body>
</html>
