<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php $logo = \App\Helpers\Utils::getLogo() @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ $logo->content ?? 'Ban Chỉ huy PCTT và TKCN tỉnh Đắk Nông' }}
    </title>

    <link rel="SHORTCUT ICON" href="{{ $logo->image ?? '' }}" type="image/x-icon">

    {{-- Plugins --}}
    <script src="{{ asset('/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/js/moment-with-locales.min.js')}}"></script>
    <script src="{{ asset('/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('/plugins/ckfinder/ckfinder.js') }}"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/font/css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('/js/scripts.js') }}" defer></script>

</head>
<body class="sb-nav-fixed {{ substr(request()->route()->getName(), 0, 5) == 'admin' ? "" : "sb-sidenav-toggled" }}">
    {{-- header --}}
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/">
            @if ($logo)
                <img class="logo" src="{{ $logo->image }}" title="{{ $logo->content }}" style="max-height:100%">
            @else
                {{ config('app.name', 'Laravel') }}
            @endif
        </a>
        @auth
        <button class="btn btn-link  order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            {{-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                </div>
            </div> --}}
        </form>
        <!-- Navbar-->
        <h4 class="text-white">{{ auth()->user()->name }}</h4>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    {{-- <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a> --}}
                    {{-- <div class="dropdown-divider"></div> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        @endauth
    </nav>

    {{-- content --}}
    <div id="layoutSidenav">
        {{-- sidebar --}}
        @auth
        <div id="layoutSidenav_nav">
            @switch(substr(request()->route()->getName(), 0, 5))
                @case('???')
                    @component('layouts.home-nav')
                    @endcomponent
                    @break
                @case('admin')
                    @component('layouts.admin-nav')
                    @endcomponent
                    @break
                @default
            @endswitch
        </div>
        @endauth
        {{-- main --}}
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

<script>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            alert('{{ $error }}');
            @break;
        @endforeach
    @endif
</script>

</html>
