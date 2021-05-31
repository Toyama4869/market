@extends('layouts.not_logged_in')

@section('content')
<div class="form">
  <h1>ログイン</h1>

  <form method="POST" action="{{ route('login') }}">
      @csrf
      <div>
          <label>
            メールアドレス:<br>
            <input type="email" name="email">
          </label>
      </div>

      <div>
          <label>
            パスワード:<br>
            <input type="password" name="password" >
          </label>
      </div>

      <input class="button" type="submit" value="ログイン">
  </form>
  </div>
@endsection
