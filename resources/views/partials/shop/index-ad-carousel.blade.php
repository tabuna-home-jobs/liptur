@php
    $images = Cache::remember('partials-shop-index-ad-carousel-'.App::getLocale(), \Carbon\Carbon::now()->addHour(), function () {
        return Orchid\Press\Models\Post::where('slug','carousel-links')->with('attachment')->first()->attachment()->get();
    });
@endphp

<div class="bg-white padder-v" id="ad-carousel">
    <div class="container no-padder">
      {{--
      <svg class="defs-only">
        <filter id="monochrome">
           <feColorMatrix in="SourceGraphic" 
                          type="matrix" 
                          values=".25 .10 .13 0 0 0 .01 0 0 0 0 0 .01 0 0 0 0 0 1 0 "></feColorMatrix>
        </filter>
      </svg>
      --}}
      <div class="owl-carousel ad-carousel">
        @foreach ($images as $image)
            <figure class="item">
              <a href="{{$image->alt}}" class="btn-opacity block">
                <img class="owl-lazy img-responsive" data-src="/image/high{{$image->url()}}" title="{{$image->description}}">
              </a>
            </figure>
        @endforeach
      </div>
    </div>
</div>