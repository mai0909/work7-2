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

<div class="container">
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

                    {{ __('新規登録が完了しました。') }}
                </div>
            </div>
        </div>
    </div>
</div>

    <p>空家物件情報の更新完了</p>
    <div class="form-content">
        <p class="form-text">
            ご登録している空家物件の更新が完了しました。
        </p>
        <a href="{{ route('home') }}">マイページへ戻る</a>
    </div>

@endsection