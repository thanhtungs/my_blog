@extends('layouts::master')

@section('page_title')
    {{ $title }}
@endsection

@section('content')
    <form action="" method="POST" class="validate-form open-m6 open-m-6-1 active-m-6-1-4" id ="form" autocomplete="false">
        <div class="message-place">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible error-summary">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-bell-o"></i> {{ session('error') }}</h4>
                </div>
            @endif
        </div>

        {{ csrf_field() }}

        <input type="hidden" id="user" value="{{ isset($user) ? $user->id : 0  }}">

        @if (isset($user))
            <input type="hidden" name="_method" value="PATCH">
        @endif
        <div class="tabbable">
            <div class="widget-body">
                <div id="registration-form">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ten_dich_vu">Họ tên <span style="color:red;">&nbsp;(*)</span></label>
                                <span class="input-icon icon-right">
                                    <input id="name" name="name" value=""
                                           pre-show="true" data-label="Họ tên"
                                           pre-val=""
                                           pre-change-to="#name" aria-required="true"
                                           type="text" class="form-control input-sm" required>
                                </span>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="email">Email<span style="color:red;">&nbsp;(*)</span></label>
                                <span class="input-icon icon-right">
                                    <input id="email" name="email" value="" data-label="email"
                                           pre-change-to="#vst" aria-required="true"
                                           type="email" class="form-control input-sm max-lenght" required>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="gia_thanh">Phone<span style="color:red;">&nbsp;(*)</span></label>
                                <span class="input-icon icon-right">
                                    <input id="phone" name="phone" value=""
                                           pre-show="true" data-label="Phone"
                                           pre-val=""
                                           pre-change-to="#phone" aria-required="true"
                                           type="text" class="form-control input-sm numbersOnly" maxlength="10" required>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="password">Password<span style="color:red;">&nbsp;(*)</span></label>
                                <span class="input-icon icon-right">
                                    <input id="password" name="password" value=""
                                           pre-show="true" data-label="password"
                                           pre-val=""
                                           pre-change-to="#password" aria-required="true"
                                           type="password" class="form-control input-sm" required>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password<span style="color:red;">&nbsp;(*)</span></label>
                                <span class="input-icon icon-right">
                                    <input id="confirm_password" name="confirm_password" value=""
                                           pre-show="true" data-label="confirm_password"
                                           pre-val=""
                                           pre-change-to="#confirm_password" aria-required="true"
                                           type="password" class="form-control input-sm" required>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="logo">Ảnh đại diện</label>
                                <span class="input-icon icon-right">
                                    <input id="removeValueFile" accept="image/*" class="btn btn-primary input-md"  name="image" type="file" onchange="readURL(this);" style="width: 220px;">
                                    <div class="thumbnail" style="margin-top: 10px; min-height: 100px;width: 210px;padding: 5px;" >
                                        <img id="blah" alt="" height="auto" src=""/>
                                    </div>

                                    <button class="btn btn-darkorange" id="resetImg" type="button">Hủy</button>
                                    @if (isset($user))
                                        <label id="hideLabel">Ảnh hiện tại: </label>
                                        <img id="hideImg" width="200px" class="thumbnail" src="{{ Url('storage/images/'.$user['logo']) }}">
                                        <input type="hidden" name="img2" class="form-control" value="{{ $user['logo'] }}">
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-body">
                <div id="html5Form" class="form-horizontal">
                    <div class="form-group has-feedback">
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-palegreen unique"><i class="fa fa-save"></i>Lưu lại</button>
                            <a href="{{ route('users.index') }}" class="btn btn-danger">Hủy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ URL::to('/backend/web/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('/packages/users/js/user.js') }}"></script>
@endsection