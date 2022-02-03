<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $item['name'] }}</title>
</head>
<body>
@extends('main')
@section('content')
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>lot</th>
            <th>seller_id</th>
            <th>customer_id</th>
        </tr>
        <tr>
            <td>{{ $item['id'] }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['lot'] }}</td>
            <td><a href="/sellers/{{ $item['seller_id'] }}">{{ $item['seller_id'] }}</a></td>
            <td><a href="/customers/{{ $item['customer_id'] }}">{{ $item['customer_id'] }}</a></td>
        </tr>
    </table>
    <button style="margin-left: 0.8%" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
        Edit
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item['id'] }}"/>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ $item['name'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Lot:</label>
                            <input type="number" class="form-control" name="lot" value="{{ $item['lot'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Seller:</label>
                            <select class="form-select" aria-label="Default select example" name="seller_id">
                                <option selected value="{{ $seller['id'] }}">{{ $seller['name'] }}</option>
                                @foreach($other_sellers as $data)
                                    <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Customer:</label>
                            <select class="form-select" aria-label="Default select example" name="customer_id">
                                @if ($customer === null)
                                    <option selected> </option>
                                    @foreach($all_customers as $data)
                                        <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                    @endforeach
                                @else
                                    <option selected value="{{ $customer['id'] }}">{{ $customer['name'] }}</option>
                                    <option> </option>
                                    @foreach($other_customers as $data)
                                        <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                    @endforeach
                                @endif
                            </select>
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
                    <a href="/items/delete/{{ $item['id'] }}">
                        <button style="background-color: darkred; color: black" type="button" class="btn btn-primary">Delete</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
