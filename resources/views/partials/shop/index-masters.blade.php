  <div class="wrapper bg-white main-category">
  <div class="block-header container pt-3 padder-v">
    Мастера земли липецкой
  </div>
  <div class="container shop-categories-widget">
    <div class="owl-carousel master-carousel category-carousel">	
	  @foreach($regionlists as $regionlist)        
         <article  class="col-md-12 master-reg">
                        <a href="/shop/masters/{{$regionlist->id}}" >
                            
                                    <img src="{{$regionlist->photo}}" class="img-full img-post">
                            
                            <div style="text-align:center; margin-top: 1.2rem">
                                <span href="/testurl" class="text-green text-md" >
                                    {{$regionlist->content}}
                                </span>								
                            </div>
                        </a>
                    </article>
      @endforeach
    </div>
	</div>
  </div>


