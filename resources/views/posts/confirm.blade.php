@extends('layouts.logged_in')

@section('title', $title)

@section('content')
   <div class="form">
       <h2>{{ $title }}</h2>
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
            <a href="{{ route('posts.finish', $post->id)}}"><button class="confirm_button" type="button">内容を確認し、購入する</button></a>

@endsection

