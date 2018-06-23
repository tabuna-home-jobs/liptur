@if(count($offer->childrenTerm) > 0)
    <div class="list-group">

        @foreach($offer->childrenTerm as $post)
            <a class="list-group-item"

               href="#{{$post->slug}}"
               role="tab"
               data-toggle="tab"
               aria-controls="{{$post->slug}}"
               id="{{$post->slug}}-tab"
               style="margin-left: {{$count + 30}}px"

            ><span class="text-sm m-l-md font-thin"><i
                            class="icon-arrow-right m-r-xs"></i> {{$post->term->getContent('name')}}</span></a>



            @include('partials.investor.list',[
            'offer' => $post,
            'count' => $count + 30,
            ])


        @endforeach
    </div>
@endif