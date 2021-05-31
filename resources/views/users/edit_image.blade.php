@extends('layouts.logged_in')

@section('content')
<div class="form">
    <h2>{{ $title }}</h2>
    <h3>現在の画像</h3>
    @if($user->image !== '')
        <img src="{{ asset('storage/'.$user->image) }}" alt="プロフィール画像">
    @else
        画像はありません。
    @endif
    <form
        method="POST"
        action="{{ route('users.update_image', $user) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('patch')
        <div>
            <label>
                画像を選択:
                <input class="button" type="file" name="image">
            </label>
        </div>
        <input class="button" type="submit" value="更新">
    </form>
</div>
@endsection
