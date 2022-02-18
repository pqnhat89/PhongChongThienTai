@extends('layouts.app')

@section('content')

@php $post = \App\Helpers\Utils::getPost(); @endphp
<div class="container-fluid pt-5 form-ajax">
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="text-center font-weight-light">
                Post
            </h3>
        </div>
        <div class="card-body">
            <div class="form-input">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50">ID</th>
                            <th>Title</th>
                            <th width="100">Type</th>
                            <th width="50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $v)
                            <tr>
                                <td nowrap>{{ $v->id }}</td>
                                <td>{{ $v->title }}</td>
                                <td nowrap>{{ $v->type }}</td>
                                <td nowrap>
                                    <button class="btn btn-sm btn-info">View</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
