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

<form method="post" action="{{ route('house-complete') }}">
    @csrf
    <p class="detail-p">■空家物件登録内容</p>
    <div class="form-content">
        <p class="form-text">下記の下記の内容をご確認の上登録ボタンを押してください<br>内容を訂正する場合は戻るを押してください。</p>
    <div>
        
    <div class="detail-img">
        <div class="top-img">
            <img src=" {{ $data['read_top_path'] }}" width="200" height="130">
            <input name="top_img" value="{{ $inputs['top_img'] }}" type="hidden">
            <input name="top_img" value="{{ $data['top_path'] }}" type="hidden">
        </div>
        <div class="sub-img">
            <div class="sub-img1">
                {{-- <p class="form-item">サブ画像1</p> --}}
                <img src="{{ $data['read_sub1_path'] }}" width="200" height="130">
                <input name="sub_img1" value="{{ $inputs['sub_img1'] }}" type="hidden">
                <input name="sub_img1" value="{{ $data['sub1_path'] }}" type="hidden">
        
                {{-- <p class="form-item">サブ画像2</p> --}}
                <img src="{{ $data['read_sub2_path'] }}" width="200" height="130">
                <input name="sub_img2" value="{{ $inputs['sub_img2'] }}" type="hidden">
                <input name="sub_img2" value="{{ $data['sub2_path'] }}" type="hidden">
        
                {{-- <p class="form-item">サブ画像3</p> --}}
                <img src="{{ $data['read_sub3_path'] }}" width="200" height="130">
                <input name="sub_img3" value="{{ $inputs['sub_img3'] }}" type="hidden">
                <input name="sub_img3" value="{{ $data['sub3_path'] }}" type="hidden">
            </div>
            <div class="sub-img2">
                {{-- <p class="form-item">サブ画像4</p> --}}
                <img src="{{ $data['read_sub4_path'] }}" width="200" height="130">
                <input name="sub_img4" value="{{ $inputs['sub_img4'] }}" type="hidden">
                <input name="sub_img4" value="{{ $data['sub4_path'] }}" type="hidden">
        
                {{-- <p class="form-item">サブ画像5</p> --}}
                <img src="{{ $data['read_sub5_path'] }}" width="200" height="130">
                <input name="sub_img5" value="{{ $inputs['sub_img5'] }}" type="hidden">
                <input name="sub_img5" value="{{ $data['sub5_path'] }}" type="hidden">
            </div>
        </div>
    </div>

    <div class="detail-text">
        <table class=detail-table>
            <tr>
                <td class="detail-title">アクセス</td>
                <td>
                    {{ $inputs['access'] }}
                    <input name="access" value="{{ $inputs['access'] }}" type="hidden">
                </td>
            </tr>
            <tr>
                <td class="detail-title">住所</td>
                <td>
                    {{ $inputs['address'] }}
                    <input name="address" value="{{ $inputs['address'] }}" type="hidden">
                </td>
            </tr>
            <tr>
                <td class="detail-title">間取り</td>
                <td>
                    {{ $inputs['floor'] }}
                    <input name="floor" value="{{ $inputs['floor'] }}" type="hidden">
                </td>
                <td class="detail-title">築年数</td>
                <td>
                    {{ $inputs['bulding_date'] }}
                    <input name="bulding_date" value="{{ $inputs['bulding_date'] }}" type="hidden">
                    年</td>
                <td class="detail-title">駐車場</td>
                <td>
                    {{ $inputs['parking'] }}
                    <input name="parking" value="{{ $inputs['parking'] }}" type="hidden">
                </td>
            </tr>
            <tr>
                <td class="detail-title">建物面積</td>
                <td>
                    {{ $inputs['bulding_area'] }}
                    <input name="bulding_area" value="{{ $inputs['bulding_area'] }}" type="hidden">
                ㎡</td>
                <td class="detail-title">土地面積</td>
                <td>
                    {{ $inputs['land_area'] }}
                    <input name="land_area" value="{{ $inputs['land_area'] }}" type="hidden">
                ㎡</td>
            </tr>
        </table>
    </div>
    <div class="check-button">
        <button class="normal-button check1" type="submit" name="action" value="send">登 &nbsp; 録</button>
        <button class="normal-button check2" type="submit" name="action" value="back" >戻 &nbsp; る</button>
    </div>
</div>


</div>

@endsection





{{-- <p class="form-item">トップ画像</p>
<img src=" {{ $data['read_top_path'] }}" width="200" height="130">
<input name="top_img" value="{{ $inputs['top_img'] }}" type="hidden">
<input name="top_img" value="{{ $data['top_path'] }}" type="hidden">

<p class="form-item">サブ画像1</p>
<img src="{{ $data['read_sub1_path'] }}" width="200" height="130">
<input name="sub_img1" value="{{ $inputs['sub_img1'] }}" type="hidden">
<input name="sub_img1" value="{{ $data['sub1_path'] }}" type="hidden">

<p class="form-item">サブ画像2</p>
<img src="{{ $data['read_sub2_path'] }}" width="200" height="130">
<input name="sub_img2" value="{{ $inputs['sub_img2'] }}" type="hidden">
<input name="sub_img2" value="{{ $data['sub2_path'] }}" type="hidden">

<p class="form-item">サブ画像3</p>
<img src="{{ $data['read_sub3_path'] }}" width="200" height="130">
<input name="sub_img3" value="{{ $inputs['sub_img3'] }}" type="hidden">
<input name="sub_img3" value="{{ $data['sub3_path'] }}" type="hidden">

<p class="form-item">サブ画像4</p>
<img src="{{ $data['read_sub4_path'] }}" width="200" height="130">
<input name="sub_img4" value="{{ $inputs['sub_img4'] }}" type="hidden">
<input name="sub_img4" value="{{ $data['sub4_path'] }}" type="hidden">

<p class="form-item">サブ画像5</p>
<img src="{{ $data['read_sub5_path'] }}" width="200" height="130">
<input name="sub_img5" value="{{ $inputs['sub_img5'] }}" type="hidden">
<input name="sub_img5" value="{{ $data['sub5_path'] }}" type="hidden">



<p class="form-item">物件までの交通手段</p>
{{ $inputs['access'] }}
<input name="access" value="{{ $inputs['access'] }}" type="hidden">
<p class="form-item">間取り</p>
{{ $inputs['floor'] }}
<input name="floor" value="{{ $inputs['floor'] }}" type="hidden">
<p class="form-item">建物面積</p>
{{ $inputs['bulding_area'] }}
<input name="bulding_area" value="{{ $inputs['bulding_area'] }}" type="hidden">
<p class="form-item">土地面積</p>
{{ $inputs['land_area'] }}
<input name="land_area" value="{{ $inputs['land_area'] }}" type="hidden">
<p class="form-item">築年数</p>
{{ $inputs['bulding_date'] }}
<input name="bulding_date" value="{{ $inputs['bulding_date'] }}" type="hidden">
<p class="form-item">住所</p>
{{ $inputs['address'] }}
<input name="address" value="{{ $inputs['address'] }}" type="hidden">
<p class="form-item">駐車場</p>
{{ $inputs['parking'] }}
<input name="parking" value="{{ $inputs['parking'] }}" type="hidden">
<p class="form-item">備考欄</p>
{!! nl2br(e( $inputs['remark'] )) !!}
<input name="remark" value="{{ $inputs['remark'] }}" type="hidden">
<div class="button">
    <button class="button-firm" type="submit" name="action" value="send">登 &nbsp; 録</button>
    <button class="button-back" type="submit" name="action" value="back" >戻 &nbsp; る</button>
</div>
</div>
</form> --}}


