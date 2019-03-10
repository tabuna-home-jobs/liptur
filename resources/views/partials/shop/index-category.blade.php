<div class="wrapper bg-white main-category">
  <div class="block-header container pt-3 padder-v">
    Каталог товаров
  </div>
  <div class="container shop-categories-widget">
    <div class="owl-carousel category-carousel">
      @foreach($categories as $category)
        <figure class="item">
          <a href="{{route('shop.products',$category->slug)}}">
            <img src="@if($category->term->getContent('smallPicture')!=""){{$category->term->getContent('smallPicture')}} @else /img/icons/slon.png @endif"/>
            <p>{{$category->term->getContent('name')}}</p>
          </a>
        </figure>
      @endforeach
    </div>
  </div>
</div>