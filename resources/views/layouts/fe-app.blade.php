<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head id="Head">
    @php
        $logo = \App\Helpers\Utils::getLogo();
		$setting = \App\Helpers\Utils::getSetting();
		$banner = \App\Services\BannerServices::getDefaultBanner();
		$sidebarBanner = \App\Services\BannerServices::getSidebarBanner();
        $about = \App\Services\PostServices::getPageByTitle(\App\Enums\PageTitle::ABOUT);
        $contact = \App\Services\PostServices::getPageByTitle(\App\Enums\PageTitle::CONTACT);
        $tcbm_ct = \App\Services\PostServices::getPageByTitle(\App\Enums\PageTitle::TCBMCT);
		$menu = \Illuminate\Support\Facades\DB::table('menu')->orderBy('order')->get();
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="og:image" content="">
    <meta id="MetaRobots" name="ROBOTS" content="INDEX, FOLLOW">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ $logo->content ?? 'Ban Chỉ huy PCTT và TKCN tỉnh Đắk Nông' }}
    </title>

    <link rel="SHORTCUT ICON" href="{{ $logo->image ?? '' }}" type="image/x-icon">
    <link href="" rel="canonical">

    {{-- Plugins --}}
    <script src="{{ asset('/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/font/css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="{{ asset('/css/default.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/admin.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/SearchSkinObjectPreview.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/jquery.smartmenus.bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/skin.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/pclb.css') }}" type="text/css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('/js/scripts.js') }}" defer></script>
    <script src="{{ asset('/js/jquery.smartmenus.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery.smartmenus.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/scripts_cp.js') }}" type="text/javascript"></script>
    <!--[if lt IE 9]>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!--<![endif]-->
</head>
<style>
    #myBtn, #hot-line  {
        display: none;
        position: fixed;
        left: calc(1204px - 65px + (100% - 1204px)/2);
        z-index: 99;
        font-size: 10px;
        border: none;
        outline: none;
        background-color: #D82525;
        color: white;
        cursor: pointer;
        padding: 12px 15px;
        border-radius: 4px;
        width: 50px;
    }
    #myBtn {
        bottom: 10px;
    }
    #hot-line {
        bottom: 70px;
    }


    #myBtn:hover, #hot-line:hover {
        background-color: #337AB7;
    }

