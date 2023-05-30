<?php

use Illuminate\Support\Facades\Route;
//ログイン機能追加のため
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// 新規登録完了画面に遷移する
Route::get('/register-complete', [App\Http\Controllers\Auth\RegisterController::class, 'RegisterRedirectPath'])->name('register-complete');

// 物件一覧に移動する
Route::get('/list-of-house', [App\Http\Controllers\HouseController::class, 'listOfHouse'])->name('list-of-house');



//idを渡してhouse-detailページへ
Route::get('/house-detail/{id}', [App\Http\Controllers\HouseController::class, 'showDetailHouse'])->name('house-detail');
//idを渡してhouseページを削除して物件一覧ページ
Route::get('/house-delete-list/{id}', [App\Http\Controllers\HouseController::class, 'deleteHouse'])->name('house-delete');
//idを渡してhouseページを削除してホームページ
Route::get('/house-delete/{id}', [App\Http\Controllers\HouseController::class, 'deleteHouseHome'])->name('house-delete-home');


// いいね機能のルート
Route::get('/list-of-house/like/{post}', [App\Http\Controllers\LikeController::class, 'like'])->name('like');
Route::get('/list-of-house/unlike/{post}', [App\Http\Controllers\LikeController::class, 'unlike'])->name('unlike');

// リノベーション費用見積もりページへ
Route::get('/cost', [App\Http\Controllers\HouseController::class, 'houseCost'])->name('cost');
// リノベーション費用見積もり完了ページへ
Route::get('/buy-complete', [App\Http\Controllers\HouseController::class, 'buyComplete'])->name('buy-complete');

// 物件新規登録へ
Route::get('/register-house', [App\Http\Controllers\HouseController::class, 'registerHouse'])->name('register-house');
// 物件新規登録確認へ
Route::post('/house-check', [App\Http\Controllers\HouseController::class, 'houseCheck'])->name('house-check');
// 物件新規登録完了へ
Route::post('/house-complete', [App\Http\Controllers\HouseController::class, 'houseComplete'])->name('house-complete');


//idを渡して編集ページへ
Route::get('/update-house/{id}', [App\Http\Controllers\HouseController::class, 'updateHouse'])->name('update-house');
//編集完了画面へ
Route::post('/update-complete', [App\Http\Controllers\HouseController::class, 'updateComplete'])->name('update-complete');





//ログイン中のユーザーのみアクセス可能
// Route::group(['middleware' => ['auth']], function () {
//     //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
//     Route::post('/list-of-house',[App\Http\Controllers\HouseController::class, 'ajaxlike'] )->name('list-of-house');
// });