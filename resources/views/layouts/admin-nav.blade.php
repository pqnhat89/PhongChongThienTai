<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Configs</div>
            <a class="nav-link" href="#logo">
                <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                Logo
            </a>
            <a class="nav-link" href="#carousel">
                <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                Carousel
            </a>
            <a class="nav-link" href="#team">
                <div class="sb-nav-link-icon"><i class="fa fa-question-circle"></i></div>
                Team
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ auth()->user()->name }}
    </div>
</nav>
