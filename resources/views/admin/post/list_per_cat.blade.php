@extends('layouts.app')

@section('content')

<div class="container-fluid pt-5">
    <div class="clearfix"></div>
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="text-center font-weight-light">
                Thống kê bài viết
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="50">STT</th>
                        <th>Danh mục</th>
                        <th>Số lượng bài viết</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($post))
                        <?php $i=1?>
                        @foreach ($post as $k => $v)
                            <tr>
                                <td nowrap>{{$i}}</td>
                                <td>{{ $k }}</td>
                                <td nowrap>{{ $v }}</td>
                            </tr>
                            <?php $i++?>
                        @endforeach
                    @else
                            <tr><td class="text-center" colspan="99">Không có dữ liệu.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
