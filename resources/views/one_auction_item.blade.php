<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auction Data</title>
</head>
<body>
@extends('main')
@section('content')
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>auction_id</th>
            <th>item_id</th>
            <th>start_price</th>
            <th>actual_price</th>
            <th>description</th>
        </tr>
        <tr>
            <td>{{ $auction_item['id'] }}</td>
            <td><a href="/auctions/{{ $auction_item['auction_id'] }}">{{ $auction_item['auction_id'] }}</a></td>
            <td><a href="/items/{{ $auction_item['item_id'] }}">{{ $auction_item['item_id'] }}</a></td>
            <td>{{ $auction_item['start_price'] }}</td>
            <td>{{ $auction_item['actual_price'] }}</td>
            <td>{{ $auction_item['description'] }}</td>
        </tr>
    </table>

    <button style="margin-left: 0.8%" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
        Edit
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $auction_item['id'] }}"/>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Auction:</label>
                            <select class="form-select" aria-label="Default select example" name="auction_id">
                                <option selected value="{{ $auction['id'] }}">{{ $auction['place'] }}, {{ $auction['date'] }}</option>
                                @foreach($other_auctions as $data)
                                    <option value="{{ $data['id'] }}">{{ $data['place'] }}, {{ $data['date'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Item:</label>
                            <select class="form-select" aria-label="Default select example" name="item_id">
                                <option selected value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @foreach($other_items as $data)
                                    <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Start price:</label>
                            <input type="number" class="form-control" name="start_price" value="{{ $auction_item['start_price'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Actual price:</label>
                            <input type="number" class="form-control" name="actual_price" value="{{ $auction_item['actual_price'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Description:</label>
                            <input type="text" class="form-control" name="description" value="{{ $auction_item['description'] }}">
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
                    <a href="/prices/delete/{{ $auction_item['id'] }}">
                        <button style="background-color: darkred; color: black" type="button" class="btn btn-primary">Delete</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
