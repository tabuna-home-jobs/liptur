<main class="tab-content">
@foreach($offers as $offer)
    <div class="tab-pane fade @if ($loop->first)  active in @endif"
         role="tabpanel"
         id="{{str_slug($offer->slug)}}"
         aria-labelledby="{{str_slug($offer->slug)}}-tab">
        @include('partials.investor.tab', [
           'offer' => $offer,
           'count' => -30
       ])
    </div>
@endforeach
</main>