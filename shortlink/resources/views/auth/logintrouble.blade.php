@extends('layouts.app')

@section('headcontent')
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ voyager_asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ voyager_asset('css/login.css') }}">
    <style>
        body {
            background-image: url("/img/corp_first.jpg");
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
            background-image: url("/img/corp_enter-07.png");
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
            background-image: url("/img/corp_enter-fon.png");
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
            background-image: url("/img/corp_enter-monitor.png");
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
        .login-top-container {
            display: none;
        }
        @media only all and (min-height: 768px) {
            .login-top-container {
                display: block;
            }
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <div style="display: flex;justify-content: space-around;">
        <div class="hidden-xs" style="flex: 0 0 66%;">
            <a href="{{ config('app.url') }}">
                <img class="img-responsive pull-left logo hidden-xs animated fadeIn" src="/img/corp_welcome-04.svg" alt="corp.upravdom.com">
            </a>
        </div>

        @if (empty($send))
            <div class="login-sidebar animated fadeInRightBig">
                <div class="hidden-xs hidden-sm login-top-container"></div>
                <div class="login-container animated fadeInRightBig">
                    <h4 style="padding: 15px;color: #333;margin-top: 0;">Если ваш емайл не подходит, заполните форму:</h4>

                    <form action="{{ route('logintrouble') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="group">
                          <input type="text" name="fio" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label><i class="glyphicon glyphicon-user"></i><span class="span-input"> Фамилия Имя Отчество</span></label>
                        </div>

                        <div class="group">
                          <input type="email" name="email" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label><i class="glyphicon glyphicon-envelope"></i><span class="span-input"> Эл. почта</span></label>
                        </div>

                        <div class="group">
                          <input type="text" name="shop" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label><i class="glyphicon glyphicon-home"></i><span class="span-input"> Магазин</span></label>
                        </div>

                        <button type="submit" class="btn btn-block login-button">
                            <span class="signingin hidden"><span class="glyphicon glyphicon-refresh"></span> Отправка...</span>
                            <span class="signin">Отправить</span>
                        </button>
                    </form>

                    @if(!$errors->isEmpty())
                        <div class="alert alert-black">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif

                </div> <!-- .login-container -->

            </div> <!-- .login-sidebar -->
        @else
            <div class="login-sidebar animated fadeInRightBig">
                <div class="hidden-xs hidden-sm login-top-container"></div>
                <div class="login-container animated fadeInRightBig">
                    <form>
                        <div style="color: #333;margin-top: 0;">
                            <h4>Ваша заявка отправлена.</h4>
                            <p>В ближайщее время с вами свяжуться.</p>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection
