<div class="collapse navbar-collapse m-t-md b-b no-padder menu-shop-header">
    <ul class="nav navbar-nav">
        <li>
            <button class="btn btn-link" type="button">
                <i class="fa fa-bars"></i>
            </button>
        </li>
        
        @include('partials.widgets.menu.menuitem',[
            'menu'=>$menu
        ])
    </ul>
</div>