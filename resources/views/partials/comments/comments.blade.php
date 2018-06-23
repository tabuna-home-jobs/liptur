<div class="bg-white box-shadow-lg wrapper-md">


    <p class="h3 font-thin m-t-lg m-b"><i class="icon-bubbles m-r"></i> Комментарии</p>
    <hr>

    <div>


        @forelse($comments as $comment)
            <div class="m-b-md">
                <p class="pull-left thumb-sm">
                    <img src="{{$comment->author->avatar}}" class="img-circle">
                </p>
                <div class="m-l-xxl m-b">
                    <div>
                        <strong>{{$comment->author->name}}</strong>
                        <span class="text-muted text-xs block">
                                {{$comment->created_at->diffForHumans()}}
                             </span>
                    </div>
                    <div class="m-t-sm">
                        {!! nl2br(e($comment->content)) !!}
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center" role="alert">Пока нет комментариев</div>
        @endforelse

    </div>

    <div id="comments">

        @if(Auth::check() && $post->created_at->addMonths(2) > \Carbon\Carbon::now())
            <div class="h4 m-t-xxl m-b">Оставить комментарий</div>
            <hr>
            <form action="{{route('comment.add',$id)}}" class="form" method="post">
                <div class="form-group">
                                        <textarea rows="6" name="content" maxlength="500" required
                                                  class="form-control form-control-grey no-resize"
                                                  placeholder="Комментарий"
                                        ></textarea>
                </div>
                {{csrf_field()}}
                {{method_field('put')}}
                <p class="text-right m-t-lg">
                    <button type="submit" class="btn btn-danger btn-rounded">Добавить <i
                                class="fa fa-send-o m-l-xs"></i></button>
                </p>
            </form>
        @elseif($post->created_at->addDays(7) < \Carbon\Carbon::now())


            <div class="text-center m-t-xxl m-b padder-v b-t ">Оставлять комментарии можно только к актуальным
                материалам
            </div>

        @else
            <div class="text-center m-t-xxl m-b padder-v b-t ">Оставлять комментарии могут только <a
                        href="{{url('/login')}}">авторизованные пользователи</a></div>




        @endif
    </div>


</div>
