@extends('layouts.app')

@section('content')
    <div>
        {{$order->name}}
    </div>
    <div>
        {{$order->description}}
    </div>

    <div>Задачи</div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Сроки</th>
            <th scope="col">Цена</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orderTasks as $t)
            <tr>
                <td>{{$t->task->name}}</td>
                <td>{{$t->task->description}}</td>
                <td>{{$t->task->time}}</td>
                <td>{{$t->task->price}}</td>
                <td>{{$t->status}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection