<div class="bg-white">
    <section class="container-lg">
        <div class="row">
            <div class="bg-bordo" style="background-image: url({{$image}}); @isset($position) background-position:{{$position}}; @endisset">
                <div class="container">
                    <h1 class="brand-header">{{$title}}</h1>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="container-lg hidden-xs">
    <div class="row">
        <nav>
            <div class="container">
                @include('partials.breadcrumb',$breadcrumb)
            </div>
        </nav>
    </div>
</section>