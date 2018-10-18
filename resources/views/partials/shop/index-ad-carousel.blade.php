@php
    $images = Orchid\Platform\Core\Models\Post::where('slug','carousel-links')->with('attachment')->first()->attachment()->get();
    //dd ($images->alt);
@endphp

<div class="bg-white padder-v" id="ad-carousel">
    <div class="container no-padder">
      <svg class="defs-only">
        <filter id="monochrome">
           <feColorMatrix in="SourceGraphic" 
                          type="matrix" 
                          values=".25 .10 .13 0 0 0 .01 0 0 0 0 0 .01 0 0 0 0 0 1 0 "></feColorMatrix>
        </filter>
      </svg>
      <div class="owl-carousel ad-carousel">
        @foreach ($images as $image)
            <figure class="item">
              <a href="{{$image->alt}}">
                <img class="owl-lazy img-responsive" data-src="{{$image->url('high')}}" title="{{$image->description}}">
              </a>
            </figure>
        @endforeach
      </div>
    </div>
</div>