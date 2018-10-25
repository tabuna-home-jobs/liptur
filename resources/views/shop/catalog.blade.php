@extends('layouts.shop')
@section('title','Магазин')
@section('description','Магазин')
@section('keywords','Магазин')

@section('header')
    @include('partials.header.headerMin',[
                'image'  => $categories[0]->term->getContent('fullPicture'),
                'title' => 'Интернет-магазин',
                'breadcrumb' =>[
                    'breadcrumb' => [],
                    'base' => [
                            'route' => route('shop'),
                            'name' => 'Интернет-магазин',
                    ],
                    'current' => 'Каталог товаров' ]
            ])
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
