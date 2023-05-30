<?php

namespace App\Models;

use App\Models\Like;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\User;   //Userモデルを使用

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class House extends Model
{
    protected $fillable = 
    [
        'id',
        'access',
        'floor',
        'bulding_area',
        'land_area',
        'bulding_date',
        'address',
        'parking',
        'remark',
        'user_id',
        'img_id',
        'display'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('house_id', $this->id)->first() !==null;
    }

}