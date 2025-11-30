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
        <input type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com" />
        @error('email')
        <div class="form__error">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="login-form__item">
        <label>パスワード</label>
        <input type="password" name="password" placeholder="例：coachtechno1" />
        @error('password')
        <div class="form__error">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="login-form__button">
        <button class="login-form__button-submit" type="submit">ログイン</button>
    </div>
</form>
@endsection