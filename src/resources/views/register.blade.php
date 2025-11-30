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
        <input type="text" name="name" value="{{ old('name') }}" placeholder="例：山田 太郎"/>
        @error('name')
        <div class="form__error">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="register-form__item">
        <label>メールアドレス</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com" />
        @error('email')
        <div class="form__error">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="register-form__item">
        <label>パスワード</label>
        <input type="password" name="password" placeholder="例：coachtechno1" />
        @error('password')
        <div class="form__error">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="register-form__button">
        <button class="register-form__button-submit" type="submit">登録</button>
    </div>
</form>

@endsection