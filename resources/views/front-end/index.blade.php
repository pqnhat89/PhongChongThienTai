@extends('layouts.fe-app')

@section('content')
    @if(isset($posts))
        <div>
            <div>
                <div>
                    <div>
                        <div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"
                                        style="font-size: 12px; font-weight: bold">
                                        Kết quả tìm kiếm cho: <b>{{$_GET['s']}}</b>
                                    </h3>
                                </div>
                                <div class="panel-body" style="padding: 0px;">
                                    @if(count($posts))
                                        <ul class="list-group"
                                            style="margin-left: 0px; margin-bottom: 0px;">
                                            @foreach($posts as $post)
                                                <li class="list-group-item">
                                                    <div class="post-item">
                                                        <div class="post-header">
                                                            <div class="post-title">
                                                                <a href="{{url('/xem') .'/'. $post->id}}">
                                                                    {{$post->title}}
                                                                </a>
                                                            </div>
                                                            @if(isset($post->image))
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
                                                            @else
                                                                <div style="padding-top: 10px; padding-right: 15px; text-align: justify; padding-bottom: 5px;">
                                                                    <span> {{$post->sub_title}}</span>
                                                                </div>
                                                            @endif
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

                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    @else
	    <?php
            $items = [
                \App\Enums\PostType::TTSK => \App\Services\PostServices::getPostByType(\App\Enums\PostType::TTSK),
                \App\Enums\PostType::BTTT => \App\Services\PostServices::getPostByType(\App\Enums\PostType::BTTT),
                \App\Enums\PostType::DBTT => \App\Services\PostServices::getPostByType(\App\Enums\PostType::DBTT),
                \App\Enums\PostType::VBCD_CDK => \App\Services\PostServices::getPostByType(\App\Enums\PostType::VBCD_CDK),
                \App\Enums\PostType::VBCDDH => \App\Services\PostServices::getPostByType(\App\Enums\PostType::VBCDDH),
                \App\Enums\PostType::KHPA => \App\Services\PostServices::getPostByType(\App\Enums\PostType::KHPA),
            ];
            $postType = \App\Enums\PostType::toArray();
	    ?>
        @foreach($items as $cat_name => $cat_list)
            @if(in_array($cat_name, [\App\Enums\PostType::TTSK, \App\Enums\PostType::BTTT, \App\Enums\PostType::DBTT]))
                <div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"
                                                style="font-size: 12px; font-weight: bold">
                                                <a href="{{url('/the-loai') .'/'. array_search($cat_name, $postType)}}">{{$cat_name}}</a>
                                            </h3>
                                        </div>
                                        <div class="panel-body" style="padding: 0px;">
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <div class=" owl-carousel">
                                                            @foreach($cat_list as $post)
                                                                <a href="{{url('/xem') . '/' . $post->id}}">
                                                                    <div class="thumbnail"
                                                                        style="padding: 0px; margin-bottom: 0px">
                                                                        <img src="{{ url($post->image ?? '') }}"
                                                                            alt="100%x200"
                                                                            data-src="holder.js/100%x200"
                                                                            style="width: 100%; display: block;"
                                                                            data-holder-rendered="true">
                                                                        <div class="caption">
                                                                            <p style="font-weight: bold; margin: 0 0 0px; color: #d82525; text-align: justify">
                                                                                {{$post->title}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                <div class="col-md-6" style="padding-left: 0;">
                                                    <ul class="list-group" style="margin-left: 0px">
                                                        @for($i=1; $i<count($cat_list); $i++)
                                                            <li class="list-group-item"
                                                                style="padding: 6px 10px;">
                                                                <a href="{{url('/xem') . '/' . $cat_list[$i]->id}}"
                                                                style="color: #333">
                                                                    <i class="fa fa-caret-right"
                                                                    aria-hidden="true"></i>
                                                                    {{$cat_list[$i]->title}}
                                                                </a>
                                                            </li>
                                                        @endfor
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            @else
                <div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"
                                                style="font-size: 12px; font-weight: bold">
                                                <a href="{{url('/the-loai') .'/'. array_search($cat_name, $postType)}}">{{$cat_name}}</a>
                                            </h3>
                                        </div>
                                        <div class="panel-body" style="padding: 0px;">

                                            <ul class="list-group"
                                                style="margin-left: 0px; margin-bottom: 0px;">
                                                @foreach($cat_list as $list)
                                                    <li class="list-group-item"
                                                        style="padding: 6px 10px; text-align: justify">
                                                        <a href="{{url('/xem') . '/' . $list->id}}"
                                                        style="color: #333">
                                                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                                                            {{$list->title}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif

    <div>
        <div>
            <div>
                <div>
                    <div>
{{--                        <p><img alt=""--}}
{{--                                src="{{ isset($banner[\App\Enums\BannerTitle::FOOTER_BANNER]) ? url('') . $banner[\App\Enums\BannerTitle::FOOTER_BANNER] : asset('/public/uploads/images/banner_1000x150.png') }}"--}}
{{--                                style="width: 1000px; height: 150px;" title=""></p>--}}
{{--                        <p>&nbsp;</p>--}}
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
