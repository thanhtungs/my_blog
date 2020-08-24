<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/login/css/AdminLTE.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.6/css/skins/_all-skins.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/login/css/style.css')}}" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/login/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/css/style-login.css') }}" rel="stylesheet">
    <style>.text-right {
            float: right;
        }</style>
</head>
<body class="login-page hold-transition skin-blue layout-top-nav skin-blue">

<div class="login-box" style="width: 600px">
    <form id="logout-form" action="{{ url('/logout') }}" method="POST">
        {{ csrf_field() }}
    </form>
    @yield('content')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.6/js/app.min.js"></script>
<!--[if lt IE 9]>
<![endif]-->
<script src="{{ url('/backend/web/assets/login/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ url('/backend/web/assets/login/js/app.js')}}"></script>
<script src="{{ url('/backend/web/assets/login/js/libs/bootbox.min.js')}}"></script>
<script src="{{ url('/backend/web/assets/login/js/libs/confirm.js')}}"></script>
</body>
</html>