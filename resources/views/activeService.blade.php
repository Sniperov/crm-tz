@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $s)
            <tr>
                <th scope="row">{{$s->id}}</th>
                <td><a href="/order/{{$s->service->id}}">{{$s->service->name}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection