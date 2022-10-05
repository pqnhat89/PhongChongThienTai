<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="{{ route('admin.post.index') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                Bài viết
            </a>
            <a class="nav-link" href="{{ route('admin.menu.index') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                Liên kết website
            </a>
            <a class="nav-link" href="{{ route('admin.banner.index') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                Banner
            </a>
            <a class="nav-link" href="{{ route('admin.user.index') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                Người dùng
            </a>
            <a class="nav-link" href="{{ route('admin.schedule.index') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                Lịch công tác
            </a>
            <a class="nav-link" href="{{ route('admin.setting.index') }}">
                <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                Cài đặt khác
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ auth()->user()->name }}
    </div>
</nav>
