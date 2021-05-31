@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<div class="form">
  <h2>{{ $title }}</h2>
<ul>
    @forelse ($users as $user)
    <div class="post_body_second">
    @if($user->image !== '')
                        <img src="{{ asset('storage/'.$user->image) }}" alt="プロフィール画像">
                    @else
                        <img src="{{ asset('images/no_image.png') }}">
                    @endif
                </div>
        <li>{{ $user->name }}さん</li>
        <li>{{ $user->profile }}</li>

        <li><a href="{{route('users.edit')}}">プロフィール編集</a></li>
        <li><a href="{{route('users.edit_image')}}">画像を変更</a></li>
    @empty
    <li>プロフィールが設定されていません。</li>
    @endforelse
</ul>

<h3>フォロー一覧</h3>

  <ul class="follow_users">
      @forelse($follow_users as $follow_user)
          <li class="follow_user">
              <div class="post_body_second">
            @if($follow_user->image !== '')
                <img src="{{ asset('storage/user_photos/' . $follow_user->image) }}">
            @else
                <img src="{{ asset('images/no_image.png') }}">
            @endif
              </div>
            <br>
            {{ $follow_user->name }}
            <form method="post" action="{{route('follows.destroy', $follow_user)}}" class="follow">
            @csrf
            @method('delete')
            <input class="button" type="submit" value="フォロー解除">
          </form>
          </li>
      @empty
          <li>フォローしているユーザーはいません。</li>
      @endforelse
  </ul>


<h3>フォロワー一覧</h3>

  <ul class="followers">
      @forelse($followers as $follower)
          <li class="follower">
            @if($follower->image !== '')
                <img src="{{ asset('storage/user_photos/' . $follower->image) }}">
            @else
                <img src="{{ asset('images/no_image.png') }}">
            @endif
            {{ $follower->name }}
            @if(Auth::user()->isFollowing($follower))
              <form method="post" action="{{route('follows.destroy', $follower)}}" class="follow">
                @csrf
                @method('delete')
                <input class="button" type="submit" value="フォロー解除">
              </form>
            @else
              <form method="post" action="{{route('follows.store')}}" class="follow">
                @csrf
                <input type="hidden" name="follow_id" value="{{ $follower->id }}">
                <input class="button" type="submit" value="フォロー">
              </form>
            @endif
          </li>
      @empty
          <li>フォローされているユーザーはいません。</li>
      @endforelse
  </ul>
  </div>
@endsection




