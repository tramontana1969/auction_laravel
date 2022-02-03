<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prices</title>
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
        @for($i = 0; $i < count($auction_items); $i++)
            <tr>
                <td><a href="/prices/{{ $auction_items[$i]['id'] }}">{{ $auction_items[$i]['id'] }}</a></td>
                <td><a href="/auctions/{{ $auction_items[$i]['auction_id'] }}">{{ $auction_items[$i]['auction_id'] }}</a></td>
                <td><a href="/items/{{ $auction_items[$i]['item_id'] }}">{{ $auction_items[$i]['item_id'] }}</a></td>
                <td>{{ $auction_items[$i]['start_price'] }}</td>
                <td>{{ $auction_items[$i]['actual_price'] }}</td>
                <td>{{ $auction_items[$i]['description'] }}</td>
            </tr>
        @endfor
    </table>

    <button style="margin-left: 0.8%" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
        Add data
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Auction:</label>
                            <select class="form-select" aria-label="Default select example" name="auction_id">
                                @for($i = 0; $i < count($auctions); $i++)
                                    <option value="{{ $auctions[$i]['id'] }}">
                                        {{ $auctions[$i]['place'] }}, {{ $auctions[$i]['date'] }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Item:</label>
                            <select class="form-select" aria-label="Default select example" name="item_id">
                                @for($i = 0; $i < count($items); $i++)
                                    <option value="{{ $items[$i]['id'] }}">{{ $items[$i]['name'] }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Start Price:</label>
                            <input type="number" class="form-control" name="start_price">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Actual Price:</label>
                            <input type="number" class="form-control" name="actual_price">
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
@endsection
</body>
</html>
