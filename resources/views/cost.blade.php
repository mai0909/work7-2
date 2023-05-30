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
<body>
    <div class="cost">
        <p class="cost-p">■リノベーション費用の見積もり</p>
        <form action="{{ route('buy-complete') }}" class="cost-form">
        @csrf 
            <div class="toilet cost-content">
                <p>＜トイレの改装費用＞</p>
                <div class="cost-select">
                    <div class="img-select">
                        <img src="{{ asset('storage/image/free.jpg') }}">
                        <input type="radio" name="toilet" value="0">0円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/toilet1.jpg') }}">
                        <input type="radio" name="toilet" value="15">15万円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/toilet2.jpg') }}">
                        <input type="radio" name="toilet" value="20">20万円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/toilet3.jpg') }}">
                        <input type="radio" name="toilet" value="50">50万円
                    </div>
                </div>
            </div>

            <div class="bath cost-content">
                <p>＜お風呂の改装費用＞</p>
                <div class="cost-select">
                    <div class="img-select">
                        <img src="{{ asset('storage/image/free.jpg') }}">
                        <input type="radio" name="bath" value="0">0円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/bath1.jpg') }}">
                        <input type="radio" name="bath" value="15">50万円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/bath2.jpg') }}">
                        <input type="radio" name="bath" value="20">80万円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/bath3.jpg') }}">
                        <input type="radio" name="bath" value="50">100万円
                    </div>
                </div>
            </div>

            <div class="kitchen cost-content">
                <p>＜キッチンの改装費用＞</p>
                <div class="cost-select">
                    <div class="img-select">
                        <img src="{{ asset('storage/image/free.jpg') }}">
                        <input type="radio" name="kitchen" value="0">0円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/kitchen1.jpg') }}">
                        <input type="radio" name="kitchen" value="15">30万円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/kitchen2.jpg') }}">
                        <input type="radio" name="kitchen" value="20">70万円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/kitchen3.jpg') }}">
                        <input type="radio" name="kitchen" value="50">100万円
                    </div>
                </div>
            </div>

            <div class="floor cost-content">
                <p>＜床の改装費用＞</p>
                <div class="cost-select">
                    <div class="img-select">
                        <img src="{{ asset('storage/image/free.jpg') }}">
                        <input type="radio" name="floor" value="0">0円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/floor1.jpg') }}">
                        <input type="radio" name="floor" value="15">10万円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/floor2.jpg') }}">
                        <input type="radio" name="floor" value="20">40万円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/floor3.jpg') }}">
                        <input type="radio" name="floor" value="50">80万円
                    </div>
                </div>
            </div>

            <div class="pillar cost-content">
                <p>＜柱の改装費用＞</p>
                <div class="cost-select">
                    <div class="img-select">
                        <img src="{{ asset('storage/image/free.jpg') }}">
                        <input type="radio" name="pillar" value="0">0円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/pillar1.png') }}">
                        <input type="radio" name="pillar" value="15">10万円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/pillar2.jpg') }}">
                        <input type="radio" name="pillar" value="20">50万円
                    </div>
                    <div class="img-select">
                        <img src="{{ asset('storage/image/pillar3.jpg') }}">
                        <input type="radio" name="pillar" value="50">100万円
                    </div>
                </div>
            </div>

            <div class="to-cost-button">
                <button class="normal-button register-button">上記のリノベーション内容で購入申請を行う</button>
            </div>

        </form>



    </div>
</body>


@endsection