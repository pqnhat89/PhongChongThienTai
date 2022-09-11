@extends('layouts.app')

@section('content')

<div class="container-fluid pt-5">
    <div class="clearfix"></div>
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="text-center font-weight-light">
                Bài viết
            </h3>
            <form method="get">    
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="input-group">
                        <select name="type">
                            <option value="">Tất cả danh mục</option>
                            @foreach (\App\Enums\PostType::toArray() as $v)
                                <option value="{{ $v }}" {{ request()->type == $v ? 'selected' : null }}>
                                    {{ $v }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control" name="title" placeholder="Tiêu đề" value="{{ request()->title }}">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <button class="btn btn-primary postUpdate" data-url="{{ route('admin.post.update', 
                ['id' => 0]) }}">
                Thêm mới
            </button>
            <div class="float-right">
                {{ $post->links() }}
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th>Tiêu đề</th>
                        <th width="100">Danh mục</th>
                        <th width="50"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($post))
                        @foreach ($post as $v)
                            <tr>
                                <td nowrap>{{ $v->id }}</td>
                                <td>{{ $v->title }}</td>
                                <td nowrap>{{ $v->type }}</td>
                                <td nowrap>
                                    <button class="btn btn-info">Xem</button>
                                    <button class="btn btn-warning postUpdate"
                                        data-url="{{ route('admin.post.update', ['id' => $v->id]) }}">Sửa</button>
                                    <button class="btn btn-danger postDelete" data-title="{{ $v->title }}"
                                        data-url="{{ route('admin.post.delete', ['id' => $v->id]) }}">Xoá</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr><td class="text-center" colspan="99">Không có dữ liệu.</td></tr>
                    @endif
                </tbody>
            </table>
            <div class="float-right">
                {{ $post->links() }}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>
<script>
    $('.postUpdate').click(function () {
        $.ajax({
            url: $(this).data('url'),
            success: function (response) {
                $('.modal .modal-content').html('').html(response);
                $('.modal').modal();
            }
        });
    });

    $('.postDelete').click(function () {
        if (confirm("Xóa " + $(this).data('title') + " ?")) {
            $.ajax({
                method: 'post',
                url: $(this).data('url'),
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'delete'
                },
                success: function () {
                    location.reload();
                }
            });
        }
    });
</script>

@endsection
