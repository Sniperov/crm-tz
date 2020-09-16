@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Подтердите телефон</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/accept">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Код подтверждения</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>
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
    </div>
@endsection