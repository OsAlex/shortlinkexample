@extends('layouts.app')

@section('headcontent')
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ voyager_asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ voyager_asset('css/login.css') }}">
    <style>
        body {
            background-size: cover;
            background-position: 50% 100%;
            background-repeat: no-repeat;
        }
        .login-sidebar {
            background: transparent;
            flex: 1 0 25%;
            padding: 0 5%;
        }
        .login-button, .bar:before, .bar:after{
            background:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .login-top-container {
            height: 200px;
            border-bottom: 20px solid #FCEA7E;
            background-size: 100% auto;
            background-position: 100% 100%;
            background-repeat: no-repeat;
        }
        .login-container {
            position: relative;
            margin: 0;
            top: 0;
            background: #E7CB09;
            padding: 0;
            height: 100%;
            background-size: contain;
            background-repeat: repeat-y;
        }
        .login-container form {
            background: #fff;
            padding: 30px;
            border-bottom: 20px solid #FEF200;
        }
        .login-container form .login-button {
            background-color: #E7CB08;
            color: #000;
            font-size: 14px;
            text-transform: uppercase;
            width: auto;
            margin: 0 auto;
            padding: 6px 24px;
            font-weight: bold;
        }
        .login-container h2 {
            margin-bottom: 25px;
            display: flex;
            justify-content: left;
            align-items: center;
        }
        .h2-logo {
            background-size: contain;
            background-repeat: no-repeat;
            display: block;
            height: 40px;
            width: 40px;
            margin-right: 10px;
        }
        .alert-new {
            background-color: rgba(255, 184, 170, 0.5);
            border-color: #fb927d;
            color: #7c1a06;
        }
        .alert-danger {
            margin-bottom: 5px;
            padding: 5px;
        }
        .alert .close {
            margin: 0 5px;
        }
        /* first apr */
        .animation__eye {
            position: absolute;
            display: none;
            width: 6px;
            height: 5px;
            background-image: url("/storage/posts/eye.png");
            background-repeat: no-repeat;
            z-index: 1;
            opacity: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div style="display: flex;justify-content: space-around;">
            <div class="hidden-xs" style="flex: 0 0 66%;">
                <a href="{{ config('app.url') }}">
                </a>
            </div>

            <div class="login-sidebar animated fadeInRightBig">
                <div class="login-container animated fadeInRightBig">
                    <form action="{{ route('voyager.login') }}" method="POST">
                    {{ csrf_field() }}
                    <h2><span class="h2-logo"></span> Авторизация:</h2>
                    <div class="group">
                            <input class="js-email" type="email" name="email" value="{{ old('email') ? old('email') : (\Request::has('login') ? \Request::get('login') : '' ) }}" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><i class="glyphicon glyphicon-user"></i><span class="span-input"> Эл. почта</span></label>
                    </div>

                    <div class="group">
                            <input class="js-password" type="password" name="password" value="{{ old('password') ? old('password') : (\Request::has('pass') ? \Request::get('pass') : '' ) }}" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><i class="glyphicon glyphicon-lock"></i><span class="span-input"> Пароль</span></label>
                    </div>

                    <button type="submit" class="btn btn-block login-button">
                        <span class="signingin hidden"><span class="glyphicon glyphicon-refresh"></span> Авторизация...</span>
                        <span class="signin">Вход</span>
                    </button>
                    <br>
                    <a class="btn btn-xs btn-default" href="{{ route('password.request') }}">Забыли пароль?</a>
                    <a class="btn btn-xs btn-default" href="{{ route('register') }}">Регистрация</a>
                    @if(!$errors->isEmpty())
                        <a class="btn btn-xs btn-default" href="{{ route('logintrouble') }}">Проблемы с доступом к порталу?</a>
                    @endif
                  </form>

                  @if(!$errors->isEmpty())
                  <div class="alert alert-black alert-new">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                  </div>
                  @endif

                </div> <!-- .login-container -->

            </div> <!-- .login-sidebar -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection

@push('extscripts')
    <script type="text/javascript">
        var btn = document.querySelector('button[type="submit"]');
        var form = document.forms[0];
        btn.addEventListener('click', function(ev){
            if (form.checkValidity()) {
                btn.querySelector('.signingin').className = 'signingin';
                btn.querySelector('.signin').className = 'signin hidden';
            } else {
                ev.preventDefault();
            }
        });
    </script>
@endpush
