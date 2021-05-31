@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<div class="form">
  <h2>{{ $title }}</h2>
  <h3>{{ $post->name }}</h3>
  <ul>
        <li class="show_font">出品者名</li>
        <li>{{ $post->user->name }}</li>
        <li class="show_font">画像</li>
        <img src="{{ asset('storage/' . $post->image) }}">
        <li class="show_font">カテゴリ</li>
        <li>{{ $post->category }}</li>
        <li class="show_font">価格</li>
        <li>{{ $post->price }}</li>
        <li class="show_font">説明</li>
        <li>{{ $post->description}}</li>
   </ul>
            <a href="{{ route('posts.index')}}"><button class="button" type="button">トップに戻る</button></a>
    </div>
@endsection
