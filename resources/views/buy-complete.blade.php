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
                    <div class="card-header">{{ __('購入申請完了') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        {{ __('購入申請を受け付けました。')}} <br>
                        {{('担当者よりご登録いただいたメールアドレスにてご連絡いたします。') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="to-cost-button">
        <a href="{{ route('list-of-house') }}">空家物件一覧へ戻る</a>
    </div>

@endsection