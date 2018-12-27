<div class="collapse navbar-collapse m-t-md b-b no-padder menu-shop-header {{((Request::is('shop')) ||(Request::is('shop/*')))?'':'menu-site-header'}}">
    <ul class="nav navbar-nav">
        <li class="hidden-xs">
            <button class="btn btn-link" type="button" data-toggle="modal" data-target="#topmenu">
                <i class="fa fa-bars"></i>
            </button>
        </li>
        @include('partials.widgets.menu.menuitem',[
            'menu'=>$menu
        ])
    </ul>
</div>