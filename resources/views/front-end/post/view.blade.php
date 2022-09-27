@extends('layouts.fe-app')

@section('content')
    <div>
        <div>
            <div>
                <div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="font-size: 12px; font-weight: bold">
                                <span>{{mb_strtoupper($post->title)}}</span>
                            </h3>
                        </div>
                        <div class="panel-body" style="padding: 10px; text-align: left;">
                            {!! html_entity_decode($post->content) !!}
                            @if($post->file)
                                <p style="text-align: justify;">&nbsp;
                                    <a href="{{url('/public/files') .'/'. $post->file}}">Tải file đính kèm</a>
                                </p>
                            @endif

                        </div>
                    </div>
                    <div id="dnn_ctr409_View_pnBaiVietLienQuan" class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="font-size: 12px; font-weight: bold">Bài viết liên quan
                            </h3>
                        </div>
                        <div class="panel-body" style="padding: 10px;">

                            <ul>
                                <?php $count = count($relatedPost) < 10 ? count($relatedPost) : 10; ?>

                            @for($i=0; $i<$count; $i++)
                                <li>
                                    <a href="{{url('/xem') . '/' . $relatedPost[$i]->id}}">
                                        {{$relatedPost[$i]->title}}
                                    </a>
                                </li>
                            @endfor
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
