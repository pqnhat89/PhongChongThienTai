<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head id="Head">
    @php $logo = \App\Helpers\Utils::getLogo() @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="og:image" content="">
    <meta id="MetaRobots" name="ROBOTS" content="INDEX, FOLLOW">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ $title ?? $logo->content ?? 'Ban Chỉ huy PCTT và TKCN tỉnh Đắk Nông' }}
    </title>

    <link rel="SHORTCUT ICON" href="{{ $logo->image ?? '' }}" type="image/x-icon">
    <link href="" rel="canonical">

    {{-- Plugins --}}
    <script src="{{ asset('/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/font/css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('/css/default.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/admin.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/SearchSkinObjectPreview.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/jquery.smartmenus.bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/skin.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/css/pclb.css') }}" type="text/css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('/js/scripts.js') }}" defer></script>
    <script src="{{ asset('/js/pctt-web-resource.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/pcct-script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/pcct-script-1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/dnn.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/dnn.modalpopup.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery.smartmenus.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery.smartmenus.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/scripts_cp.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/dnncore.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/SearchSkinObjectPreview.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/dnn.servicesframework.js') }}" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="Body" data-new-gr-c-s-check-loaded="14.1050.0" data-gr-ext-installed="" cz-shortcut-listen="true">
{{-- header --}}
<div id="siteWrapper">
    <!-- UserControlPanel  -->
    <div id="topHeader">
        <div>
            <div class="row">
                <div class="col-md-12">
                    <div class="search">
                            <span id="">
                                <span class="searchInputContainer" data-moreresults="See More Results"
                                      data-noresult="No Results Found">
                                    <input name="" type="text" maxlength="255" size="20" id=""
                                           class="NormalTextBox" aria-label="Search" autocomplete="off"
                                           placeholder="Search...">
                                    <a title="Clear search text"></a>
                                </span>
                                <a id="" class="SearchButton"
                                   href="">Search</a><span
                                        class="search-toggle-icon"></span>
                            </span>

                    </div>
                    <a id="search-action" aria-label="Search"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden-xs">
        <div class="row" style=" margin-right: 0px; margin-left: 0px;">
            <div class="col-md-12"
                 style="background-image: url( {{asset('/public/uploads/images/banner.png') }}); background-repeat: no-repeat; background-size: cover;">
                <table style="width: 100%">
                    <tbody>
                    <tr>
                        <td style="width: 200px; height: 180px; text-align: center; padding: 15px">

                        </td>
                        <td style="text-align: left">
                            <p style="font-size: 22px; color: #0a64a4; font-weight: bold; text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white; margin-bottom: 5px;">
                                UBND TỈNH ĐẮK NÔNG
                            </p>
                            <p class="banner-bch-text">BAN CHỈ HUY PHÒNG, CHỐNG THIÊN TAI VÀ TÌM KIẾM CỨU NẠN</p>
                            <p style="font-size: 16px; color: #0a64a4; font-weight: bold; text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white; margin-bottom: 5px;">
                                Dak Nong Provincial Commanding Commitee of Natural Disaster Prevention and Control,
                                Search and Rescue</p>
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
            <ul class="nav navbar-nav sm" data-smartmenus-id="16459200511787002">
                <li><a href="/">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Trang chủ</a></li>
                <li><a href="{{route('about')}}">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                        Giới thiệu</a></li>
                <li class="dropdown">
                    <a href="/#" class="dropdown-toggle has-submenu"
                       data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                       id="sm-16459200511787002-1" aria-controls="sm-16459200511787002-2">
                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                        Tổ chức bộ máy <span class="caret"></span></a>
                    <ul class="dropdown-menu" id="sm-16459200511787002-2" role="group" aria-hidden="true"
                        aria-labelledby="sm-16459200511787002-1" aria-expanded="false">
                        <li><a href="{{route('structure')}}">Sơ đồ chung</a></li>
                        <li><a href="/#">Ban chỉ đạo TW về PCTT</a></li>
                        <li><a href="/#">Ban Chỉ huy PCTT và TKCN cấp Tỉnh</a></li>
                        <li><a href="/#">Ban Chỉ huy PCTT và TKCN cấp Huyện</a></li>
                        <li><a href="/#">Ban Chỉ huy PCTT và TKCN cấp Xã</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="/#" class="dropdown-toggle has-submenu"
                       data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                       id="sm-16459200511787002-3" aria-controls="sm-16459200511787002-4">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        Tin tức</a>
                    <ul class="dropdown-menu" id="sm-16459200511787002-4" role="group" aria-hidden="true"
                        aria-labelledby="sm-16459200511787002-3" aria-expanded="false">
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
                    <div id="dnn_ContentPane" class="col-md-12 contentPane">
                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-353"><a name="353"></a>
                            <div id="dnn_ctr353_ContentPane"><!-- Start_Module_353 -->
                                <div id="dnn_ctr353_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                    <div id="dnn_ctr353_HtmlModule_lblContent" class="Normal">
                                        {{--                                            <div class="carousel slide" data-ride="carousel"--}}
                                        {{--                                                 id="carousel-example-generic"><!-- Indicators -->--}}
                                        {{--                                                <ol class="carousel-indicators">--}}
                                        {{--                                                    <li class="active" data-slide-to="0"--}}
                                        {{--                                                        data-target="#carousel-example-generic">&nbsp;--}}
                                        {{--                                                    </li>--}}
                                        {{--                                                    <li data-slide-to="1" data-target="#carousel-example-generic">--}}
                                        {{--                                                        &nbsp;--}}
                                        {{--                                                    </li>--}}
                                        {{--                                                    <li data-slide-to="2" data-target="#carousel-example-generic">--}}
                                        {{--                                                        &nbsp;--}}
                                        {{--                                                    </li>--}}
                                        {{--                                                    <li data-slide-to="3" data-target="#carousel-example-generic">--}}
                                        {{--                                                        &nbsp;--}}
                                        {{--                                                    </li>--}}
                                        {{--                                                    <li data-slide-to="4" data-target="#carousel-example-generic">--}}
                                        {{--                                                        &nbsp;--}}
                                        {{--                                                    </li>--}}
                                        {{--                                                </ol>--}}
                                        {{--                                                <!-- Wrapper for slides -->--}}

                                        {{--                                                <div class="carousel-inner" role="listbox">--}}
                                        {{--                                                    <div class="item"><img--}}
                                        {{--                                                                src="{{ asset('/public/uploads/images/Bangzon_2.jpg') }}">--}}
                                        {{--                                                        <!-- Controls --></div>--}}

                                        {{--                                                    <div class="item"><img--}}
                                        {{--                                                                src="{{ asset('/public/uploads/images/Bangzon_3_1.jpg') }}">--}}
                                        {{--                                                        <!-- Controls --></div>--}}

                                        {{--                                                    <div class="item"><img--}}
                                        {{--                                                                src="{{ asset('/public/uploads/images/Bangzon_5.jpg') }}">--}}
                                        {{--                                                        <!-- Controls --></div>--}}

                                        {{--                                                    <div class="item"><img--}}
                                        {{--                                                                src="{{ asset('/public/uploads/images/Bangzon_4.jpg') }}">--}}
                                        {{--                                                        <!-- Controls --></div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}

                                        <p>&nbsp;</p>

                                    </div>

                                </div><!-- End_Module_353 --></div>
                        </div>
                        <div class="DnnModule DnnModule-DNN_HTML DnnModule-465"><a name="465"></a></div>
                    </div>
                </div>
                <div class="row dnnpane">
                    <div id="P2_25_3" class="col-md-3 col-xs-3 spacingTop">
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
                            <a href="#"
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
                                    <a href="#" class="list-group-item"><strong>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            LỊCH CÔNG TÁC</strong></a>
                                    <a href="#"
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
                                    <a target="_blank" href="http://www.nchmf.gov.vn/Web/vi-VN/72/Default.aspx"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-cloud" aria-hidden="true"></i>
                                            Ảnh mây vệ tinh</strong></a>
                                    <a target="_blank" href="http://www.nchmf.gov.vn/"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            Khí tượng thủy văn TW</strong></a>
                                    <a target="_blank" href="http://www.typhoon2000.ph/t2kgraphsat.gif"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            Phân tích ảnh vệ tinh hằng ngày</strong></a>
                                    <a target="_blank" href="http://www.vnbaolut.com/"
                                       class="list-group-item"><strong>
                                            <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                                            Dự báo bão Việt Nam</strong></a>
                                    <a target="_blank" href="https://www.nrlmry.navy.mil/tc_pages/tc_home.html"
                                       class="list-group-item"><strong>
                                            <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                                            Dự báo bão hải quân Hoa Kỳ</strong></a>
                                    <a target="_blank" href="http://www.hko.gov.hk/wxinfo/currwx/tc_gis_e.htm"
                                       class="list-group-item"><strong>
                                            <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                                            Dự báo bão Hong Kong</strong></a>
                                    <a target="_blank"
                                       href="http://phongchongthientai.mard.gov.vn/Pages/Trang-chu.aspx"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            Ban Chỉ đạo TW về PCTT</strong></a>
                                    <a target="_blank" href="https://quanlytau.ais.vishipel.vn/"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            Hệ thống theo dõi quản lý tàu</strong></a>
                                    <a target="_blank" href="http://vhlh.wru.vn/boat-connection/boat-operation#"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            Phần mềm hiển thị thông tin tàu cá</strong></a>
                                    <a target="_blank" href="https://earth.nullschool.net/"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            Trường gió toàn cầu</strong></a>
                                    <a target="_blank" href="http://www.vnbaolut.com/"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            Dự báo thời tiết bão lụt Việt Nam</strong></a>
                                    <a target="_blank" href="http://www.jma.go.jp/en/typh"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            Dự báo bão Nhật Bản</strong></a>
                                    <a target="_blank" href="http://www.typhoon2000.ph/t2kgraphsat.gif"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            Ảnh phân tích vệ tinh hằng ngày</strong></a>
                                    <a target="_blank"
                                       href="http://www.tropicalstormrisk.com/tracker/dynamic/W.html"
                                       class="list-group-item"><strong>
                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                            Dự báo TSR</strong></a>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading"><strong>THỐNG KÊ TRUY CẬP</strong></div>
                            <div class="panel-body" style="padding: 0">
                                <div class="list-group" style="margin-bottom: 0px;">
                                    <a href="/#" class="list-group-item">Đang online:
                                        5</a>
                                    <a href="/#" class="list-group-item">Tổng lượt
                                        truy cập: 1.000</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dnn_P2_75_3" class="col-md-6 col-xs-6 spacingTop"
                         style="padding-top: 15px; padding-right: 5px; padding-left: 5px;">
                        @yield('content')
                    </div>
                    <div id="dnn_P2_75_4" class="col-md-3 col-xs-3 spacingTop" style="padding-top: 15px">
                        <div class="DnnModule DnnModule-XemBaiViet DnnModule-427"><a name="427"></a>
                            <div class="valid-404 SpacingBottom">
                                <div id="dnn_ctr427_ContentPane" class=""><!-- Start_Module_427 -->
                                    <div id="dnn_ctr427_ModuleContent" class="DNNModuleContent ModXemBaiVietC">

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title" style="font-size: 12px; font-weight: bold">
                                                    <span id="dnn_ctr427_View_lbHeader">BAN CHỈ HUY PHÒNG CHỐNG THIÊN TAI VÀ TÌM KIẾM CỨU NẠN TỈNH ĐẮK NÔNG</span>
                                                </h3>
                                            </div>
                                            <div class="panel-body" style="padding: 10px; text-align: left;">
                                                <div data-ft="{&quot;tn&quot;:&quot;C&quot;}" id="js_qu"
                                                     style="text-align: justify;">
                                                    <p><img alt=""
                                                            src="{{ asset('/public/uploads/images/QRcode.png') }}"
                                                            style="width: 300px; height: 276px;" title=""></p>

                                                    <p>&nbsp;</p>

                                                    <p>&nbsp;</p>

                                                    <p><img alt=""
                                                            src="{{ asset('/public/uploads/images/Phuon_3.jpg') }}"
                                                            style="width: 300px; height: 569px;" title=""></p>

                                                    <p><img alt=""
                                                            src="{{ asset('/public/uploads/images/Phuon_41.jpg') }}"
                                                            style="width: 300px; height: 615px;" title=""></p>

                                                    <p>&nbsp;</p>

                                                    <p>&nbsp;</p>
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
                    <div id="dnn_P2_25_1" class="col-md-4 spacingTop DNNEmptyPane"></div>
                    <div id="dnn_P2_75_2" class="col-md-8 spacingTop DNNEmptyPane"></div>
                </div>

                <div class="row dnnpane">
                    <div id="dnn_P3_33_1" class="col-md-4 spacingTop DNNEmptyPane"></div>
                    <div id="dnn_P3_33_2" class="col-md-4 spacingTop DNNEmptyPane"></div>
                    <div id="dnn_P3_33_3" class="col-md-4 spacingTop DNNEmptyPane"></div>
                </div>
                <div class="row dnnpane">
                    <div id="P4_33_1" class="col-md-12 spacingTop">
                        <div class="panel panel-default">
                            <div class="panel-heading"><strong>LIÊN KẾT WEBSITE</strong></div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <a href="http://www.nchmf.gov.vn/web/vi-VN/43/Default.aspx"
                                           title="Khí tượng thủy văn TW">Khí tượng thủy văn TW</a>
                                    </div>
                                    ...
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row dnnpane">
                    <div id="dnn_ContentPaneLower" class="col-md-12 contentPane spacingTop DNNEmptyPane"></div>
                </div>
            </div>
            <!-- /.mainContent-inner -->
        </main>
        <!-- /.mainContent -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer role="contentinfo">
        <div class="footer-above">
            <div class="container">
                <div class="row dnnpane">
                    <div id="dnn_footer_25_1" class="footer-col col-md-3 col-sm-6 DNNEmptyPane"></div>
                    <div id="dnn_footer_25_2" class="footer-col col-md-3 col-sm-6 DNNEmptyPane"></div>
                    <div class="clearfix visible-sm"></div>
                    <div id="dnn_footer_25_3" class="footer-col col-md-3 col-sm-6 DNNEmptyPane"></div>
                    <div id="dnn_footer_25_4" class="footer-col col-md-3 col-sm-6 DNNEmptyPane"></div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row dnnpane">
                    <div class="col-md-8">
                        <div style="font-size: 13px">
                            <strong>BAN CHỈ HUY PHÒNG CHỐNG THIÊN TAI VÀ TÌM KIẾM CỨU NẠN TỈNH ĐẮK NÔNG</strong><br>
                            Địa chỉ: XX XXX XXX – Phường XX- Tỉnh Đắk Nông<br>
                            Điện thoại: 0234.3822519 - 0234.3849123<br>
                            Fax: 0234.3824480<br>
                            Email: chonglutbaotth@gmail.com ; bchpclbtkcn@daknong.gov.vn
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4" style="text-align: right">
                        <img src="{{ asset('public/uploads/images/logodwf.bmp') }}" style="height: 68px">
                        <img src="{{ asset('public/uploads/images/logojica.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
<!-- /.SiteWrapper -->


<link href="{{ asset('font/css/font-awesome.min.css') }}" rel="stylesheet">

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
<script>
    $("img").on("click", function () {
        $('#imagepreview').attr('src', $(this).attr('src')); // here asign the image to the modal when the user click the enlarge link
        $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
    });
</script>
<input name="ScrollTop" type="hidden" id="ScrollTop">
<input name="__dnnVariable" type="hidden" id="__dnnVariable" autocomplete="off"
       value="`{`__scdoff`:`1`,`sf_siteRoot`:`/`,`sf_tabId`:`20`}">
<input name="__RequestVerificationToken" type="hidden"
       value="LisLrZP6i1DuOipECquDCIQGfOQmon_EievN426ruIem1U8G3mgI14cO19YIlJCRT2cAng2">
</body>
</html>
