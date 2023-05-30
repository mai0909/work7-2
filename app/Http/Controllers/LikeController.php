<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\User;  //Userモデルを使用
use App\Models\House;  //Houseモデルを使用
use App\Models\Image;  //Imageモデルを使用
use App\Models\Like;  //Likeモデルを使用

use Illuminate\Support\Facades\Auth;

class HouseController extends Controller
{

    // いいねをつける
    public function like(House $house, Request $request){
        $like=New Like();
        $like->house_id = $house->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return back();
    }

    // いいねを取り消す
    public function unlike(House $house, Request $request){
        $user=Auth::user()->id;
        $like=Like::where('house_id', $house->id)->where('user_id', $user)->first();
        $like->delete();
        return back();
    }

}