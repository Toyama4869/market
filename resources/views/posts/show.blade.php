@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<div class="form">
    <ul>
        <h3><li>{{ $post->name }}</li></h3>
        <li class="show_font">出品者名：{{ $post->user->name }}</li>
        <img class="show_item" src="{{ asset('storage/' . $post->image) }}">
        <li class="show_font">カテゴリ：{{ $post->category }}</li>
        <li class="show_font">価格：{{ $post->price }}円</>
        <li class="show_font">商品説明</li>
        <li>{{ $post->description}}</li>
   </ul>

   <div class="post_comments">
                <span class="post_comments_header">コメント</span>
                <ul class="post_comments_body">
              @forelse($post->comments as $comment)
                <li>{{ $comment->user->name }}: {{ $comment->body }}</li>
              @empty
                <li>コメントはありません。</li>
              @endforelse
            </ul>
            <form method="post" action="{{ route('comments.store') }}">
              @csrf
              <input type="hidden" name="post_id" value="{{ $post->id }}">
              <label>
                コメントを追加:
                <input type="text" name="body">
              </label>
              <input class='button' type="submit" value="送信">
            </form>
                <div class="post_body_main_comment">
                    {{ $post->comment }}
                </div>
            </div>
            @if ($post->isOrderedBy($post))
                  [<span class="error">売り切れ</span>]
                    @else
                    <form class="confirm" action="{{ route('posts.confirm', $post) }}">
                        <form class="confirm" action="{{ route('posts.toggle_order', $post) }}">
                        <a href="{{ route('posts.confirm', $post->id)}}"><button class="button" type="button">購入する</button></a>
                        </form>
                    @endif
                    </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
            $('.confirm_button').each(function(){
                $(this).on('click', function(){
                $(this).next().submit();
                });
            });
            </script>


@endsection





