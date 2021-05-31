@extends('layouts.logged_in')

@section('title', $title)


@section('content')
<div class="form">

  <h2>{{ $title }}</h2>
      <ul>
      @forelse($posts as $post)
          <li>出品者:{{ $post->user->name }}</li>
          <li>{{ $post->name }} {{ $post->price }}円</li>
          <li>[{{ $post->created_at }}]</li>
          <li>{{ $post->description }}</li>
          <div class="post_body_second">
                    @if($post->image !== '')
                        <img src="{{ asset('storage/' . $post->image) }}">
                    @else
                        <img src="{{ asset('images/no_image.png') }}">
                    @endif
                    <a href="{{ route('posts.edit_image', $post) }}">画像を変更</a>
                  </div>
          <li>[<a href="{{ route('posts.edit', $post) }}">編集</a>]
          <form method="post" class="delete" action="{{ route('posts.destroy', $post) }}">
              @csrf
              @method('delete')
              <input class="button" type="submit" value="削除"></li>
            </form>
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
              <input class="button" type="submit" value="送信">
            </form>
                <div class="post_body_main_comment">
                    {{ $post->comment }}
                </div>
            </div>
            </li>
      @empty
          <li>書き込みはありません。</li>
      @endforelse
</ul>
</div>
@endsection
