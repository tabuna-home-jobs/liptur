@if(count($offer->childrenTerm) > 0)
    <div class="list-group" role="tablist">

        @foreach($offer->childrenTerm as $post)
            <a class="list-group-item list-group-item-action"

               href="#{{$post->slug}}"
               role="tab"
               data-toggle="tab"
               aria-controls="{{$post->slug}}"
               id="{{$post->slug}}-tab"

            >
                {{$post->term->getContent('name')}}
            </a>



            @include('partials.investor.list',[
            'offer' => $post,
            'count' => $count + 30,
            ])


        @endforeach
    </div>
@endif
