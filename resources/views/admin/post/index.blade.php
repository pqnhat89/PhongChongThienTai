@extends('layouts.app')

@section('content')

@php $post = \App\Helpers\Utils::getPost(); @endphp
<div class="container-fluid pt-5 form-ajax">
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="text-center font-weight-light">
                Bài viết
            </h3>
        </div>
        <div class="card-body">
            <div class="form-input">
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
                        @foreach ($post as $v)
                            <tr>
                                <td nowrap>{{ $v->id }}</td>
                                <td>{{ $v->title }}</td>
                                <td nowrap>{{ $v->type }}</td>
                                <td nowrap>
                                    <button class="btn btn-sm btn-info">Xem</button>
                                    <button class="btn btn-sm btn-warning postUpdate"
                                        data-url="{{ route('admin.post.update', ['id' => $v->id]) }}">Sửa</button>
                                    <button class="btn btn-sm btn-danger postDelete" data-title="{{ $v->title }}"
                                        data-url="{{ route('admin.post.delete', ['id' => $v->id]) }}">Xoá</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