</style>
<body id="Body" data-new-gr-c-s-check-loaded="14.1050.0" data-gr-ext-installed="" cz-shortcut-listen="true">
{{-- header --}}
<div id="siteWrapper" style="position: relative;">
    <button onclick="topFunction()" id="myBtn" title="Lên đầu trang"><i class="fa fa-arrow-up fa-2x"></i></button>
    <a href="tel:{{str_replace('.', '', $setting[\App\Enums\Setting::HOTLINE] ?? '02613.546.805')}}" id="hot-line" title="{{$setting[\App\Enums\Setting::HOTLINE] ?? '02613.546.805'}}"><i class="fa fa-phone fa-2x"></i></a>
    <!-- UserControlPanel  -->
    <div id="topHeader">
        <div class="row">
            <div class="col-md-12">
                <div class="search">
                        <span id="">
                            <span class="searchInputContainer" data-moreresults="See More Results"
                                  data-noresult="No Results Found">
                                <input name="s" type="text" maxlength="255" size="20"
                                       class="NormalTextBox" aria-label="Search" autocomplete="off"
                                       placeholder="Search..."
                                value="{{$_GET['s'] ?? ''}}">
                            </span>
                            <a class="SearchButton"
                               href="">Search</a>
                        </span>

                </div>
                <a id="search-action" aria-label="Search"></a>
                <div id="login" class="pull-right">
                    <div class="loginGroup">
                        <a title="Đăng nhập" href="{{route('admin')}}" style="font-size: 14px;">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden-xs">
        <div class="row" style=" margin-right: 0px; margin-left: 0px;">
            <div class="col-md-12"
                 style="background-image: url( {{ isset($banner[\App\Enums\BannerTitle::TOP_HEADER]) ? url($banner[\App\Enums\BannerTitle::TOP_HEADER]) : url('/public/uploads/images/PCTTDN.jpg') }}); background-repeat: no-repeat; background-size: cover;">
                <table style="width: 100%">
                    <tbody>
                    <tr>
                        <td style="width: 200px; height: 180px; text-align: center; padding: 15px">

                        </td>
                        <td style="text-align: left">
                            <p style="font-size: 22px; color: #D82525; font-weight: bold; text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white; margin-bottom: 5px;">
                                {{$setting[\App\Enums\Setting::HEADER1]}}
                            </p>
                            <p class="banner-bch-text" style="color: #D82525;">{{$setting[\App\Enums\Setting::HEADER2]}}</p>
                            <p style="font-size: 18px; color: #D82525; font-weight: bold; text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white; margin-bottom: 5px;">{{$setting[\App\Enums\Setting::HEADER3]}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="line-height: 5px; background-color: #f09f1a;" colspan="2">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div>
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav sm">
                <li><a href="/">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Trang chủ</a></li>
                <li><a href="{{'/xem/' . ($about->id ?? 132)}}">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                        Giới thiệu</a></li>
                <li class="dropdown">
                    <a href="/#" class="dropdown-toggle has-submenu"
                       data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                        Tổ chức bộ máy <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="group" aria-hidden="true" aria-expanded="false">
                        <li><a href="{{route('structure')}}">Sơ đồ chung</a></li>
                        <li><a href="{{'/xem/' . ($tcbm_ct->id ?? 135)}}">Ban Chỉ huy PCTT và TKCN cấp Tỉnh</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="/#" class="dropdown-toggle has-submenu"
                       data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        Tin tức</a>
                    <ul class="dropdown-menu" role="group" aria-hidden="true" aria-expanded="false">
						<?php $postType = \App\Enums\PostType::toArray();?>
                        <li>
                            <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::DBTT, $postType)}}">{{\App\Enums\PostType::DBTT}}</a>
                        </li>
                        <li>
                            <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::BTTT, $postType)}}">{{\App\Enums\PostType::BTTT}}</a>
                        </li>
                        <li>
                            <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::TTSK, $postType)}}">{{\App\Enums\PostType::TTSK}}</a>
                        </li>
                        <li><a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::TLTT, $postType)}}">Hướng
                                dẫn, phổ biến kiến thức</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::VBQPPL, $postType)}}">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                        {{\App\Enums\PostType::VBQPPL}}</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Page Content -->
    <div class="">
        <main role="main">
            <div id="mainContent-inner">
                <div class="row dnnpane">
                    <div class="col-md-12 contentPane">
                        <div>
                            <div>
                                <div>
                                    <div>
                                        <p>&nbsp;</p>

                                    </div>

                                </div><!-- End_Module_353 --></div>
                        </div>
                        <div></div>
                    </div>
                </div>
                <div class="row dnnpane">
                    <div class="col-md-3 col-xs-3 spacingTop">
                        <div class="list-group" style="padding-top: 15px">
                            <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::KHPA, $postType)}}"
                               class="list-group-item list-group-item-info"><strong>
                                    <i class="fa fa-flag" aria-hidden="true"></i>
                                    {{mb_strtoupper(\App\Enums\PostType::KHPA)}}</strong>
                            </a>
                            <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::DADA, $postType)}}"
                               class="list-group-item list-group-item-info"><strong>
                                    <i class="fa fa-inbox" aria-hidden="true"></i>
                                    {{mb_strtoupper(\App\Enums\PostType::DADA)}}</strong></a>
                            <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::VBQPPL, $postType)}}"
                               class="list-group-item list-group-item-info"><strong>
                                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                    {{mb_strtoupper(\App\Enums\PostType::VBQPPL)}}</strong></a>
                        </div>
                        <div class="list-group">
                            <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::VBCD_CDK, $postType)}}"
                               class="list-group-item list-group-item-success">
                                <strong>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{mb_strtoupper(\App\Enums\PostType::VBCD_CDK)}}
                                </strong>
                            </a>
                            <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::VBCDDH, $postType)}}"
                               class="list-group-item list-group-item-success">
                                <strong>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{mb_strtoupper(\App\Enums\PostType::VBCDDH)}}
                                </strong>
                            </a>
                            <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::BTTT, $postType)}}"
                               class="list-group-item list-group-item-success">
                                <strong>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{mb_strtoupper(\App\Enums\PostType::BTTT)}}
                                </strong>
                            </a>
                            <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::QPCTT, $postType)}}"
                               class="list-group-item list-group-item-success">
                                <strong>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{mb_strtoupper(\App\Enums\PostType::QPCTT)}}
                                </strong>
                            </a>
                            <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::TKTH, $postType)}}"
                               class="list-group-item list-group-item-success">
                                <strong>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    {{mb_strtoupper(\App\Enums\PostType::TKTH)}}
                                </strong>
                            </a>
                            <a href="{{'/the-loai/' . array_search(\App\Enums\PostType::KTTV, $postType)}}"
                               class="list-group-item list-group-item-success">
                                <strong>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    THÔNG TIN KTTV, HỒ CHỨA
                                </strong>
                            </a>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading"><strong>TRUYỀN THÔNG</strong></div>
                            <div class="panel-body" style="padding: 0">
                                <div class="list-group" style="margin-bottom: 0px;">
                                    <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::BTTN, $postType)}}"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                            {{mb_strtoupper(\App\Enums\PostType::BTTN)}}</strong></a>
                                    <a href="{{url('/the-loai') .'/'. array_search(\App\Enums\PostType::TLTT, $postType)}}"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                            {{mb_strtoupper(\App\Enums\PostType::TLTT)}}</strong></a>
                                    <a href="{{route('schedule')}}" class="list-group-item"><strong>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            LỊCH CÔNG TÁC</strong></a>
                                    <a href="{{'/xem/' . ($contact->id ?? 1)}}"
                                       class="list-group-item">
                                        <strong>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            DANH BẠ ĐIỆN THOẠI
                                        </strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading"><strong>LIÊN KẾT WEBSITE</strong></div>
                            <div class="panel-body" style="padding: 0">
                                <div class="list-group" style="margin-bottom: 0px;">
                                    @if(count($menu))
                                        @foreach($menu as $val)
                                            <a target="_blank"
                                               href="{{$val->url}}"
                                               class="list-group-item"><strong>
                                                    @if(isset($val->icon) && $val->icon == 'glyphicon glyphicon-bullhorn')
                                                        <span class="{{$val->icon}}" aria-hidden="true"></span>
                                                    @else
                                                        <i class="{{$val->icon}}" aria-hidden="true"></i>
                                                    @endif
                                                    {{$val->title}}</strong></a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

