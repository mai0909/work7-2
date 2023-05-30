<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use App\Models\User;  //Userモデルを使用
use App\Models\House;  //Houseモデルを使用
use App\Models\Image;  //Imageモデルを使用
use App\Models\Like;  //Likeモデルを使用

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;



 // use AuthorizesRequests, ValidatesRequests;

class HouseController extends Controller
{

    // 物件一覧表のデータ取得
    public function listOfHouse(House $house , Request $request) {
        $sort = $request->sort;
        $order = $request->order;
        //housesテーブルのhouse_idと一致するimagesテーブルを取得します。
        $houses = DB::table('houses')  // 主となるテーブル名
            ->join('images', 'houses.img_id', '=', 'images.id')  
            ->get();

        // いいね機能
        $like=Like::where('house_id', $house->id)->where('user_id', auth()->user()->id)->first();
        // いいねカウント機能
        $likes_count = DB::table('likes')
            ->join('houses', 'houses.id', '=', 'likes.house_id')
            ->select(DB::raw('count(likes.id) AS likes_count'),'houses.id AS house_id')
            ->groupBy('houses.id')
            ->get();

        return view('list-of-house', ['houses' => $houses,], ['like' => $like,], ['likes_count' => $likes_count,]);
    }



    // 物件の詳細ページを表示
    public function showDetailHouse(Request $request, $id) {
        $id = $request->id;
        $houses = DB::table('houses')  // 主となるテーブル名
        ->join('images', 'houses.img_id', '=', 'images.id')  
        ->where('images.id', '=', $id)
        ->get();
        return view('house-detail', ['houses' => $houses,]);
    }


    // リノベーション見積もりページへ
    public function houseCost() {
        return view('cost');
    }

    // 購入完了ページへ
    public function buyComplete() {
        return view('buy-complete');
    }

    // 物件新規登録ページへ
    public function registerHouse() {
        return view('register-house');
    }

    // 物件一覧から物件削除
    public function deleteHouse(Request $request) {
        $id = $request->id;
        House::where('img_id', $id)->delete();
        return redirect()->route('list-of-house');
    }
    // 物件一覧から物件削除
    public function deleteHouseHome(Request $request) {
        $id = $request->id;
        House::where('img_id', $id)->delete();
        return redirect()->route('home');
    }

    // 登録物件を編集する
    public function updateHouse(Request $request) {
        $id = $request->id;
        $houses = DB::table('houses')  // 主となるテーブル名
        ->join('images', 'houses.img_id', '=', 'images.id')  
        ->where('images.id', '=', $id)
        ->get();
        return view('update-house',['houses' => $houses]);
    }

        // 編集ページ更新、更新用バリデーション
        public function updateComplete(Request $request) {
            // バリデーション
            $request->validate([
                'access' => 'required',
                'floor' => 'required',
                'bulding_area' => 'required|numeric',
                'land_area' => 'numeric',
                'bulding_date' => 'required|numeric',
                'address' => 'required',
                'parking' => 'required',
                'remark' => '',
            ],[
                'access.required' => '交通手段をご記入ください。',
                'floor.required' => '間取りをご記入ください。',
                'bulding_area.required' => '建物面積をご記入ください。',
                'bulding_area.numeric' => '建物面積を数値でご記入ください',
                'land_area.numeric' => '土地面積を数値でご記入ください',
                'bulding_date.required' => '築年数をご記入ください',
                'address.required' => '住所ご記入ください',
                'parking.required' => '駐車場について選択ください',
                ]
            );
            // フォームからの入力値をDBに登録
            $id = $request->id;
            // $contacts = Contact::find($request->id);
            DB::table('houses')  // 主となるテーブル名
                ->join('images', 'houses.img_id', '=', 'images.id')  
                ->where('houses.img_id', '=', $id)
                ->update([
                    'houses.access' => $request->access ,
                    'houses.floor' => $request->floor,
                    'houses.bulding_area' => $request->bulding_area,
                    'houses.land_area' => $request->land_area,
                    'houses.bulding_date' => $request->bulding_date,
                    'houses.address' => $request->address,
                    'houses.parking' => $request->parking,
                    'houses.remark' => $request->remark,
                ]);
            return view('update-complete');
        }
    



