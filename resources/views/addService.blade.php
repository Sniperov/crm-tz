@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить услугу</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/service/add">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Название</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Описание</label>

                                <div class="col-md-6">
                                    <textarea id="name" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>
                                </div>
                            </div>
                            @foreach($tasks as $task)
                                <div class="form-check">
                                    <label for="name" class="col-md-4 control-label"></label>
                                    <input class="form-check-input" type="checkbox" name="tasksId[]" value="{{$task->id}}" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        {{$task->name}} - {{$task->price}}
                                    </label>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Подтвердить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection