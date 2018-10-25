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

{{--
    <div class="bg-white">
        <section class="container-lg">
            <div class="row">
                <div class="bg-bordo">
                    <div class="container">
                        <h1 class="brand-header">{{$page->getContent('name')}}</h1>
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
                    'current' => $page->getContent('name') ])
                </div>
            </nav>
        </div>
    </section>
    --}}
@endsection

@section('shop')
    <div class="container padder-v auth">
        <div class="row m-t-lg">
        {!! $page->getContent('body') !!}
        </div>
    </div>
@endsection
