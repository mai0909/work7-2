<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>0円空家からリノベーション</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css')  }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>

@extends('layouts.app')
@section('content')

<div class="body">
    <p class="detail-p">■空家物件詳細</p>
        @foreach ($houses as $house)
        <div>
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
                <table class=detail-table>
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
        </div>
        @endforeach
</div>

<div class="to-cost-button">
    <a href="{{ route('cost') }}"><button class="normal-button register-button">リノベーション費用の見積もりを行う</button></a>
</div>

@endsection