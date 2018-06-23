@if(Auth::check())
    <div id="like" data-object="posts" data-count="{{$post->likeCount}}" data-status="{{ (int) $post->liked()}}"
         data-id="{{$post->id}}">
        <a v-on:click="like()" class="" v-bind:class="{ 'text-danger': status }">
            <i class="icon-heart m-r-xs"></i> <span class="m-r-xs">Нравится</span> <span
                    class="badge bg-danger">@{{ count || '' }}</span>
        </a>
    </div>

@else

    <span class="" data-container="body" data-toggle="popover" data-placement="top"
          data-content="Необходимо авторизоваться">
        <i class="icon-heart m-r-xs"></i> <span class="m-r-xs">Нравится</span>
        <span class="badge bg-danger">{{ ($post->likeCount) ? $post->likeCount : '' }}</span>
    </span>

@endif