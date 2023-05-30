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
@foreach ($houses as $house)
<form method="post" action="{{ route('update-complete',['id'=>$house->id]) }}" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="form-content">
        <p class="cost-p">■空家物件を登録する</p>
        <p class="form-question">下記の更新内容をご記入の上登録ボタンを押してください。</p>

        {{-- <p class="form-item">空家物件のトップ画像<span class="red-point">*</span></p>
        <input type="file" name="top_img" value="{{ old('top_img', $houses['top_img']) }}" placeholder="" required>
        @if ($errors->has('top_img'))
            <p class="error-msg">{{ $errors->first('top_img') }}</p>
        @endif

        <p class="form-item">空家物件のサブ画像1<span class="red-point">*</span></p>
        <input type="file" name="sub_img1" value="{{ old('sub_img1', $houses['sub_img1']) }}" placeholder="" required>
        @if ($errors->has('sub_img1'))
            <p class="error-msg">{{ $errors->first('sub_img1') }}</p>
        @endif

        <p class="form-item">空家物件のサブ画像2<span class="red-point">*</span></p>
        <input type="file" name="sub_img2" value="{{ old('sub_img2', $houses['sub_img2']) }}" placeholder="" required>
        @if ($errors->has('sub_img2'))
            <p class="error-msg">{{ $errors->first('sub_img2') }}</p>
        @endif

        <p class="form-item">空家物件のサブ画像3<span class="red-point">*</span></p>
        <input type="file" name="sub_img3" value="{{ old('sub_img3', $houses['sub_img3']) }}" placeholder="" required>
        @if ($errors->has('sub_img3'))
            <p class="error-msg">{{ $errors->first('sub_img3') }}</p>
        @endif

        <p class="form-item">空家物件のサブ画像4<span class="red-point">*</span></p>
        <input type="file" name="sub_img4" value="{{ old('sub_img4', $houses['sub_img4']) }}" placeholder="" required>
        @if ($errors->has('sub_img4'))
            <p class="error-msg">{{ $errors->first('sub_img4') }}</p>
        @endif

        <p class="form-item">空家物件のサブ画像3<span class="red-point">*</span></p>
        <input type="file" name="sub_img5" value="{{ old('sub_img5', $houses['sub_img5']) }}" placeholder="" required>
        @if ($errors->has('sub_img5'))
            <p class="error-msg">{{ $errors->first('sub_img5') }}</p>
        @endif --}}

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">物件までの交通手段<span class="red-point">*</span></p>
                <input  class="long-input" type="text" name="access" value="{{ old('access', $house->access) }}" placeholder="(例)〇〇駅から徒歩20分" required>
            </div>
            @if ($errors->has('access'))
                <p class="error-msg">{{ $errors->first('access') }}</p>
            @endif
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">間取り<span class="red-point">*</span></p>
                <input type="text" name="floor" value="{{ old('floor', $house->floor) }}" placeholder="(例)3LDK" required>
            </div>
            @if ($errors->has('floor'))
                <p class="error-msg">{{ $errors->first('floor') }}</p>
            @endif
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">建物面積<span class="red-point">*</span></p>
                <input type="text" name="bulding_area" value="{{ old('bulding_area', $house->bulding_area) }}" placeholder="(例)70">㎡
            </div>
            @if ($errors->has('bulding_area'))
                <p class="error-msg">{{ $errors->first('bulding_area') }}</p>
            @endif
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">土地面積</p>
                <input type="text" name="land_area" value="{{ old('land_area', $house->land_area) }}" placeholder="(例)100" required>㎡
            </div>
            @if ($errors->has('land_area'))
                <p class="error-msg">{{ $errors->first('land_area') }}</p>
            @endif
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">築年数<span class="red-point">*</span></p>
                <input type="text" name="bulding_date" value="{{ old('bulding_date', $house->bulding_date) }}" placeholder="(例)30" required>年    
            </div>
            @if ($errors->has('bulding_date'))
                <p class="error-msg">{{ $errors->first('bulding_date') }}</p>
            @endif
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">所在地<span class="red-point">*</span></p>
                <input  class="long-input" type="text" name="address" value="{{ old('address', $house->address) }}" placeholder="(例)神奈川県小田原市〇〇町1-1-1" required>
            </div>
            @if ($errors->has('address'))
                <p class="error-msg">{{ $errors->first('address') }}</p>
            @endif
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">駐車場</p>
                <input type="radio" name="parking" value="有" {{ old('parking',$house->parking) == '有' ? 'checked' : '' }} required>有
                <input type="radio" name="parking" value="無" {{ old('parking', $house->parking) ==  '無' ? 'checked' : '' }} required>無    
            </div>
            @if ($errors->has('parking'))
                <p class="error-msg">{{ $errors->first('parking') }}</p>
            @endif
        </div>

        <div class="register-content">
            <p class="form-item">備考欄</p>
            <input type="text" name="remark" value="{{ old('remark', $house->remark) }}" placeholder="" required>    
        </div>
        
        <div>
            <button class="normal-button register-button regi-button"  type="submit" name="submit" value="更新">物件内容を更新する</button>
        </div>
        
    @endforeach
    </div>
</form>


@endsection