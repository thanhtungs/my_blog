@extends('layouts::app')

@section('title')
    Đăng nhập vào hệ thống
@endsection

@section('content')
    <section class="container form-login-gara">
        @include('layouts::component.flash')
        <div class="login">
            <h1>Đăng nhập</h1>
            <form id="login-form" method="POST" action="{{ url('/login') }}" role="form">
                {{ csrf_field() }}
                <p class="user">
                    <input type="text" id="loginform-username" name="login" value="" placeholder="Tên đăng nhập">
                    <span class="help-block help-block-error"></span>
                </p>
                <p class="pass">
                    <input type="password" id="loginform-password" name="password" value="" placeholder="Mật khẩu">

                    <span class="help-block help-block-error"></span>
                </p>
                <p class="remember_me"></p>
                <p>
                    <span class="hover-ghi-nho" style="float: left;margin-top: 5px;">
                        <input checked type="checkbox" id="remember" class="select-on" name="remember">
                        <label for="remember" style="vertical-align: 3px;">Ghi nhớ mật khẩu</label>
                    </span>
                    <span class="submit" style="float: right"><input type="submit" name="commit" value="Đăng nhập"></span>
                </p>
            </form>
            <div class="login-images">
                <div class="border">
                    <img class="img-responsive" src="{{ url('backend/web/assets/img/tt.jpg') }}">
                </div>
            </div>
        </div>

        <div class="login-help">
            <p> <a href="" style="font-size: 13px;">Quên mật khẩu?</a></p>
        </div>
    </section>
    <style>
        .hover-ghi-nho:hover label,.hover-ghi-nho:hover input{
            cursor: pointer;
        }
    </style>
@endsection