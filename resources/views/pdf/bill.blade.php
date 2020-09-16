<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="content-center">Счёт для {{Auth::user()->name}}, За услугу {{$service->name}}</div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        <tbody>
        @foreach($service->tasks as $t)
            <tr>
                <td>{{$t->name}}</td>
                <td>{{$t->description}}</td>
                <td>{{$t->price}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>