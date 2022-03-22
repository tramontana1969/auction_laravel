<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Items</title>
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
        @for($i = 0; $i < count($items); $i++)
            <tr>
                <td><a href="/items/{{ $items[$i]['id'] }}">{{ $items[$i]['id'] }}</a></td>
                <td>{{ $items[$i]['name'] }}</td>
                <td>{{ $items[$i]['lot'] }}</td>
                <td><a href="sellers/{{ $items[$i]['seller_id'] }}">{{ $items[$i]['seller_id'] }}</a></td>
                <td><a href="customers/{{ $items[$i]['customer_id'] }}">{{ $items[$i]['customer_id'] }}</a></td>
            </tr>
        @endfor
    </table>

    @role('user|admin')
    <button style="margin-left: 0.8%" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
        Add item
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Lot:</label>
                            <input type="number" class="form-control" name="lot">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="seller_id" value="{{$user['id']}}"/>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Customer:</label>
                            <select class="form-select" aria-label="Default select example" name="customer_id">
                                <option selected> </option>
                                @for($i = 0; $i < count($customers); $i++)
                                    <option value="{{ $customers[$i]['id'] }}">{{ $customers[$i]['name'] }}</option>
                                @endfor
                            </select>
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
