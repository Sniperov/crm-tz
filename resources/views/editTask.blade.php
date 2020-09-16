@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить услугу</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/task/add">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Название</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $task->name }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Описание</label>

                                <div class="col-md-6">
                                    <textarea id="name" type="text" class="form-control" name="description" value="{{ $task->description }}" required autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Цена</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="price" value="{{ $task->price }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Сроки</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="time" value="{{ $task->time }}" required autofocus>
                                </div>
                            </div>
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