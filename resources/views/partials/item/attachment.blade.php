@php
    function getSize($bytes)
    {
        $sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
        if ($bytes == 0) {
            return '0 B';
        }
        $i = ((int) floor(log($bytes / 100) / log(1000)) >= 0) ?: 0;

        return round(100 * (($bytes / 100) / (1024 ** $i)), 0).' '.$sizes[$i];
    }
@endphp
<div class="panel b box-shadow-lg wrapper-lg news-email">
    <p class="h3 font-thin  m-b-lg">
        {!! $title ?? 'Докуметы для загрузки'!!}
    </p>
    <div class="list-group list-group-lg list-group-sp list-no-border b-t">
        @foreach($attachments as $attachment)
            <a href="{{$attachment->url()}}"
               class="list-group-item h4"
               title="{{$attachment->alt}}">
                <i class="fa fa-download"></i>
                {{$attachment->original_name}}
                <span class="text-xs text-grey">
                    (.{{$attachment->extension}} {{getSize($attachment->size)}})
                </span>
            </a>
        @endforeach
    </div>
</div>