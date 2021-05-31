@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<div class="body">


      @forelse($posts as $post)
      <div class="index">
                  <div class="post_body_main_img">
                    @if($post->image !== '')
                        <a href="{{ route('posts.show', $post->id)}}">
                            <img src="{{ asset('storage/' . $post->image)}}"></a>
                    @else
                        <a href="{{ route('posts.show', $post->id)}}">
                            <img src="{{ asset('images/no_image.png') }}"></a>
                    @endif
                    </div>
       <ul class="posts">
      <li class="post">
            <h5>{{ $post->name }}</h5>
            <li>出品者:{{ $post->user->name }}</li>
        @if(Auth::user()->isFollowing($post->user))
          <form method="post" action="{{route('follows.destroy', $post->user)}}" class="follow">
            @csrf
            @method('delete')
            <input class="button" type="submit" value="フォロー解除">
          </form>
        @else
          <form method="post" action="{{route('follows.store')}}" class="follow">
            @csrf
            <input type="hidden" name="follow_id" value="{{ $post->user->id }}">
            <input class="button" type="submit" value="フォロー">
          </form>
        @endif
          <li>{{ $post->price }}円</li>
          <li>[{{ $post->created_at }}]</li>
          <li>{{ $post->description }}</li>
                  <a class="like_button">{{ $post->isLikedBy(Auth::user()) ? '♥' . 'いいね！' : '♡' .  'いいね！' }}</a>
                  <form method="post" class="like" action="{{ route('posts.toggle_like', $post) }}">
                    @csrf
                    @method('patch')
                  </form>
</div>
    </li>
      @empty
          <li>書き込みはありません。</li>
      @endforelse


    {{ $posts->links() }}
<script>
  /* global $ */
  $('.like_button').each(function(){
    $(this).on('click', function(){
      $(this).next().submit();
    });
  });
</script>
</div>
@endsection
