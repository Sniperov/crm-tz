@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Цена</th>
            <th scope="col">Сроки</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $t)
            <tr>
                <th scope="row">{{$t->id}}</th>
                <td>{{$t->name}}</td>
                <td>{{$t->description}}</td>
                <td>{{$t->price}}</td>
                <td>{{$t->time}}</td>
                <td><a type="button" class="btn btn-primary" href="/task/edit/{{$t->id}}">Редактировать</a><br>
                    <a type="button" class="btn btn-danger" href="/task/delete/{{$t->id}}">Удалить</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/task/add" type="button" class="btn btn-success btn-lg btn-block">Добавить задачу</a>
@endsection