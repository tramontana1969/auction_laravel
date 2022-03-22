<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
@extends('main')
@section('content')
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>role</th>
        </tr>
        @for($i = 0; $i < count($users); $i++)
            <tr>
                <td><a href="/admin/user/{{ $users[$i]['id'] }}">{{ $users[$i]['id'] }}</a></td>
                <td>{{ $users[$i]['name'] }}</td>
                <td>{{ $users[$i]['email'] }}</td>

                <td>{{ ($users[$i]->getRoleNames()[0]) }}</td>
            </tr>
        @endfor
    </table>
@endsection
</body>
</html>
