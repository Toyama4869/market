<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use App\Services\FileUploadService;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostImageRequest;


use Illuminate\Http\Request;

class UserController extends Controller
{
    //プロフィール
    public function profile()
    {
        $posts = \Auth::user()->posts;
        return view('users.show',[
            'title' => 'プロフィール',
            'profile' => $profile,
            'image' => $path,
         ]);
    }

    public function show()
    {
        $user = \Auth::user();
        $follow_users = \Auth::user()->follow_users;
        $followers = \Auth::user()->followers;

        return view('users.show',[
            'title' => 'プロフィール',
            'users' => User::where('id', $user->id)->get(),
            'follow_users' => $follow_users,
            'followers' => $followers,
         ]);
    }

    // プロフィール編集フォーム
    public function edit()
    {
        $user = \Auth::user();
        $users = User::where('id', $user->id)->get();
        return view('users.edit', [
          'title' => 'プロフィール編集',
          'user'  => $user,
        ]);
    }

    public function update(Request $request)
    {

         $user = \Auth::user();
         $user->update($request->only(['name', 'profile', 'email']));
        session()->flash('success', '画像を編集しました');
        return redirect()->route('users.show', $user);
      }

    // 画像編集画面
      public function editImage()
      {
        $user = \Auth::user();
        return view('users.edit_image', [
          'title' => '画像変更画面',
          'user' => $user,
        ]);
      }

      // 画像変更処理
      public function updateImage(PostImageRequest $request){

        $user = \Auth::user();

        //画像投稿処理
        $path = '';
        $image = $request->file('image');
        if( isset($image) === true ){
            $path = $image->store('photos', 'public');
        }
        $user->update([
          'image' => $path,
        ]);
        session()->flash('success', '画像を編集しました');
        return redirect()->route('users.show', $user);
      }

      //出品商品一覧
      public function exhibitions()
    {
        $user = \Auth::user();
        return view('users.exhibitions', [
          'title' => '出品商品一覧',
          'posts' => $user->posts()->latest()->get(),
        ]);
    }

}




