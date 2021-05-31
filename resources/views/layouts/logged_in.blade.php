@extends('layouts.default')

@section('header')
<header>
<div class="header_top">
<img class="logo" src="{{ asset('images/logo.jpg') }}">
<form class="search" method="post" action="{{ route('posts.find') }}">
    @csrf
    <input type="text" name="input" value="">
    <input class="button" type="submit" value="商品検索">
    </form>
    <ul class="header_nav">

        <li class="greeting">こんにちは、{{ \Auth::user()->name }}さん！</li>
        <li>
          <a href="{{ route('top', auth()->user()->id)}}">
          ホーム
          </a>
        </li>
         <li>
        <a href="{{route('posts.create', auth()->user()->id)}}">
            新規出品</a>
        </li>
        <li>
          <a href="{{ route('users.show', auth()->user()->id)}}">
          プロフィール
          </a>
        </li>
        <li>
          <a href="{{ route('likes.index', auth()->user()->id) }}">
            お気に入り一覧
          </a>
        </li>
        <li>
          <a href="{{ route('users.exhibitions', auth()->user()->id) }}">
            出品商品一覧
          </a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input class="logout" type="submit" value="ログアウト">
            </form>
        </li>
    </ul>
    </div>
</header>
@endsection
