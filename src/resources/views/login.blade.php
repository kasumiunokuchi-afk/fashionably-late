@extends('layouts/app')
@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('title', "Login")

@section('content')
<form class="form" action="/login" method="post">
    @csrf
    <div class="login-form__item">
        <label>メールアドレス</label>
        <input type="mail" name="mail" value="" placeholder="aaa">
    </div>
    <div class="login-form__item">
        <label>パスワード</label>
        <input type="password" name="password" value="" placeholder="aaa">
    </div>
    <div class="login-form__button">
        <button class="login-form__button-submit" type="submit">ログイン</button>
    </div>
</form>
@endsection