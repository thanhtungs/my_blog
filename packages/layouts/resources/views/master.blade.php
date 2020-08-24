<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/backend/web/assets/img/favicon.png') }}">
    <title>@yield('page_title')</title>
    <link href="{{ url('/backend/web/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/css/weather-icons.min.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
          rel="stylesheet">
    <link href="{{ url('/backend/web/assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.0.0/css/responsive.dataTables.min.css">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/css/beyond.min.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/css/demo.min.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/css/typicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ url('/backend/web/assets/css/custome.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/css/accounting.css') }}" rel="stylesheet">
    <link href="{{ url('/backend/web/assets/css/redactor.css') }}" rel="stylesheet">

    <link href="{{ url('/backend/web/assets/css/main.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        });
    </script>

    @yield('header')

    <link rel="stylesheet" type="text/css" href="{{ url('/css/AdminLTE.min.css') }}">

<!-- Swipebox -->
    {{--<link rel="stylesheet" href="/js/jquery-swipebox/css/swipebox.css">--}}
    {{--<script src="/js/jquery-swipebox/js/jquery.swipebox.js"></script>--}}

    {{--<script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>--}}
    {{--<script>--}}
        {{--// Initialize Firebase--}}
        {{--var config = {--}}
            {{--apiKey: "AIzaSyAytsKBA7u_iZXZUOXF0CAqPGHcidwYVs4",--}}
            {{--authDomain: "gara-chat.firebaseapp.com",--}}
            {{--databaseURL: "https://gara-chat.firebaseio.com",--}}
            {{--projectId: "gara-chat",--}}
            {{--storageBucket: "gara-chat.appspot.com",--}}
            {{--messagingSenderId: "689349444265"--}}
        {{--};--}}
        {{--firebase.initializeApp(config);--}}
    {{--</script>--}}

    {{--<script src="{{ url('/chat/js/client_v2.js') }}"></script>--}}

</head>

<body>

<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <div class="navbar-header pull-left">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <small>
                        <img src="{{ url('backend/web/assets/img/tt.jpg') }}"/>
                    </small>
                </a>
            </div>

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>

            <div class="pull-left wrap-search" style="margin-left: 40px;margin-top: 6px;">
                <form action="{{ url('/search/index') }}">
                    <div class="Upper">
                        <select class="form-control upper"
                                style="width: 300px;height: 30px;border: 1px solid #aaa;color: #444;padding: 5px 4px;"
                                id="search-customer">
                        </select>
                    </div>
                    <style>
                        .Upper .select2-selection__placeholder,#select2-search-customer-results li.select2-results__option {text-transform: uppercase}
                    </style>
                </form>
                <div class="content-list" id="list">
                    <ul class="drop-list">
                        <li>
                            <a class="item" href="#">
                                <i class="icon people"></i>
                                <p class="title">29A-12345</p>
                                <p>Hang xe</p>
                            </a>
                        </li>
                        <li>
                            <a class="item" href="#">
                                <i class="icon image"></i>
                                <p class="title">29A-12345</p>
                                <p>Hang xe</p>
                            </a>
                        </li>
                        <li>
                            <a class="item" href="#">
                                <i class="icon video"></i>
                                <p class="title">29A-12345</p>
                                <p>Hang xe</p>
                            </a>
                        </li>
                        <li>
                            <a class="item" href="#">
                                <i class="icon place"></i>
                                <p class="title">29A-12345</p>
                                <p>Hang xe</p>
                            </a>
                        </li>
                        <li>
                            <a class="item" href="#">
                                <i class="icon music"></i>
                                <p class="title">29A-12345</p>
                                <p>Hang xe</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="navbar-header pull-right">
                <style>
                    .navbar-account li a {
                        transition: all 0.3s ease 0s;
                    }

                    .navbar-account li a:hover {
                        box-shadow: 0 -6px 40px rgba(0, 0, 0, .4)
                    }

                    .navbar .navbar-inner .navbar-header .navbar-account .account-area .login-area .avatar.images-logo {
                        border: none;
                    }
                </style>
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" href="{{url('/profile/1/edit')}}">
                                <div class="avatar images-logo" title="View your public profile">
                                    <img class="img-responsive"
                                         src="{{ url('backend/web/assets/img/tt.jpg') }}">
                                </div>
                                <section>
                                    <h2><span class="profile"><span></span></span></h2>
                                </section>
                            </a>
                        </li>
                        <li style="min-width: 170px;">
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="{{ url('/backend/web/assets/img/anonymous.png')}}">
                                </div>
                                <section>
                                    <h2>
                                        <span class="profile"><span></span></span>
                                    </h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                            <!--Avatar Area-->
                                <li>
                                    <div class="avatar-area">
                                        <img class="img-responsive"
                                             src="{{url('/backend/web/assets/img/anonymous.png')}}">
                                    </div>
                                </li>
                                <!--Avatar Area-->
                                <li class="edit">
                                    <a href="" class="pull-left">Profile</a>
                                </li>
                                <li class="theme-area">
                                    <ul class="colorpicker" id="skin-changer">
                                        <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;"
                                               rel="{{ url('/backend/web/assets/css/skins/blue.css') }}"></a>
                                        </li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#2dc3e8;"
                                               rel="{{ url('/backend/web/assets/css/skins/azure.css') }}"></a>
                                        </li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;"
                                               rel="{{ url('/backend/web/assets/css/skins/teal.css') }}"></a>
                                        </li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;"
                                               rel="{{ url('/backend/web/assets/css/skins/green.css') }}"></a>
                                        </li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;"
                                               rel="{{ url('/backend/web/assets/css/skins/orange.css') }}"></a>
                                        </li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;"
                                               rel="{{ url('/backend/web/assets/css/skins/pink.css') }}"></a>
                                        </li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;"
                                               rel="{{ url('/backend/web/assets/css/skins/darkred.css') }}"></a>
                                        </li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;"
                                               rel="{{ url('/backend/web/assets/css/skins/purple.css') }}"></a>
                                        </li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;"
                                               rel="{{ url('/backend/web/assets/css/skins/darkblue.css') }}"></a>
                                        </li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#585858;"
                                               rel="{{ url('/backend/web/assets/css/skins/gray.css') }}"></a>
                                        </li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#474544;"
                                               rel="{{ url('/backend/web/assets/css/skins/black.css') }}"></a>
                                        </li>
                                        <li><a class="colorpick-btn" href="#" style="background-color:#001940;"
                                               rel="{{ url('/backend/web/assets/css/skins/deepblue.css') }}"></a>
                                        </li>
                                    </ul>
                                </li>
                                <!--/Theme Selector Area-->
                                <li class="dropdown-footer">
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit">Đăng xuất</button>
                                    </form>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <li>
                            <a class="wave in" id="chat-link" title="Chat" href="#">
                                <i class="icon glyphicon glyphicon-comment"></i>
                            </a>
                        </li>

                    </ul>
                    <div class="setting">
                        <a id="btn-setting" title="Setting" href="#">
                            <i class="icon glyphicon glyphicon-cog"></i>
                        </a>
                        <!-- Settings -->
                    </div>
                    <div class="setting-container">
                        <label>
                            <input type="checkbox" id="checkbox_fixednavbar">
                            <span class="text">Fixed Navbar</span>
                        </label>
                        <label>
                            <input type="checkbox" id="checkbox_fixedsidebar">
                            <span class="text">Fixed SideBar</span>
                        </label>
                        <label>
                            <input type="checkbox" id="checkbox_fixedbreadcrumbs">
                            <span class="text">Fixed BreadCrumbs</span>
                        </label>
                        <label>
                            <input type="checkbox" id="checkbox_fixedheader">
                            <span class="text">Fixed Header</span>
                        </label>
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
</div>
<!-- /Navbar -->
<!-- Main Container -->
<div class="main-container container-fluid">
    <!-- Page Container -->
    <div class="page-container">

        <!-- Page Sidebar -->
    @include('layouts::partials.sidebar')
    <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="">Trang chủ</a>
                    </li>
                </ul>

                {{--<div class="pull-right">--}}
                    {{--<a class="btn btn-default" href="">--}}
                        {{--<i class="fa fa-plus withe"></i>Vào xưởng--}}
                    {{--</a>--}}

                    {{--<a class="btn btn-default" href="">--}}
                        {{--<i class="fa fa-plus withe"></i>Lập báo giá--}}
                    {{--</a>--}}

                    {{--<a class="btn btn-default" href="">--}}
                        {{--<i class="fa fa-plus withe"></i>Lập lệnh sửa chữa--}}
                    {{--</a>--}}
                    {{--<a class="btn btn-default" href="">--}}
                        {{--<i class="fa fa-plus withe"></i>Xuất kho--}}
                    {{--</a>--}}

                    {{--<a class="btn btn-default" href="">--}}
                        {{--<i class="fa fa-plus withe"></i>Hạch toán--}}
                    {{--</a>--}}
                {{--</div>--}}
            </div>
            <!-- /Page Breadcrumb -->
            <!-- Page Header -->
            <div class="page-header position-relative">
                <div class="header-title">
                    <h1>@yield('page_title')</h1>
                </div>
                <!--Header Buttons-->
                <div class="header-buttons">
                    <a class="sidebar-toggler" href="#">
                        <i class="fa fa-arrows-h"></i>
                    </a>
                    <a class="refresh" id="refresh-toggler" href="">
                        <i class="glyphicon glyphicon-refresh"></i>
                    </a>

                    <a class="fullscreen" id="fullscreen-toggler" href="#">
                        <i class="glyphicon glyphicon-fullscreen"></i>
                    </a>
                </div>
                <!--Header Buttons End-->
            </div>
            <!-- /Page Header -->
            <!-- Page Body -->
            <div class="page-body">
                <div class="row">
                    <div class="tabbable">
                    </div>
                </div>
                <div class="row">
                    @include('layouts::component.flash')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script id="partent_search_x" type="x-tmpl-mustache">
  <div id="sm-@{{id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            <strong class="text-uppercase">
              @{{title}}
    </strong>
  </h4>
</div>
<div class="modal-body">
  <div class="row" style="margin-bottom: 20px;">
    <div class="col-md-12 ">
      <span class="input-icon icon-right">
          <input type="text" class="form-control search-kw" placeholder="Tìm kiếm">
          <i class="fa fa-search search-button"></i>
      </span>
    </div>
    </br>
    <div class="col-md-12 text-center">
      <img class="search-loading" src="{{ url('/backend/web/assets/img/hourglass.svg') }}" alt="" height="55px;" style="display: none;padding-top: 15px">
            </div>

          </div>
          <table class="table table-striped table-bordered table-hover popup-table">
            <thead>
            <tr style=" background: linear-gradient(#c0c0c0, #eeeeee);">
            @{{#cols}}
    <th>@{{name}}</th>
            @{{/cols}}
    </tr>
    </thead>
    <tbody class="search-r">

    </tbody>
  </table>
</div>
</div>
</div>
</div>

</script>

<script src="{{ url('/backend/web/assets/js/skins.min.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/jquery.number.min.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/datetime/moment-with-locales.min.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/datetime/bootstrap-datetimepicker.min.js') }}"></script>
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/backend/web/assets/js/datetime/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/jquery-validation/custom_addition_method.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/jquery-validation/localization/messages_vi.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/beyond.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/libs/bootbox.min.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/common.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ url('/backend/web/assets/js/mustache/mustache.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/data-helper.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/helper.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/mustache.min.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/redactor.min.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/table-search.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/md5.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/main.js') }}"></script>
<script src="{{ url('/backend/web/assets/js/jquery.number.min.js') }}"></script>

<script src="{{url('/backend/web/assets/js/parsley/parsley.js')}}"></script>
<script src="{{url('/backend/web/assets/js/parsley/i18n/vi.js')}}"></script>
<script src="{{url('backend/web/assets/js/common.js')}}"></script>
@yield('scripts')
<script>
    $("#search-customer").select2({
        placeholder: "Tìm kiếm khách hàng",
        allowClear: true,
        width: '300px',
        dropdownAutoWidth: true,
        {{--ajax: {--}}
            {{--url: "{{ url('tim-kiem-khach-hang/autosuggest')}}",--}}
            {{--dataType: 'json',--}}
            {{--delay: 250,--}}
            {{--data: function (results) {--}}
                {{--return {--}}
                    {{--results: results,--}}
                {{--};--}}
            {{--},--}}
            {{--results: function (data) {--}}
                {{--return {results: data.results};--}}
            {{--},--}}
            {{--cache: true--}}
        {{--},--}}
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
    });
    $('#search-customer').on('select2:select', function (e) {
        if (e.params.data.id) {
            window.location.href = '{{ url('khach-hang/danh-sach-khach-hang/chi-tiet') }}/' + e.params.data.id;
        }
    });
</script>
</body>
</html>