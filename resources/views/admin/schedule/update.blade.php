<div class="modal-header">&nbsp;</div>
<div class="modal-body">
    <div class="form-group">
        <label for="name">Họ & tên lãnh đạo</label>
        <input type="text" class="form-control" id="name" placeholder="Họ & tên lãnh đạo" value="{{ $schedule->name ?? null }}">
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <label for="from">Ngày đi</label>
                <input type="text" class="form-control" id="from" placeholder="Ngày đi" value="{{ $schedule->fromDate ?? null }}">
            </div>
            <div class="col-6">
                <label for="fromHour">Giờ đi</label>
                <select id="fromHour" class="form-control">
                    @for ($i=0; $i<=23; $i++)
                        <option {{ (int)($schedule->fromHour ?? 0) == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <label for="to">Ngày về</label>
                <input type="text" class="form-control" id="to" placeholder="Ngày về" value="{{ $schedule->toDate ?? null }}">
            </div>
            <div class="col-6">
                <label for="toHour">Giờ về</label>
                <select id="toHour" class="form-control">
                    @for ($i=0; $i<=23; $i++)
                        <option {{ (int)($schedule->toHour ?? 0) == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="content">Nội dung công tác</label>
        <textarea class="form-control" id="content" rows="5">{{ $schedule->content ?? null }}</textarea>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
    <button type="button" class="btn btn-primary" id="save" data-url="{{ route('admin.schedule.update', ['id' => $schedule->id ?? 0]) }}">
        Lưu
    </button>
    <script>
        $(function () {
            $('#from').datetimepicker({
                locale: 'vi',
                format: 'DD/MM/YYYY'
            });

            $('#to').datetimepicker({
                locale: 'vi',
                format: 'DD/MM/YYYY'
            });
        });

        $(document).on('click', '.modal #save', function () {
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
                    content: $('#content').val()
                },
                success: function () {
                    alert('Cập nhật thành công.');
                    location.reload();
                },
                error: function (res) {
                    alert(res.responseText);
                }
            });
        });
    </script>
</div>