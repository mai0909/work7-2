<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  //Userモデルを使用
use App\Models\House;  //Houseモデルを使用
use App\Models\Image;  //Imageモデルを使用
use App\Models\Like;  //Likeモデルを使用
use App\Models\Cost;  //Costモデルを使用

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        // 売り手のページ
        $user_id = Auth::id();
        $houses = DB::table('houses')  // 主となるテーブル名
        ->join('images', 'houses.img_id', '=', 'images.id')  
        ->where('houses.user_id', '=', $user_id)
        ->get();

        // 購入者一覧
        $costs = DB::table('costs')  // 主となるテーブル名
        ->join('users', 'users.id', '=', 'costs.user_id')  
        ->join('houses', 'houses.id', '=', 'costs.house_id')  
        ->get();

        return view('home',['houses' => $houses,],['costs' => $costs,]);
    }


}
