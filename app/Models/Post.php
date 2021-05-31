<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'price', 'image', 'category'];

    public function user(){
      return $this->belongsTo('App\Models\User');
    }

    public function comments(){
      return $this->hasMany('App\Models\Comment');
    }

    public function scopeRecommend($query){
        return $query->inRandomOrder()->limit(10);
    }

    public function likes(){
      return $this->hasMany('App\Models\Like');
    }

    public function likedUsers(){
      return $this->belongsToMany('App\Models\User', 'likes');
    }

    public function isLikedBy($user){
      $liked_users_ids = $this->likedUsers->pluck('id');
      $result = $liked_users_ids->contains($user->id);
      return $result;
    }

    //売り切れ確認

    public function orders(){
      return $this->hasMany('App\Models\Order');
    }

    public function orderedUsers(){
      return $this->belongsToMany('App\Models\User', 'orders');
    }

    public function isOrderedBy($posts){
      $ordered_post_ids = $this->orders->pluck('post_id');
      $result = $ordered_post_ids->contains($posts->id);
      return $result;
    }



    // public function getData()
    // {
    //     return $this->id . $this->name . $this->description;
    // }

}


