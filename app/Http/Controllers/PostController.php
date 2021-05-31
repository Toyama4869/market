<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Order;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostImageRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    // 商品一覧
    public function index()
    {
            $user = \Auth::user();
            $posts = Post::recommend($user->id)->latest()->simplePaginate(12);
            $follow_users = \Auth::user()->follow_users;
            $followers = \Auth::user()->followers;
            return view('posts.index', [
            'title' => '新着商品一覧',
            'posts' => $posts,
            'follow_users' => $follow_users,
            'followers' => $followers,
          ]);
    }

    //検索機能
    public function find(Request $request)
    {
        return view('posts.find', [
        'input' => '',
        ]);
    }


    public function search(Request $request)
    {
        $keyword = $request->input;

        $query = Post::query();
        $posts =  $query->where('name', 'like', '%' . $keyword . '%')->get();
        $param = ['input' => $keyword, 'posts' => $posts];
        return view('posts.find', $param, [
            'title' => '検索結果',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 新規出品画面
    public function create()
    {
        return view('posts.create', [
          'title' => '商品を出品',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // 商品追加処理
    public function store(PostRequest $request){
        //画像投稿処理
        $path = '';
        $image = $request->file('image');
        if( isset($image) === true ){
            $path = $image->store('photos', 'public');
        }
        Post::create([
          'user_id' => \Auth::user()->id,
          'name' => $request->name,
          'description' => $request->description,
          'price' => $request->price,
          'image' => $path, // ファイルパスを保存
          'category' => $request->category
        ]);
        session()->flash('success', '商品を追加しました');
        return redirect()->route('posts.index');
      }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // 商品詳細
    public function show($id)
    {
        $user = \Auth::user();
        $post = Post::findOrFail($id);

        return view('posts.show',  [
          'title' => '商品詳細',
          'post' => $post,
          'user' => $user
        ]);
    }

    //購入確認
    public function confirm($id)
    {
         $post = Post::find($id);
         $user = \Auth::user();

        return view('posts.confirm', [
          'title' => '購入確認',
          'post' => $post,
          'user' => $user
        ]);
    }
    //購入確定
    public function finish($id)

    {
        $user = \Auth::user();
        $post = Post::find($id);

        if ($post->isOrderedBy($post)) {
            $title = 'この商品は購入できませんでした。';
            $error = '既に購入されています。';
        } else {
            $title = 'ご購入ありがとうございました。';
            $error = '';

            Order::create([
                'user_id' => \Auth::user()->id,
                'post_id' => $post->id,
            ]);
        }

        return view('posts.finish', [
          'title' => $title,
          'error' => $error,
          'user' => $user,
          'post'  => $post,
        ]);
    }

    //注文処理
    public function toggleOrder($id){
          $user = \Auth::user();
          $post = Post::find($id);
              Order::create([
                  'user_id' => $user->id,
                  'post_id' => $post->id,
              ]);

          return redirect('posts.show');
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 商品情報の編集画面
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', [
          'title' => '商品情報の編集',
          'post'  => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 商品更新処理
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->only(['name', 'price', 'description', 'category']));
        session()->flash('success', '商品を編集しました');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 商品削除処理
    public function destroy($id)
    {
        $post = Post::find($id);

        // 画像の削除
        if($post->image !== ''){
          \Storage::disk('public')->delete(\Storage::url($post->image));
        }

        $post->delete();
        \Session::flash('success', '商品を削除しました');
        return redirect()->route('posts.index');
    }

    // 画像編集画面
      public function editImage($id)
      {
        $post = Post::find($id);
        return view('posts.edit_image', [
          'title' => '画像変更画面',
          'post' => $post,
        ]);
      }

      public function updateImage($id, PostImageRequest $request){

    //画像投稿処理
        $path = '';
        $image = $request->file('image');

        if( isset($image) === true ){
            $path = $image->store('photos', 'public');
        }

        $post = Post::find($id);

        // 変更前の画像の削除
        if($post->image !== ''){
          \Storage::disk('public')->delete(\Storage::url($post->image));
        }

        $post->update([
          'image' => $path, // ファイル名を保存
        ]);

        session()->flash('success', '画像を変更しました');
        return redirect()->route('posts.index');
      }

      public function toggleLike($id){
          $user = \Auth::user();
          $post = Post::find($id);

          if($post->isLikedBy($user)){
              // いいねの取り消し
              $post->likes->where('user_id', $user->id)->first()->delete();
              \Session::flash('success', 'いいねを取り消しました');
          } else {
              // いいねを設定
              Like::create([
                  'user_id' => $user->id,
                  'post_id' => $post->id,
              ]);
              \Session::flash('success', 'いいねしました');
          }
          return redirect('/posts');
      }


}



