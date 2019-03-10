@extends('layouts.shop')
@section('title',$page->getContent('name'))
@section('description',$page->getContent('name'))
@section('keywords',$page->getContent('name'))


@section('header')
    @include('partials.header.headerMin',[
                'image'  => '',
                'title' => $page->getContent('name'),
                'breadcrumb' =>[
                    'breadcrumb' => [],
                    'base' => [
                            'route' => route('shop'),
                            'name' => 'Магазин',
                    ],
                    'current' => $page->getContent('name') ]
            ])

@endsection

@section('shop')
    <div class="container padder-v auth">
        <div class="row m-t-lg">
        {!! $page->getContent('body') !!}

            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aaa07a2b5a37b673f1a90d0fc5b6530b21e52e296e10bf48575b678c1e2eaf399&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>

        </div>

    </div>

@endsection
