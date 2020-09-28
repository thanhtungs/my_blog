<div class="table-scrollable">
    <form id="frm_delete" action="{{ route('users.destroy') }}" method="post">
        {{csrf_field()}}
        <table class="table table-striped table-bordered table-hover" id="thegrid">
            <thead >
            <tr style="background: #eee;">
                <th width="50" class="text-center"><input class="select-on-check-all checkbox" id="checkall" type="checkbox"></th>
                <th width="50" class="text-center">STT</th>
                <th width="200">Họ tên</th>
                <th width="200">Email</th>
                <th width="150">Số điện thoại</th>
                <th width="150">Trạng thái</th>
                <th width="100">Ngày tạo</th>
                <th width="120" style="text-align: center">Hành động</th>
            </tr>
            </thead>
            <tbody>
            @if(count($users) > 0)
                @foreach($users as $user)
                    <tr>
                        <td class="text-center">
                            @if (\Auth::user()->id != $user->id)
                                <input class="checkbox delete-item" name="ids[]" value="{{ $user->id }}" type="checkbox"></td>
                            @endif
                        <td class="text-center">{{ $rank ++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->name_active }}</td>
                        <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                        <td class="text-center">
                            <div class="btn-group" style="margin-bottom: 5px; text-align: center; width: 58px;">
                                <a class="btn btn-labeled btn-palegreen btn-sm" style="padding-left: 5px; margin: auto;"><i class="fa fa-cogs"></i></a>
                                <a class="btn btn-sm btn-palegreen dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu dropdown-darkorange" role="menu">
                                    <li><a href="" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i>Sửa</a></li>
                                    @if (\Auth::user()->id != $user->id)
                                        <li>
                                            <a onclick="xoa('{{ url('users/delete/'. $user->id) }}')" class="btn btn-danger btn-xs delete" title="delete">
                                                <i class="fa fa-trash-o"></i> Xóa
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">Không có bản ghi nào được hiển thị</td>
                </tr>
            @endif
            </tbody>
        </table>
    </form>
    <div style="text-align: center;margin-top: 20px;">
        {{ $users->links() }}
    </div>
</div>