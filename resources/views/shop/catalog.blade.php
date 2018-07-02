@extends('layouts.shop')
@section('title','Магазин')
@section('description','Магазин')
@section('keywords','Магазин')

@section('header')
    <div class="bg-white">
        <section class="container-lg">
            <div class="row">
                <div class="bg-bordo">
                    <div class="container">
                        <h1 class="brand-header">Интернет-магазин</h1>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="container-lg">
        <div class="row">
            <nav>
                <div class="container">
                    @include('partials.breadcrumb',[
                    'breadcrumb' => [],
                    'base' => [
                            'route' => route('shop'),
                            'name' => 'Магазин',
                    ],
                    'current' => 'Каталог товаров' ])
                </div>
            </nav>
        </div>
    </section>
@endsection

@section('shop')

    <section>
        <div class="container padder-v">
            <div class="row">
                <div class="block-header">
                    Каталог товаров
                </div>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <article class="col-md-4 padder-v">
                        <a href="{{route('shop.products',$category->slug)}}" class="block pos-rlt catalog">
                            <div data-mh="main-news-img" style="height: 200px;">
                                    <img src="{{$category->term->getContent('fullPicture')}}" class="img-full img-post">
                            </div>
                            <div class="padder-v">
                                <span href="/testurl" class="text-green text-md">
                                    {{$category->term->getContent('name')}}
                                </span>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection