@extends('layouts.default')

@section('header')
<header>
<nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
    <img class="logo" src="{{ asset('images/logo.png') }}">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav">
        {{-- <li class="nav-item"><li class="greeting">こんにちは、{{ \Auth::user()->name }}さん！</li></li> --}}
        <li class="nav-item"><a href="{{ route('top', auth()->user()->id)}}" class="nav-link"><i class="fas fa-home"></i>ホーム</a></li>
        <li class="nav-item"><a href="{{route('posts.create', auth()->user()->id)}}" class="nav-link"><i class="fas fa-plus-square"></i>新規出品</a></li>
        <li class="nav-item"><a href="{{ route('users.show', auth()->user()->id)}}" class="nav-link"><i class="fas fa-user-circle"></i>プロフィール</a></li>
        <li class="nav-item"><a href="{{ route('likes.index', auth()->user()->id) }}" class="nav-link"><i class="fas fa-bookmark"></i>お気に入り一覧</a></li>
        <li class="nav-item"><a href="{{ route('users.exhibitions', auth()->user()->id) }}" class="nav-link"><i class="fas fa-list-alt"></i>出品商品一覧</a></li>
        <li class="nav-item"><form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="logout" type="submit" value="ログアウト">
                    </form></li>
      </ul>
    <form class="search" method="post" action="{{ route('posts.find') }}">
    @csrf
    <input type="text" name="input" value="">
    <input class="button" type="submit" value="商品検索">
    </form>
</nav>
</header>
@endsection
