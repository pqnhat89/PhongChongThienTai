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
                        <div id="dnn_ctr446_View_DanhSach_PanelHeadingControl" class="row search-panel"
                             onkeypress="javascript:return WebForm_FireDefaultButton(event, 'dnn_ctr446_View_DanhSach_btnSearch')">

                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-sm">
                                    <input name="dnn$ctr446$View$DanhSach$txtSearchText" type="text"
                                           id="txtSearchText" class="form-control" placeholder="Chuỗi tìm kiếm">
                                    <span class="input-group-btn">
                <a id="btnReload" class="btn btn-default display-none"
                   href="javascript:__doPostBack('dnn$ctr446$View$DanhSach$btnReload','')">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
                <a id="dnn_ctr446_View_DanhSach_btnSearch" class="btn btn-default"
                   href="javascript:__doPostBack('dnn$ctr446$View$DanhSach$btnSearch','')">
                    <span class="glyphicon glyphicon-search"></span>
                </a>
            </span>
                                </div>
                            </div>

                        </div>

                        <ul class="list-group" style="margin-left: 0px; padding-top: 10px">
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
                                                         src="{{ url($post->image) }}"
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
                    </div>

                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
