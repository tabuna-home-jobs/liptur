
<ul class="nav navbar-nav">
    <li>
        <button class="btn btn-link" type="button">
            <i class="fa fa-bars"></i>
        </button>
    </li>
    
    @include('partials.widgets.menu.menuitem',[
        'menu'=>$menu
    ])
    
    {{--
    <li>
        <a href="{{route('about')}}" rel="prefetch" title="Интересные факты">Об области</a>
    </li>
    <li>
        <a href="{{route('news')}}" title="Новости Липецкой области">Новости</a>
    </li>
    <li>
        <a href="{{route('investor')}}" title="Потенциал области">Инвесторам</a>
    </li>


    <li class="dropdown pos-stc">
        <a href="#" data-toggle="dropdown" class=" dropdown-toggle" aria-expanded="true">
            Категории
        </a>
        <div class="dropdown-menu wrapper w-full bg-white">
            <div class="row">
                <div class="col-sm-4 col-md-6">
                    @widget('menuCategory')
                </div>
                <div class="col-sm-4 col-md-6 b-l b-light">
                    @widget('menuTopMiddleColum')
                </div>
            </div>
        </div>
    </li>
    --}}
</ul>

{{--
  <ul class="uk-navbar-nav uk-visible@s">
	@include(config('blogcms.viewpath').'widgets.menu.menuitem',[
		'menu'=>$menu
	])
  </ul>
  
<div class="uk-hidden@s">
    <a class="uk-navbar-toggle" href="#" aria-expanded="false">
        <span class="uk-margin-small-right">МЕНЮ</span> 
        <span data-uk-navbar-toggle-icon="" class="uk-navbar-toggle-icon uk-icon"></span>
    </a>
    
    <div class="uk-navbar-dropdown uk-navbar-dropdown-bottom-justify" data-uk-drop="mode: click; cls-drop: uk-navbar-container; boundary: !nav; flip: x; boundary-align: true; pos: bottom-justify;">
              <ul class="uk-nav-primary uk-nav-parent-icon" data-uk-nav>
                @include(config('blogcms.viewpath').'widgets.menu.menuitem-push',[
                    'menu'=>$menu
                ])
              </ul>
    </div>
</div>
--}}
