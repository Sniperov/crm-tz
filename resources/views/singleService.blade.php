@extends('layouts.app')

@section('content')
    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif

    <div>
        {{$service->name}}
    </div>
    <div>
        {{$service->description}}
    </div>

    <div>Задачи</div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Сроки</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        <tbody>
        @foreach($service->tasks as $t)
            <tr>
                <td>{{$t->name}}</td>
                <td>{{$t->description}}</td>
                <td>{{$t->time}}</td>
                <td>{{$t->price}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <form method="POST" action="/service/buy">
        {{ csrf_field() }}
        <input type="hidden" name="serviceId" value="{{$service->id}}">
        <button type="submit" class="btn btn-success btn-lg btn-block">Купить</button>
    </form>
    @foreach(Auth::user()->roles as $role)
        @if($role->name == 'a')
            <a href="/service/edit/{{$service->id}}" type="button" class="btn btn-success btn-lg btn-block">Редактировать</a>
        @endif
        @continue
    @endforeach
@endsection