@extends('layouts.default')

@section('header')

<nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
    <img class="logo" src="{{ asset('images/logo.png') }}">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><i class="fas fa-user"></i>ユーザー登録</a></li>
        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><i class="fas fa-sign-in-alt"></i>ログイン</a></li>
      </ul>
</nav>
@endsection
