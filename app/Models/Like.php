<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = 
    [
        'id',
        'user_id',
        'house_id',
        'created_at'
    ];

    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function houses()
    {   //housesテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(House::class);
    }
}