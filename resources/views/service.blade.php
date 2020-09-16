@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $s)
        <tr>
            <th scope="row">{{$s->id}}</th>
            <td><a href="/service/{{$s->id}}">{{$s->name}}</a></td>
            <td>{{$s->description}}</td>
            <td>{{$s->price}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @foreach(Auth::user()->roles as $role)
        @if($role->name == 'a')
            <a href="/service/add" type="button" class="btn btn-success btn-lg btn-block">Добавить услугу</a>
        @endif
        @continue
    @endforeach
@endsection