<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>0円空家からリノベーション</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css')  }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const likeButton = document.getElementById('like-button');
        const likeCount = document.getElementById('like-count');
        let count = 0;
        likeButton.addEventListener('click', () => {
            count++;
            likeCount.textContent = count;
        });
    });
</script>

@extends('layouts.app')
@section('content')
<div class="body">
    <div class="my-page" >
        <a href="{{ route('home') }}">マイページ</a>
    </div>
    
    <div class="list-of-house">
        <p>■空家物件一覧</p>
        @foreach ($houses as $house)
        <table class="house-list">
                    <thead class="top-img">
                        <th></th>
                        <tr>
                            <td class="table-text1"><!-- トップ画像 -->
                                <div><img class="top-house" src="{{ asset('storage/image/'.$house->top_img) }}"></div>
                            </td>
                        </tr>
                    </thead>
                <tbody>
                        <tr>
                            <td class="list-title">アクセス</td>
                            <td class="table-text2"><!-- アクセス -->
                                <div>{{ $house->access }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="list-title">住所</td>
                            <td class="table-text6"><!-- 住所 -->
                                <div>{{ $house->address }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="list-title">間取り</td>
                            <td class="table-text3"><!-- 間取り -->
                                <div>{{ $house->floor }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="list-title">建物面積</td>
                            <td class="table-text4"><!-- 建物面積 -->
                                <div>{{ $house->bulding_area }}㎡</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="list-title">築年数</td>
                            <td class="table-text5"><!-- 築年数 -->
                                <div>{{ $house->bulding_date }}年</div>
                            </td>
                        </tr>
                    </tbody>
        </table>
        <div class="list-button">
            <div class="like-container">
                <button id="like-button" class="good-button">検討中 </button>
                <div class="like-content">
                    <span id="like-count">0</span>
                    <p>人</p>
                </div>
            </div>
            <div class="detail-button">
                <a class="detail-button" href="{{ route('house-detail', ['id'=>$house->id]) }}">詳細を見る</a>
            </div>
            <div class="delete-button">
                @if(Auth::user()->manage == 3)
                <a class="delete-button" href="{{ route('house-delete', ['id'=>$house->id]) }}" onclick="return confirm('削除してよろしいですか？')" >削除する</a>
                @endif
            </div>
        </div>

        
        
        {{-- <span>
        <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
        @if($like)
        <!-- 「いいね」取消用ボタンを表示 -->
            <a href="{{ route('unlike', (print_r($house, true))) }}" class="good-button">
                検討中
                <!-- 「いいね」の数を表示 -->
                <span class="badge">
                    @foreach ($likes_count as $like_count)
                    {{ $like_count->likes_count }}
                    @endforeach
                </span>
            </a>
        @else
        <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
            <a href="{{ route('like', (print_r($house, true))) }}" class="good-button ">
                検討する
                <!-- 「いいね」の数を表示 -->
                <span class="badge">
                    @foreach ($likes_count as $like_count)
                    {{ $like_count->likes_count }}
                    @endforeach
                </span>
            </a>
        @endif
        </span> --}}




        @endforeach
    </div>
</div>

@endsection




        {{-- @if($like_model->like_exist(Auth::user()->id,$post->id))
        <p class="favorite-marke">
        <a class="js-like-toggle loved" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart"></i></a>
        <span class="likesCount">{{$post->likes_count}}</span>
        </p>
        @else
        <p class="favorite-marke">
        <a class="js-like-toggle" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart"></i></a>
        <span class="likesCount">{{$post->likes_count}}</span>
        </p>
        @endif --}}