<div class="tab-pane fade @if($active) active in @endif "
     role="tabpanel"
     id="{{$offer->slug}}"
     aria-labelledby="{{$offer->slug}}-tab">
    {{--
    <div class="page-header m-t-xs">
        <p class="h3">{{$offer->term->getContent('name')}}</p>
    </div>
    --}}
    <div>
        {!! $offer->term->getContent('body')!!}
    </div>
</div>


@if(count($offer->childrenTerm) > 0)
    @foreach($offer->childrenTerm as $post)
        @include('partials.investor.post',[
            'offer' => $post,
            'active' => false,
        ])
    @endforeach
@endif