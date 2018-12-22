@if(count($offer->childrenTerm) > 0)
        @foreach($offer->childrenTerm as $post)
            <li>
                <a class="dropdown-item text-wrap"

                   href="#{{$post->slug}}"
                   role="tab"
                   data-toggle="tab"
                   aria-controls="{{$post->slug}}"
                   id="{{$post->slug}}-tab"
                   count="{{$count}}"

                >
                    {{$post->term->getContent('name')}}
                </a>
            </li>

            @include('partials.investor.list-mb',[
            'offer' => $post,
            'count' => $count + 30,
            ])
        @endforeach

@endif
