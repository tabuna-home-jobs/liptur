<div class="bg-white padder-v">
    <div class="container no-padder">
      <div class="owl-carousel ad-carousel">
        @for($i=1; $i<6; $i++)
           <figure class="item">
              <a href="#">
                <img class="owl-lazy img-responsive" data-src="/img/carusel/b-{{$i}}.png" data-hover-src="/img/carusel/color/b-{{$i}}.png">
              </a>
          </figure>
        @endfor
      </div>
    </div>
</div>