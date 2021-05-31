@extends('layouts.logged_in')

@section('title', $title)

@section('content')
<div class="form">
  <h1>{{ $title }}</h1>
  <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
      @csrf
        <div>
          <label>
            商品名:
            <input type="text" name="name">
          </label>
        </div>
        <div>
          <label>
            商品説明:
            <textarea class="description" name="description" type="text"></textarea>
          </label>
        </div>
         <div>
          <label>
            価格:
            <input type="text" name="price">
          </label>
        </div>
        <div>
            <label>
            コメント:
            <textarea class="comment" type="text" name="comment"></textarea>
          </label>
      </div>
      <div>
          <label>
              カテゴリー：
              <select name="category">
                <option value="カテゴリの選択">カテゴリの選択</option>
                <option value="服">服</option>
                <option value="鞄">鞄</option>
                <option value="靴">靴</option>
                <option value="帽子">帽子</option>
                <option value="アクセサリー">アクセサリー</option>
                <option value="その他アパレル関連">その他アパレル関連</option>
                <option value="電化製品">電化製品</option>
                <option value="食器">食器</option>
                <option value="雑貨">雑貨</option>
                <option value="その他">その他</option>
                </select>
          </label>
      </div>
      <div>
          <label>
            画像:
            <input type="file" name="image">
          </label>
      </div>


      <input class="button" type="submit" value="出品">
  </form>
  </div>
@endsection
