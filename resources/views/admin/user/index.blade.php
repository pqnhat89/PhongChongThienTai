@extends('layouts.app')

@section('content')

<div class="container-fluid pt-5">
    <div class="clearfix"></div>
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="text-center font-weight-light">
                Người dùng
            </h3>
            <form method="get">    
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="input-group">
                        <input type="text" class="form-control" name="emailorname" placeholder="Email hoặc tên người dùng" value="{{ request()->emailorname }}">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if (\app\Enums\UserRole::isSupper())
                <button class="btn btn-primary userUpdate" data-url="{{ route('admin.user.update', 
                    ['id' => 0]) }}">
                    Thêm mới
                </button>
            @endif
            <div class="float-right">
                {{ $user->links() }}
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th>Tên người dùng</th>
                        <th width="100">Email</th>
                        <th width="50"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($user))
                        @foreach ($user as $v)
                            <tr>
                                <td nowrap>{{ $v->id }}</td>
                                <td nowrap>{{ $v->name }}</td>
                                <td nowrap>{{ $v->email }}</td>
                                <td nowrap>
                                    @if ((\app\Enums\UserRole::isSupper()) || (auth()->user()->id == $v->id))
                                        <button class="btn  btn-warning userUpdate"
                                            data-url="{{ route('admin.user.update', ['id' => $v->id]) }}">Sửa</button>
                                    @endif
                                    @if ((\app\Enums\UserRole::isSupper()) && ($v->role != \app\Enums\UserRole::SUPPER))
                                        <button class="btn  btn-danger userDelete" data-name="{{ $v->name }}"
                                            data-url="{{ route('admin.user.delete', ['id' => $v->id]) }}">Xoá</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr><td class="text-center" colspan="99">Không có dữ liệu.</td></tr>
                    @endif
                </tbody>
            </table>
            <div class="float-right">
                {{ $user->links() }}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>
<script>
    $('.userUpdate').click(function () {
        $.ajax({
            url: $(this).data('url'),
            success: function (response) {
                $('.modal .modal-content').html('').html(response);
                $('.modal').modal();
            }
        });
    });

    $('.userDelete').click(function () {
        if (confirm("Xóa " + $(this).data('name') + " ?")) {
            let tr = $(this).closest('tr');
            $.ajax({
                method: 'post',
                url: $(this).data('url'),
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'delete'
                },
                success: function () {
                    alert('Xoá người dùng thành công.');
                    tr.remove();
                },
                error: function (res) {
                    alert(res.responseText);
                }
            });
        }
    });
</script>

@endsection
