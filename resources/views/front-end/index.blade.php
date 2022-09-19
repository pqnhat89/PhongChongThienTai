@extends('layouts.fe-app')

@section('content')
    <?php
        $bttt = \App\Services\PostServices::getPostByType(\App\Enums\PostType::BTTT);
        $vbcd_dk = \App\Services\PostServices::getPostByType(\App\Enums\PostType::VBCD_CDK);
        $ttsk = \App\Services\PostServices::getPostByType(\App\Enums\PostType::TTSK);
        $vbcddh = \App\Services\PostServices::getPostByType(\App\Enums\PostType::VBCDDH);
    ?>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"
                                    style="font-size: 12px; font-weight: bold">
                                    {{\App\Enums\PostType::BTTT}}
                                </h3>
                            </div>
                            <div class="panel-body" style="padding: 0px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{url('/xem') . '/' . $bttt[0]->id}}">
                                            <div class="thumbnail"
                                                 style="padding: 0px; margin-bottom: 0px">
                                                <img src="{{ asset('public') . $bttt[0]->image }}"
                                                     alt="100%x200"
                                                     data-src="holder.js/100%x200"
                                                     style="width: 100%; display: block;"
                                                     data-holder-rendered="true">
                                                <div class="caption">
                                                    <p style="font-weight: bold; margin: 0 0 0px; color: #d82525; text-align: justify">
                                                        {{$bttt[0]->title}}
                                                    </p>
                                                    <p style="text-align: justify; margin-bottom: 0px">
                                                        {{$bttt[0]->sub_title}}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6" style="padding-left: 0;">
                                        <ul class="list-group" style="margin-left: 0px">
                                            @for($i=1; $i<count($bttt); $i++)
                                                <li class="list-group-item"
                                                    style="padding: 6px 10px;">
                                                    <a href="{{url('/xem') . '/' . $bttt[$i]->id}}"
                                                       style="color: #333">
                                                        <i class="fa fa-caret-right"
                                                           aria-hidden="true"></i>
                                                        {{$bttt[$i]->title}}
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
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"
                                    style="font-size: 12px; font-weight: bold">
                                    {{\App\Enums\PostType::VBCD_CDK}}
                                </h3>
                            </div>
                            <div class="panel-body" style="padding: 0px;">

                                <ul class="list-group"
                                    style="margin-left: 0px; margin-bottom: 0px;">
                                    @foreach($vbcd_dk as $vb)
                                        <li class="list-group-item"
                                            style="padding: 6px 10px; text-align: justify">
                                            <a href="{{url('/xem') . '/' . $vb->id}}"
                                               style="color: #333">
                                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                                                {{$vb->title}}
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
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"
                                    style="font-size: 12px; font-weight: bold">
                                    {{\App\Enums\PostType::TTSK}}
                                </h3>
                            </div>
                            <div class="panel-body" style="padding: 0px;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{url('/xem') . '/' . $ttsk[0]->id}}">
                                            <div class="thumbnail"
                                                 style="padding: 0px; margin-bottom: 0px">
                                                <img src="{{ asset('public') . $ttsk[0]->image }}"
                                                     alt="100%x200"
                                                     data-src="holder.js/100%x200"
                                                     style="width: 100%; display: block;"
                                                     data-holder-rendered="true">
                                                <div class="caption">
                                                    <p style="font-weight: bold; margin: 0 0 0px; color: #d82525; text-align: justify">
                                                        {{$ttsk[0]->title}}
                                                    </p>
                                                    <p style="text-align: justify; margin-bottom: 0px">
                                                        {{$ttsk[0]->sub_title}}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6" style="padding-left: 0;">
                                        <ul class="list-group" style="margin-left: 0px">
                                            @for($i=1; $i<count($ttsk); $i++)
                                                <li class="list-group-item"
                                                    style="padding: 6px 10px;">
                                                    <a href="{{url('/xem') . '/' . $ttsk[$i]->id}}"
                                                       style="color: #333">
                                                        <i class="fa fa-caret-right"
                                                           aria-hidden="true"></i>
                                                        {{$ttsk[$i]->title}}
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
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"
                                    style="font-size: 12px; font-weight: bold">
                                    {{\App\Enums\PostType::VBCDDH}}
                                </h3>
                            </div>
                            <div class="panel-body" style="padding: 0px;">

                                <ul class="list-group"
                                    style="margin-left: 0px; margin-bottom: 0px;">
                                    @foreach($vbcddh as $vbc)
                                        <li class="list-group-item"
                                            style="padding: 6px 10px; text-align: justify">
                                            <a href="{{url('/xem') . '/' . $vbc->id}}"
                                               style="color: #333">
                                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                                                {{$vbc->title}}
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
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <p><img alt=""
                                src="{{ isset($banner[\App\Enums\BannerTitle::FOOTER_BANNER]) ? asset('') . $banner[\App\Enums\BannerTitle::FOOTER_BANNER] : asset('/public/uploads/images/banner_1000x150.png') }}"
                                style="width: 1000px; height: 150px;" title=""></p>
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
