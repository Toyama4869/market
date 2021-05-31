@extends('layouts.logged_in')

@section('content')
<div class="form">
    <h2>{{ $title }}</h2>
    <h3>現在の画像</h3>
    @if($post->image !== '')
        <img src="{{ \Storage::url($post->image) }}">
    @else
        画像はありません。
    @endif
    <form
        method="POST"
        action="{{ route('posts.update_image', $post) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('patch')
        <div>
            <label>
                画像を選択:
                <input type="file" name="image">
            </label>
        </div>
        <input class="button" type="submit" value="更新">
    </form>
</div>
@endsection
