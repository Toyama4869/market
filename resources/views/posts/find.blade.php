@extends('layouts.logged_in2')

@section('title', $title)

@section('content')


    @if ($posts->count())
     @foreach($posts as $post)
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
          <form method="post" action="{{route('follows.destroy', $post)}}" class="follow">
            @csrf
            @method('delete')
            <input class="button" type="submit" value="フォロー解除">
          </form>
        @else
          <form method="post" action="{{route('follows.store')}}" class="follow">
            @csrf
            <input type="hidden" name="follow_id" value="{{ $post->id }}">
            <input class="button" type="submit" value="フォロー">
          </form>
        @endif
          <li>{{ $post->price }}円</li>
          <li>[{{ $post->created_at }}]</li>
          <li>{{ $post->description }}</li>
            <div class="post_body_footer">
                  <a class="like_button">{{ $post->isLikedBy(Auth::user()) ? '★' : '☆' }}</a>
                  <form method="post" class="like" action="{{ route('posts.toggle_like', $post) }}">
                    @csrf
                    @method('patch')
                  </form>
            </div>
</div>
    </li>
    @endforeach
    @endif
@endsection
