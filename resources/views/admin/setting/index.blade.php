@extends('layouts.app')

@section('content')

<form class="container-fluid pt-5 form-ajax"
    action="{{ route("admin.setting.index") }}" id="banner">
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="text-center font-weight-light">
                Cài đặt khác
            </h3>
        </div>
        <div class="card-body">
            <div class="form-input">
                @php $setting = count($setting) ? $setting : [1] @endphp
                @foreach ($setting as $k => $v)
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="small" for="name">Loại cài đặt</label>
                                <input class="form-control" name="name[]" type="text" value="{{ $v->name ?? null }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small" for="content">Nội dung</label>
                                <textarea class="form-control" name="content[]">{{ $v->content ?? null }}</textarea>
                            </div>
                        </div>
                        @if (!$k)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small" for="image">Ảnh</label>
                                    <input class="form-control ckfinder" name="image[]" type="text" value="{{ $v->image ?? null }}">
                                </div>
                            </div>
                        @endif
                        {{-- <div class="col-md-1">
                            <label>&nbsp;</label>
                            <a class="btn  btn-danger btn-block w-70 delete_row">x</a>
                        </div> --}}
                    </div>
                @endforeach
            </div>
            {{-- <div class="text-right">
                <a class="btn btn-success add_row">Thêm cài đặt</a>
            </div> --}}
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Lưu cài đặt</button>
        </div>
    </div>
</form>

@endsection
