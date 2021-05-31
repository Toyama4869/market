@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<div class="form">
  <h2>{{ $title }}</h2>
  <form method="POST" action="{{ route('users.update', $user) }}">
      @csrf
      @method('patch')
      <div>
          <label>
            名前:
            <input type="text" name="name" value="{{ $user->name }}">
          </label>
          </div>
          <div>
          <label>
            メールアドレス:
            <input type="text" name="email" value="{{ $user->email }}">
          </label>
          </div>
          <div>
          <label>
            プロフィール:
            <textarea class="profile" name="profile" type="text" value="{{ $user->profile }}"></textarea>          </label>
      </div>

      <input class="button" type="submit" value="更新">
  </form>
  </div>
@endsection
