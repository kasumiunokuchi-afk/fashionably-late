@extends('layouts/app')
@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('title', "Register")

@section('content')
<form class="form" action="/register" method="post">
    @csrf
    <div class="register-form__item">
        <label>お名前</label>
        <input type="text" name="name" value="" placeholder="aaa">
    </div>
    <div class="register-form__item">
        <label>メールアドレス</label>
        <input type="mail" name="mail" value="" placeholder="aaa">
    </div>
    <div class="register-form__item">
        <label>パスワード</label>
        <input type="password" name="password" value="" placeholder="aaa">
    </div>
    <div class="register-form__button">
        <button class="register-form__button-submit" type="submit">登録</button>
    </div>
</form>
@endsection