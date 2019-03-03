<div class="m-t-md b-b no-padder menu-header-mobile collapse">
    <div class="flex">
        <!-- Авторизация  -->
        @if (Auth::guest())
            <div class="m-l-md">
                <a href="{{ url('/login') }}" class="navbar-auth">
                    <div>
                        <i class="key-icon m-r-xs"></i>Вход
                    </div>
                </a>
            </div>
        @else
            <div class="m-l-md">
                <div class="navbar-profile">
                    <a href="{{ url('/profile') }}" title="Мой профиль">
                                    <span class="thumb-sm avatar">
                                    <img src="{{Auth::user()->getAvatar() }}" alt="{{Auth::user()->name}}">
                                    <i class="on md b-white bottom"></i>
                                    </span>
                    </a>
                    <a href="{{ url('/logout') }}" title="Выход" class="navbar-auth">Выход</a>
                </div>
            </div>
        @endif

        <div class="m-r-md">
            <div class="navbar-locale">
                <a href="{{Localization::getLocalizedURL('ru','/') }}"
                   class="green-button {{App::getLocale()=='ru'? 'raised': ''}}" hreflang="ru"
                   title="Сменить язык">РФ</a>
                <a href="{{Localization::getLocalizedURL('en','/') }}"
                   class="green-button {{App::getLocale()=='en'? 'raised': ''}}" hreflang="en"
                   title="Сменить язык">EN</a>
            </div>
        </div>
    </div>

    <ul class="nav navbar-nav">
        <li class="hidden-xs">
            <button class="btn btn-link" type="button" data-toggle="modal" data-target="#topmenu">
                <i class="fa fa-bars"></i>
            </button>
        </li>
            {{$menuitem}}
        {{--
        @include('partials.widgets.menu.menuitem',[
            'menu'=>$menu,
        ])
        --}}
    </ul>
</div>