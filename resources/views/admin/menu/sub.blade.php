@extends('layouts.app')

@section('content')

<form class="container-fluid pt-5 form-ajax">
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="text-center font-weight-light">
                Menu Con
            </h3>
        </div>
        <div class="card-body">
            <div class="form-input">
                @php $menu = count($menu) ? $menu : [1] @endphp
                @foreach ($menu as $v)
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="small" for="title">Tiêu đề</label>
                                <input class="form-control" name="title[]" type="text" value="{{ $v->title ?? null }}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label class="small" for="order">Vị trí</label>
                                <input class="form-control" name="order[]" type="number" value="{{ $v->order ?? null }}">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label class="small" for="url">Url</label>
                                <input class="form-control" name="url[]" type="text" value="{{ $v->url ?? null }}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>&nbsp;</label><br>
                            <a class="btn  btn-danger btn-block delete_row">Xoá</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-right">
                <a class="btn btn-success add_row">Thêm Menu Con</a>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('admin.menu.index') }}" class="btn btn-link">Trở lại</a>
            <button type="submit" class="btn btn-primary">Lưu Menu Con</button>
        </div>
    </div>
</form>

@endsection
