@php
    $images = Orchid\Press\Models\Page::where('slug','investor-links')->with('attachment')->first()->attachment()->get();
    //dd ($images->alt);
@endphp

<div class="bg-white padder-v" id="bt-carousel">
    <div class="container no-padder">
      <div class="owl-carousel bt-carousel">
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