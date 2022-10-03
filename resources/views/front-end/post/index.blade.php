@extends('layouts.fe-app')

@section('content')
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <fieldset class="text-center">
                            <legend>
                                {{$type}}
                            </legend>
                        </fieldset>
                        <form id="form_cat_search">
                            <div class="row search-panel">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-sm">
                                        <input name="cat_txt" type="text"
                                               id="txtSearchText" class="form-control" placeholder="Chuỗi tìm kiếm"
                                               value="{{$_GET['cat_txt'] ?? ''}}">
                                        <span class="input-group-btn">
                                            <a id="cat_clear" class="btn btn-default display-none">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </a>
                                            <button id="cat_search" class="btn btn-default" data-href="{{$_SERVER['REQUEST_URI']}}">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </form>
                        @if(count($posts))
                            <ul class="list-group" style="margin-left: 0; padding-top: 10px">
                                @foreach($posts as $post)
                                    <li class="list-group-item">
                                        <div class="post-item">
                                            <div class="post-header">
                                                <div class="post-title">
                                                    <a href="{{url('/xem') .'/'. $post->id}}">
                                                        {{$post->title}}
                                                    </a>
                                                </div>
                                                <div class="post-description">
                                                    <div class="row">
                                                        <div class="col-md-3 text-center"
                                                             style="padding-right: 0px; padding-left: 0px;">
                                                            <img data-src="holder.js/200x200" class="img-thumbnail"
                                                                 alt="200x200" style="width: 200px;"
                                                                 src="{{ url($post->image ?? '') }}"
                                                                 data-holder-rendered="true">
                                                        </div>
                                                        <div class="col-md-9">
                                                            {{$post->sub_title}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-center">
                                {{ $posts->links() }}
                            </div>
                        @else
                            <p style="padding: 10px;">Không tìm thấy kết quả!</p>
                        @endif
                    </div>

                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
