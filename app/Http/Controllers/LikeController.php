<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //お気に入り一覧画面
    public function index()
    {
        $like_posts = \Auth::user()->likePosts;
        return view('likes.index', [
          'title' => 'お気に入り一覧',
          'like_posts' => $like_posts,
        ]);
    }

    // お気に入り追加処理
    public function store(Request $request)
    {
        //
    }

    // お気に入り削除処理
    public function destroy($id)
    {
        //
    }
}
