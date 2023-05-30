<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>0円空家からリノベーション</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css')  }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@extends('layouts.app')
@section('content')
<div class="home-top">
    <div>
        <a class="home-a" href="{{ route('list-of-house') }}">空家物件一覧を見る</a>
    </div>
    <div>
        <h2>My Page</h2>
    </div>
</div>

@if(Auth::user()->manage == 3)
<div class="buy-content home-content">
    <p class="cost-p">■空家物件購入者一覧</p>
    <table  class="buy-table">
        <tr class="table-title">
            <th>購入者名</th>
            <th>購入物件ID</th>
            <th>リノベーション費用</th>
            <th>購入者詳細</th>
            <th>購入者削除</th>
        </tr>
        @foreach ($costs as $cost)
        <tr class="table-item">
            <th>{{ $cost->name }}</th>
            <th>{{ $cost->house_id }}</th>
            <th>{{ $cost->cost }}万</th>
            <th><a href="">確認</a></th>
            <th><a href="">削除</a></th>
        </tr>
        @endforeach
    </table>
    
</div>
@endif


@if(Auth::user()->manage == 1)
<div class="home-content">
    <div>
        <p>■あなたが登録中の空家物件</p>
        {{-- 空家物件を登録していなければ表示 --}}
        @if(!isset($house))
        <p>登録中の空家物件はありません。</p>
        @endif

        {{-- 空家物件を登録しているのがあれば表示される --}}
        @if(isset($houses))
        @foreach ($houses as $house)
        <div class="page-register">
            <div class="detail-img">
                <div class="top-img">
                    <img src="{{ asset('storage/image/'.$house->top_img) }}">
                </div>
                <div class="sub-img">
                    <div class="sub-img1">
                        <img src="{{ asset('storage/image/'.$house->sub_img1) }}">
                        <img src="{{ asset('storage/image/'.$house->sub_img2) }}">
                        <img src="{{ asset('storage/image/'.$house->sub_img3) }}">
                    </div>
                    <div class="sub-img2">
                        <img src="{{ asset('storage/image/'.$house->sub_img4) }}">
                        <img src="{{ asset('storage/image/'.$house->sub_img5) }}">
                    </div>
                </div>
            </div>
            <div class="detail-text">
                <table class="detail-table radius-table">
                    <tr>
                        <td class="detail-title">アクセス</td>
                        <td>{{ $house->access }}</td>
                    </tr>
                    <tr>
                        <td class="detail-title">住所</td>
                        <td>{{ $house->address }}</td>
                    </tr>
                    <tr>
                        <td class="detail-title">間取り</td>
                        <td>{{ $house->floor }}</td>
                        <td class="detail-title">築年数</td>
                        <td>{{ $house->bulding_date }}年</td>
                        <td class="detail-title">駐車場</td>
                        <td>{{ $house->parking }}</td>
                    </tr>
                    <tr>
                        <td class="detail-title">建物面積</td>
                        <td>{{ $house->bulding_area }}㎡</td>
                        <td class="detail-title">土地面積</td>
                        <td>{{ $house->land_area }}㎡</td>
                    </tr>
                </table>
            </div>
            <div class="home-button">
                <a href="{{ route('update-house', ['id'=>$house->id]) }}"><button class="normal-button">登録物件を編集する</button></a>
                <a class="home-button2" href="{{ route('house-delete-home', ['id'=>$house->id]) }}" type='submit' name='id' value="{{ $house->id }}" onclick="return confirm('削除してよろしいですか？')" class="delete-show"><button class="normal-button"> 登録物件を削除する</button></a>
            </div>
        </div>
        @endforeach
        @endif

    </div>
    <div class="button-content">
        <a class="" href="{{ route('register-house') }}"><button class="normal-button register-button">空家物件を登録する</button></a>
    </div>
</div>
@endif

@endsection







{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('0円空家リノベーションへようこそ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('ログインが完了しました。') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
