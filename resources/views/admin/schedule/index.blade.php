@extends('layouts.app')

@section('content')

<div class="container-fluid pt-5">
    <div class="clearfix"></div>
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="text-center font-weight-light">
                Lịch công tác
            </h3>
            <form method="get">   
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="input-group">
                        <select name="name">
                            <option value="">Tất cả</option>
                            @foreach ($leader as $v)
                                <option {{ request()->name == $v->name ? 'selected' : '' }} value="{{ $v->name }}">
                                    {{ $v->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control" name="from" placeholder="Tìm ngày đi" value="{{ request()->from }}">
                        <input type="text" class="form-control" name="to" placeholder="Tìm ngày về" value="{{ request()->to }}">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <button class="btn btn-primary scheduleUpdate" data-url="{{ route('admin.schedule.update', 
                ['id' => 0]) }}">
                Thêm mới
            </button>
            <div class="float-right">
                {{ $schedule->links() }}
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Họ & tên lãnh đạo</th>
                        <th width="50">Ngày đi</th>
                        <th width="50">Ngày về</th>
                        <th>Nội dung công tác</th>
                        <th width="200">Địa điểm</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($schedule))
                        @foreach ($schedule as $v)
                            <tr>
                                <td nowrap>{{ $v->name }}</td>
                                <td nowrap>{{ $v->fromDate . ' ' . $v->fromHour . ':00' }}</td>
                                <td nowrap>{{ $v->toDate . ' ' . $v->toHour . ':00' }}</td>
                                <td>{{ $v->content }}</td>
                                <td>{{ $v->place }}</td>
                                <td nowrap>
                                    <button class="btn btn-warning scheduleUpdate"
                                        data-url="{{ route('admin.schedule.update', ['id' => $v->id]) }}">Sửa</button>
                                    <button class="btn btn-danger scheduleDelete" data-name="{{ $v->name }}"
                                        data-url="{{ route('admin.schedule.delete', ['id' => $v->id]) }}">Xoá</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr><td class="text-center" colspan="99">Không có dữ liệu.</td></tr>
                    @endif
                </tbody>
            </table>
            <div class="float-right">
                {{ $schedule->links() }}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="schedule" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>
<script>
    $(function () {
        $('[name="from"]').datetimepicker({
            locale: 'vi',
            format: 'DD/MM/YYYY'
        });

        $('[name="to"]').datetimepicker({
            locale: 'vi',
            format: 'DD/MM/YYYY'
        });
    });

    $('.scheduleUpdate').click(function () {
        $.ajax({
            url: $(this).data('url'),
            success: function (response) {
                $('.modal#schedule .modal-content').html('').html(response);
                $('.modal#schedule').modal();
            }
        });
    });

    $(document).on('click', '.modal#schedule #save', function () {
        // send
        $.ajax({
            method: 'post',
            url: $(this).data('url'),
            data: {
                _method: 'put',
                _token: '{{ csrf_token() }}',
                name: $('#name').val(),
                from: $('#from').val() + ' ' + $('#fromHour').val(),
                to: $('#to').val() + ' ' + $('#toHour').val(),
                content: $('#content').val(),
                place: $('#place').val()
            },
            success: function () {
                modalReload = true;
                modalAlert('Cập nhật thành công.');
            },
            error: function (res) {
                modalAlert(res.responseText);
            }
        });
    });


    $('.scheduleDelete').click(function () {
        let el = $(this);
        let tr = $(this).closest('tr');
        tr.addClass('bg-warning');
        setTimeout(function ()
        {
            if (confirm("Xóa lịch công tác của " + $(el).data('name') + " ?")) {
                $.ajax({
                    method: 'post',
                    url: $(el).data('url'),
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'delete'
                    },
                    success: function () {
                        modalAlert('Xoá lịch công tác thành công.');
                        tr.remove();
                    },
                    error: function (res) {
                        modalAlert(res.responseText);
                    }
                });
            } else {
                tr.removeClass('bg-warning');
            }
        }, 100);
    });
</script>

@endsection