    // 物件新規登録確認ページへ移動し入力値を渡す
    public function houseCheck(Request $request) {
                // バリデーション
                $request->validate([
                    'access' => 'required',
                    'floor' => 'required',
                    'bulding_area' => 'required|numeric',
                    'land_area' => 'numeric',
                    'bulding_date' => 'required|numeric',
                    'address' => 'required',
                    'parking' => 'required',
                    'remark' => '',
                ],[
                    'access.required' => '交通手段をご記入ください。',
                    'floor.required' => '間取りをご記入ください。',
                    'bulding_area.required' => '建物面積をご記入ください。',
                    'bulding_area.numeric' => '建物面積を数値でご記入ください',
                    'land_area.numeric' => '土地面積を数値でご記入ください',
                    'bulding_date.required' => '築年数をご記入ください',
                    'address.required' => '住所ご記入ください',
                    'parking.required' => '駐車場について選択ください',
                    ]
                );
                // フォームからの入力値を全て取得
                $inputs = $request->all();
                $topfile = $request->file('top_img');
                $sub1file = $request->file('sub_img1');
                $sub2file = $request->file('sub_img2');
                $sub3file = $request->file('sub_img3');
                $sub4file = $request->file('sub_img4');
                $sub5file = $request->file('sub_img5');
                // storageファイルに保存、パス変数を取得
                $top_path = $topfile->store('public/image');
                $sub1_path = $sub1file->store('public/image');
                $sub2_path = $sub2file->store('public/image');
                $sub3_path = $sub3file->store('public/image');
                $sub4_path = $sub4file->store('public/image');
                $sub5_path = $sub5file->store('public/image');
                // 全体パス
                $read_top_path = str_replace('public/', 'storage/', $top_path); 
                $read_sub1_path = str_replace('public/', 'storage/', $sub1_path); 
                $read_sub2_path = str_replace('public/', 'storage/', $sub2_path); 
                $read_sub3_path = str_replace('public/', 'storage/', $sub3_path); 
                $read_sub4_path = str_replace('public/', 'storage/', $sub4_path); 
                $read_sub5_path = str_replace('public/', 'storage/', $sub5_path); 
                // 変数として確認画面へ渡す
                $data = array(
                    'top_path' => $top_path,
                    'sub1_path' => $sub1_path,
                    'sub2_path' => $sub2_path,
                    'sub3_path' => $sub3_path,
                    'sub4_path' => $sub4_path,
                    'sub5_path' => $sub5_path,

                    'read_top_path' => $read_top_path, 
                    'read_sub1_path' => $read_sub1_path, 
                    'read_sub2_path' => $read_sub2_path, 
                    'read_sub3_path' => $read_sub3_path, 
                    'read_sub4_path' => $read_sub4_path, 
                    'read_sub5_path' => $read_sub5_path, 
                );
                $request->session()->put('data', $data);
        // 確認ページに表示、入力値を引数に渡す
        return view('house-check', ['inputs' => $inputs,], ['data' => $data,]);
    }



    //データベースに登録を行い登録完了ページへ
    public function houseComplete(Request $request) {
                //フォームから受け取ったactionの値を取得
                $action = $request->input('action');
                //フォームから受け取ったactionを除いたinputの値を取得
                $input = $request->except('action');
                //actionの値で分岐
                $inputs = [
                    'access' => $request->access,
                    'floor' => $request->floor,
                    'bulding_area' => $request->bulding_area,
                    'land_area' => $request->land_area,
                    'bulding_date' => $request->bulding_date,
                    'address' => $request->address,
                    'parking' => $request->parking,
                    'remark' => $request->remark
                ];
                if($action !== 'send'){
                    // 戻るボタンで入力画面にデータを渡して戻る
                    return redirect('/register-house')
                        // ->route('register-house')
                        ->withInput($inputs);
                } else {
                    //データベースへ登録
                    $user_id = Auth::id();
                    
                    $data = $request->session()->get('data');
                    $top_path = $data['top_path'];
                    $sub1_path = $data['sub1_path'];
                    $sub2_path = $data['sub2_path'];
                    $sub3_path = $data['sub3_path'];
                    $sub4_path = $data['sub4_path'];
                    $sub5_path = $data['sub5_path'];

                    $read_top_path = $data['read_top_path'];
                    $read_sub1_path = $data['read_sub1_path'];
                    $read_sub2_path = $data['read_sub2_path'];
                    $read_sub3_path = $data['read_sub3_path'];
                    $read_sub4_path = $data['read_sub4_path'];
                    $read_sub5_path = $data['read_sub5_path'];

                    //ファイル名は$temp_pathから"public/temp/"を除いたもの
                    $topname = str_replace('public/image/', '', $top_path);
                    $sub1name = str_replace('public/image/', '', $sub1_path);
                    $sub2name = str_replace('public/image/', '', $sub2_path);
                    $sub3name = str_replace('public/image/', '', $sub3_path);
                    $sub4name = str_replace('public/image/', '', $sub4_path);
                    $sub5name = str_replace('public/image/', '', $sub5_path);

                    $image = Image::create([
                        // 'house_id' => $house->id,
                        'top_img' => $topname,
                        'sub_img1' => $sub1name,
                        'sub_img2' => $sub2name,
                        'sub_img3' => $sub3name,
                        'sub_img4' => $sub4name,
                        'sub_img5' => $sub5name,
                    ]);

                    $house = House::create([
                        'access' => $inputs['access'],
                        'floor' => $inputs['floor'],
                        'bulding_area' => $inputs['bulding_area'],
                        'land_area' => $inputs['land_area'],
                        'bulding_date' => $inputs['bulding_date'],
                        'address' => $inputs['address'],
                        'parking' => $inputs['parking'],
                        'remark' => $inputs['remark'],
                        'user_id' => $user_id,
                        'img_id' => $image->id
                    ]);
                }
        return view('house-complete');
    }




    

}









    // public function ajaxlike(Request $request) {
    //     $id = Auth::user()->id;
    //     $house_id = $request->house_id;
    //     $like = new Like;
    //     $post = House::findOrFail($house_id);

    //     // 空でない（既にいいねしている）なら
    //     if ($like->like_exist($id, $house_id)) {
    //         //likesテーブルのレコードを削除
    //         $like = Like::where('house_id', $house_id)->where('user_id', $id)->delete();
    //     } else {
    //         //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
    //         $like = new Like;
    //         $like->house_id = $request->house_id;
    //         $like->user_id = Auth::user()->id;
    //         $like->save();
    //     }
        
    //     //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
    //     $postLikesCount = $post->loadCount('goods')->likes_count;

    //     //一つの変数にajaxに渡す値をまとめる
    //     //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
    //     $json = [
    //         'postLikesCount' => $postLikesCount,
    //     ];
    //     //下記の記述でajaxに引数の値を返す
    //     return response()->json($json);
    // }


            // $posts = House::withCount('likes')->get();
        // $post = $posts->pluck('id','likes_count');
        // dd($like_count);