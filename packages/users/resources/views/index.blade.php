@extends('layouts::master')

@section('page_title')
    {{ ucfirst('Danh sách người dùng') }}
@endsection

@section('content')
    <div class="widget-body">
        <div class="table-toolbar">
            <div class="widget">
                <div class="product-category-search">
                    <form class="form-inline pull-left search_form validate-form" action="" method="get" role="form">
                        <div class="form-group">
                        <span class="input-icon icon-right">
                            <input type="text" value=""  id="from_date" class="form-control" name="s[kw]" placeholder="Tên người dùng">
                        </span>
                        </div>

                        <input type="hidden" id="search_sort_by" name="s[sort_by]" value=""/>
                        <input type="hidden" id="search_sort" name="s[sort]" value=""/>

                        <button type="submit" class="btn btn-info">Tìm kiếm</button>
                    </form>
                </div>
                <div class="btn-group pull-right">
                    <a class="btn btn-success" href="{{route('users.create')}}"><i class="fa fa-plus withe"></i>Thêm mới</a>

                    <button id="btnDelete" class="btn btn-danger"><i class="fa fa-times withe circular"></i>Xóa</button>
                    <a class="btn btn-primary btn-in" href=""
                       target="_blank"><i class="glyphicon glyphicon-export"></i>Xuất ra excel</a>
                </div>
            </div>
        </div>
        <div id="registration-form">
            @include('users::ajax')
        </div>
    </div>
@endsection