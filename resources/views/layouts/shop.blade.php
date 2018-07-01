@extends('layouts.app-new')

@section('submenu')

    <div class="visible-xs padder-v-micro row"></div>

    <div class="row padder-l-xl no-p-xs">
        <div class="col-xs-9 hidden-xs">
            @widget('shopHeaderMiddle')
        </div>
        <div class="col-xs-6 visible-xs">
            <button class="btn btn-link visible-xs m-r m-v" type="button" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <i class="fa fa-bars fa-lg"></i>
            </button>
        </div>
        <div class="col-xs-6 col-md-3">
            <ul class="nav nav-cart pull-right">
                <li>
                    <a>
                        <i class="cart-icon"></i> 0 товаров
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')

    @yield('shop')

@endsection