{{--                        <div class="panel panel-primary">--}}
{{--                            <div class="panel-heading"><strong>THỐNG KÊ TRUY CẬP</strong></div>--}}
{{--                            <div class="panel-body" style="padding: 0">--}}
{{--                                <div class="list-group" style="margin-bottom: 0px;">--}}
{{--                                    <a href="/#" class="list-group-item">Đang online:--}}
{{--                                        5</a>--}}
{{--                                    <a href="/#" class="list-group-item">Tổng lượt--}}
{{--                                        truy cập: 1.000</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="col-md-6 col-xs-6 spacingTop"
                         style="padding-top: 15px; padding-right: 5px; padding-left: 5px;">
                        @yield('content')
                    </div>
                    <div class="col-md-3 col-xs-3 spacingTop" style="padding-top: 15px">
                        <div>
                            <div class="valid-404 SpacingBottom">
                                <div><!-- Start_Module_427 -->
                                    <div>

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title" style="font-size: 12px; font-weight: bold">
                                                    <span>{{$setting[\App\Enums\Setting::SITE_NAME]}}</span>
                                                </h3>
                                            </div>
                                            <div class="panel-body" style="padding: 10px; text-align: left;">
                                                <div data-ft="{&quot;tn&quot;:&quot;C&quot;}" id="js_qu"
                                                     style="text-align: justify;">
                                                    <p><img alt=""
                                                            src="{{ isset($banner[\App\Enums\BannerTitle::QR_CODE]) ? url($banner[\App\Enums\BannerTitle::QR_CODE]) : asset('public/uploads/images/QRcode.png') }}"
                                                            style="width: 300px; height: 276px;" title=""></p>

                                                    <p>&nbsp;</p>

                                                    <p>&nbsp;</p>

                                                    @foreach($sidebarBanner as $val)
                                                        <p><img alt=""
                                                                src="{{ $val->image ? url($val->image) : '' }}"
                                                                style="width: 300px; height: 569px;" title="{{$val->title ? url($val->title) : ''}}"></p>
                                                        <p>&nbsp;</p>

                                                        <p>&nbsp;</p>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>


                                    </div><!-- End_Module_427 --></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-401"><a name="401"></a></div>
                    </div>
                </div>
                <div class="row dnnpane">
                    <div class="col-md-4 spacingTop empty-panel"></div>
                    <div class="col-md-8 spacingTop empty-panel"></div>
                </div>

                <div class="row dnnpane">
                    <div class="col-md-4 spacingTop empty-panel"></div>
                    <div class="col-md-4 spacingTop empty-panel"></div>
                    <div class="col-md-4 spacingTop empty-panel"></div>
                </div>
                <div class="row dnnpane">
                    <div id="dnn_ContentPaneLower" class="col-md-12 contentPane spacingTop empty-panel"></div>
                </div>
            </div>
            <!-- /.mainContent-inner -->
        </main>
        <!-- /.mainContent -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer role="contentinfo">
        <div class="footer-below">
            <div class="container">
                <div class="row dnnpane">
                    <div class="col-md-8">
                        <div style="font-size: 15px; color: #fff; font-family: system-ui; line-height: 1.7;">
                            <strong>{{mb_strtoupper($setting[\App\Enums\Setting::SITE_NAME])}}</strong><br>
                            Địa chỉ: {{$setting[\App\Enums\Setting::ADDRESS]}}<br>
                            Điện thoại: {{$setting[\App\Enums\Setting::PHONE]}}<br>
                            Fax: {{$setting[\App\Enums\Setting::FAX]}}<br>
                            Email: {{$setting[\App\Enums\Setting::EMAIL]}}
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4" style="text-align: right">
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- /.SiteWrapper -->


<div class="modal fade" id="imagemodal" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img src="/" id="imagepreview">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<input name="ScrollTop" type="hidden" id="ScrollTop">
<script>
    $("img").on("click", function () {
        $('#imagepreview').attr('src', $(this).attr('src')); // here asign the image to the modal when the user click the enlarge link
        $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
    });
</script>
<script>
    // Get the button
    let mybutton = document.getElementById("myBtn");
    let hotLine = document.getElementById("hot-line");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
            hotLine.style.display = "block";
        } else {
            mybutton.style.display = "none";
            hotLine.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
</body>
</html>
