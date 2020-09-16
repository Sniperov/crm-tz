@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Тип</th>
            <th scope="col">$</th>
            <th scope="col">Описание</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $p)
            <tr>
                <th scope="row">{{$p->type}}</th>
                <td>{{$p->value}}</td>
                <td>{{$p->description}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection