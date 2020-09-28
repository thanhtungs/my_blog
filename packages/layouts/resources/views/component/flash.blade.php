@if($errors->any())
    <div class="alert alert-danger alert-dismissible error-summary" style="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-bell-o"></i> Có lỗi xảy ra</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-success" role="alert"><strong>{!! \Illuminate\Support\Facades\Session::get('success') !!}</strong></div>
@endif

@if(\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger" role="alert"><strong>{!! \Illuminate\Support\Facades\Session::get('error') !!}</strong></div>
@endif

@if(\Illuminate\Support\Facades\Session::has('message'))
    <div class="alert notify  {!! \Illuminate\Support\Facades\Session::get('alert-class') !!}  alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i>{!! trans('systems.confirm') !!}</h4>
        {!! \Illuminate\Support\Facades\Session::get('message') !!}
    </div>
    <script type="text/javascript">
        window.setTimeout(function() { $(".notify").fadeTo(1500, 0).slideUp(500, function(){
            $(this).remove();
        }); }, 5000);
    </script>
@endif


<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(\Illuminate\Support\Facades\Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ \Illuminate\Support\Facades\Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div>

