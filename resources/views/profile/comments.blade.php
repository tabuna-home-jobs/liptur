@extends('layouts.profile')

@section('title','Мои комментарии')

@section('accounts')

    <div class="wrapper-md">


        <table class="table">
            <caption>Мои комментарии</caption>
            <thead>
            <tr>
                <th width="100px">Статус</th>
                <th>Содержание</th>
                <th>Пост</th>
                <th width="100px">Дата</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td class="text-center">
                        @if($comment->isApproved())
                            <i class="icon-check" title="Опубликовано"></i>
                        @else
                            <i class="icon-close" title="На модерации или заблокированно"></i>
                        @endif
                    </td>
                    <th class="font-normal">{{str_limit($comment->content,75)}}</th>
                    <th class="font-normal">{{str_limit($comment->post->getContent('name'),75)}}</th>
                    <th class="font-normal">{{$comment->created_at->diffForHumans()}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row padder-v text-center">
            {{ $comments->links() }}
        </div>


    </div>

@endsection
