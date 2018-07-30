@php
    $page = Orchid\Platform\Core\Models\Page::where('slug','carousel-links')->with('attachment')->first();
    dd($page);
@endphp

<div class="bg-white padder-v">
    <div class="container no-padder">
      <svg class="defs-only">
        <filter id="monochrome">
           <feColorMatrix in="SourceGraphic" 
                          type="matrix" 
                          values=".25 .10 .13 0 0 0 .01 0 0 0 0 0 .01 0 0 0 0 0 1 0 "></feColorMatrix>
        </filter>
      </svg>
      <div class="owl-carousel ad-carousel">
        @for($i=1; $i<6; $i++)
           <figure class="item">
              <a href="#">
                <img class="owl-lazy img-responsive" src="/img/carusel/color/b-{{$i}}.png">
              </a>
          </figure>
        @endfor
      </div>
    </div>
</div>