@extends('layouts.fe-app')

@section('content')

    <style>
        .pt-2 {
            padding-top: 0.5rem !important;
        }
    </style>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <fieldset class="text-center">
                            <legend>
                                Lịch công tác
                            </legend>
                        </fieldset>
                        <form method="get" id="form-filter">
                            <div class="row">
                                <div class="col-xs-4 pl-0">
                                    <select name="name" class="form-control">
                                        <option value="">Chọn lãnh đạo</option>
                                        @foreach ($leader as $v)
                                            <option {{ request()->name == $v->name ? 'selected' : '' }} value="{{ $v->name }}">
                                                {{ $v->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-4 pl-0">
                                    <input type="text" class="form-control datepicker" name="from" placeholder="Ngày đi" value="{{ $_GET['from'] ?? '' }}">
                                </div>
                                <div class="col-xs-4 pl-0">
                                    <input type="text" class="form-control datepicker" name="to" placeholder="Ngày về" value="{{ $_GET['to'] ?? '' }}">
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-xs-6 pl-0">
                                    <button class="btn btn-primary btn-filter" type="submit">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                        <div class="card shadow-lg">
                            <div class="card-header">
                            </div>
                            <div class="card-body wrap-table">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Lãnh đạo</th>
                                        <th width="80" class="text-center">Ngày đi</th>
                                        <th width="80" class="text-center">Ngày về</th>
                                        <th class="text-center">Nội dung công việc</th>
                                        <th width="80" class="text-center">Địa điểm</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($schedules))
                                        @foreach ($schedules as $v)
                                            <tr>
                                                <td>{{ $v->name }}</td>
                                                <td>{{ $v->fromDate . ' ' . $v->fromHour . ':00' }}</td>
                                                <td>{{ $v->toDate . ' ' . $v->toHour . ':00' }}</td>
                                                <td>{{ $v->content }}</td>
                                                <td>{{ $v->place }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr><td class="text-center" colspan="99">Không có dữ liệu.</td></tr>
                                    @endif
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {{ $schedules->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <script>
        var $datePicker = $('.datepicker');
        if ($datePicker.length) {
            $datePicker.datetimepicker({
                locale: 'vi',
                format: 'DD/MM/YYYY'
            });
        }
    </script>

@endsection
