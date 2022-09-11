@extends('layouts.app')

@section('content')

<form class="container-fluid pt-5 form-ajax"
    action="{{ route("admin.banner.index") }}" id="banner">
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="text-center font-weight-light">
                Banner
            </h3>
        </div>
        <div class="card-body">
            <div class="form-input">
                @php $banner = count($banner) ? $banner : [1] @endphp
                @foreach ($banner as $v)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small" for="title">Tiêu đề</label>
                                <input class="form-control" name="title[]" type="text" value="{{ $v->title ?? null }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small" for="description">Mô tả</label>
                                <input class="form-control" name="description[]" type="text" value="{{ $v->description ?? null }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="small" for="image">Ảnh</label>
                                <input class="form-control ckfinder" name="image[]" type="text" value="{{ $v->image ?? null }}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label>&nbsp;</label>
                            <a class="btn  btn-danger btn-block w-70 delete_row">Xoá</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-right">
                <a class="btn btn-primary add_row">Thêm Banner</a>
            </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Lưu Banner</button>
        </div>
    </div>
</form>

@endsection
