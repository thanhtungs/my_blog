<div class="table-scrollable">
    <form id="frm_delete" action="" method="post">
        {{csrf_field()}}
        <table class="table table-striped table-bordered table-hover" id="thegrid">
            <thead >
            <tr style="background: #eee;">
                <th><input class="select-on-check-all checkbox" id="checkall" type="checkbox"></th>
                <th>STT</th>
                <th width="70">Mã DV</th>
                <th data-sort-by="ten_dich_vu" data-sort="desc" isoft-sort width="240">Tên dịch vụ</th>
                <th width="100">Giá thành</th>
                <th>VAT</th>
                <th width="100">Thời gian</th>
                <th width="80">Bảo hành</th>
                <th>Người sửa</th>
                <th>Ngày sửa</th>
                <th width="120" style="text-align: center">Hành động</th>
            </tr>
            </thead>
            <tbody>
                    <tr data-key="2">
                        <td><input class="checkbox delete-item" name="delete[]" value="" type="checkbox"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            <div class="btn-group hanh-dong" style="margin-bottom: 5px;text-align: center;width: 58px;">
                                <a class="btn btn-labeled btn-palegreen btn-sm" style="padding-left: 5px;margin: auto;"><i class="fa fa-cogs"></i></a>
                                <a class="btn btn-sm btn-palegreen dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu dropdown-darkorange" role="menu">
                                    <li><a href="" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i>Sửa</a></li>
                                    <li><a onclick="" class="btn btn-danger btn-xs delete" title="delete" data-method="post" data-confirm="Confirm Delete"><i class="fa fa-trash-o"></i> Xóa</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                {{--<tr>--}}
                    {{--<td colspan="10">Không có bản ghi nào được hiển thị</td>--}}
                {{--</tr>--}}
            </tbody>
        </table>
    </form>
    <div style="text-align: center;margin-top: 20px;">
        {{--{{ $data->search_retuls->appends(['s' =>$data->search_group])->links() }}--}}
    </div>
</div>