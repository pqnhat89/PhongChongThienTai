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
                            <div style="margin-bottom: 10px; text-align: right;">
                                <button onclick="share()" class="btn btn-primary">
                                    <i class="fa fa-facebook"></i>
                                </button>
                                <button onclick="copy()" class="btn btn-primary">
                                    Copy
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
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
    <script>
        share = function(){
            var url = 'https://www.facebook.com/sharer/sharer.php?display=popup&u='
                + window.location.href,
                options = 'height=626, width=500, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0';
            window.open(url, 'sharer', options);
        }
        copy = function() {
            var link = window.location.href;
            navigator.clipboard.writeText(link);
            alert('Đã copy link!')
        }
    </script>
@endsection
