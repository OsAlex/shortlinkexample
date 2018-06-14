@extends('layouts.app')

@section('headcontent')
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ voyager_asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ voyager_asset('css/login.css') }}">
    <style>
        body {  
            background-color: {{ Voyager::setting("admin_bg_color", "#FFFFFF" ) }};
        }
        .login-sidebar:after {
            background: linear-gradient(-135deg, {{config('voyager.login.gradient_a','#ffffff')}}, {{config('voyager.login.gradient_b','#ffffff')}});
            background: -webkit-linear-gradient(-135deg, {{config('voyager.login.gradient_a','#ffffff')}}, {{config('voyager.login.gradient_b','#ffffff')}});
        }
        .login-button, .bar:before, .bar:after{
            background:{{ config('voyager.primary_color','#22A7F0') }};
        }

    </style>
@endsection

@section('content')
<div class="container">
    <div class="faded-bg animated"></div>
    <div class="row">
        <div class="hidden-xs col-sm-12 col-md-7 col-md-offset-2">
            <div class="clearfix">
                @if(Voyager::setting('admin_icon_image', '') != '')
                <a href="{{ config('app.url') }}">
                    <img class="img-responsive pull-left logo hidden-xs animated fadeIn" src="{{ Voyager::image(Voyager::setting('admin_icon_image', '')) }}" alt="Logo Upravdom.com">
                </a>
                @endif
                <div class="copy animated fadeIn">
                    <h1>{{ Voyager::setting('admin_title', '') }}</h1>
                    <p>{{ Voyager::setting('admin_description', '') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Сброс пароля</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Укажите ваш E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder=" " required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <a class="btn btn-default pull-right" href="{{ route('login') }}">
                                    Назад
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Отправить ссылку для сброса пароля
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
