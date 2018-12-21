@extends('layouts.app-new')
@section('title',$page->getContent('title'))
@section('description',$page->getContent('description'))
@section('keywords',$page->getContent('keywords'))

@section('top-advertising','')

@section('content')

    <div class="about" id="about-container">
        <section class="bg-dark" style="
background: url(/img/tour/about/hero1-min.jpg);
    background-size: cover;
">
            <div class="bg-black-opacity v-h-center h-full">
                <div class="container">
                    <p>
                        {{$page->getContent('slideOne')}}
                    </p>
                </div>
            </div>

        </section>
        <section class="bg-dark" style="
background: url(/img/tour/about/hero2-min.jpg);   background-size: cover;
">
            <div class="bg-black-opacity v-h-center h-full">
                <div class="container">
                    <p>
                        {{$page->getContent('slideTwo')}}
                    </p>
                </div>
            </div>

        </section>
        <section class="bg-dark" style="
background: url(/img/tour/about/hero4-min.jpg);
    background-size: cover;
">
            <div class="bg-black-opacity v-h-center h-full">
                <div class="container">
                    <p>
                        {{$page->getContent('slideThree')}}
                    </p>
                </div>
            </div>

        </section>
        <section class="bg-dark" style="
background: url(/img/tour/about/hero5-min.jpg);
    background-size: cover;
">
            <div class="bg-black-opacity v-h-center h-full">
                <div class="container">
                    <p>
                        {{$page->getContent('slideFour')}}
                    </p>
                </div>
            </div>

        </section>
        <section class="bg-dark" style="
background: url(/img/tour/about/hero6-min.jpg); background-size: cover;
">
            <div class="bg-black-opacity v-h-center h-full">
                <div class="container">
                    <p>
                        {{$page->getContent('slideFive')}}
                    </p>
                </div>
            </div>

        </section>


        <section class="bg-dark" style="
background: url(/img/tour/about/hero7-min.jpg); background-size: cover;
">
            <div class="bg-black-opacity v-h-center h-full">
                <div class="container">
                    <p>
                        {{$page->getContent('slideSix')}}
                    </p>
                </div>
            </div>

        </section>

        <section class="bg-dark" style="
background: url(/img/tour/about/hero8-min.jpg); background-size: cover;
">
            <div class="bg-black-opacity v-h-center h-full">
                <div class="container">
                    <p>
                        {{$page->getContent('slideSeven')}}
                    </p>
                </div>
            </div>

        </section>
        <section class="bg-dark" style="
background: url(/img/tour/about/hero9-min.jpg); background-size: cover;
">
            <div class="bg-black-opacity v-h-center h-full">
                <div class="container">
                    <p>
                        {{$page->getContent('slideEight')}}
                    </p>
                </div>
            </div>

        </section>


    </div>





@endsection

@section('ad-carousel','')
@section('footer','')
