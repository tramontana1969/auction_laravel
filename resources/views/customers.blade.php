<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
</head>
<body>
@extends('main')
@section('content')
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
        @for($i = 0; $i < count($customers); $i++)
            <tr>
                <td><a href="/customers/{{ $customers[$i]['id'] }}">{{ $customers[$i]['id'] }}</a></td>
                <td>{{ $customers[$i]['name'] }}</td>
            </tr>
        @endfor
    </table>
@endsection
</body>
</html>
