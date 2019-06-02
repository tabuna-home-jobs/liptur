  <div class="container shop-categories-widget">
    
<div class="owl-carousel master-carousel category-carousel">	
	  @foreach($categories as $category)        
         <article  class="col-md-12 master-reg">
                        <a href="{{route('shop.products',$category->slug)}}" >
                            
                                    <img src="{{$category->term->getContent('fullPicture')}}" class="img-full img-post">
                            
                            <div style="margin-top:1.2rem">
                                <span href="/testurl" class="text-green text-md" >
                                    {{$category->term->getContent('name')}}
                                </span>								
                            </div>
                        </a>
                    </article>
      @endforeach
    </div>
  </div>


