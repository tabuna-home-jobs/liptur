@extends('layouts.profile')

@section('title','Мои комментарии')

@section('accounts')

    <div class="wrapper-md">


        <table class="table">
            <caption>Записи которые понравились мне</caption>
            <thead>
            <tr>
                <th width="50%">Пост</th>
                <th>Количество лайков</th>
                <th width="200px">Дата</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>

                    <th class="font-normal">{{str_limit($post->getContent('name'),75)}}</th>
                    <th class="font-normal">{{$post->likeCount}}</th>
                    <th class="font-normal">{{$post->created_at->diffForHumans()}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row padder-v text-center">
            {{ $posts->links() }}
        </div>


    </div>

@endsection
