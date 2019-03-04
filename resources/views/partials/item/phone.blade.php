<div class="panel wrapper-xl b box-shadow-lg padder-lg text-center news-email">
    <p class="h3 font-thin  m-b-lg">
        {{__('Contact number')}}
    </p>
    <p class="font-thin">
        <i class="icon-phone text-brand-green icon-title"></i>
        <a href="tel://{{$phone}}"
           class="phone h3 block m-t-md">{{$phone}}</a>
    </p>
    <p class="m-t padder text-xs">{{$address ?? ''}}</p>
</div>
