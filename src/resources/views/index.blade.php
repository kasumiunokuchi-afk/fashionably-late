@extends('layouts/app')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('title', "Contact")
@section('content')
<div class="contact-form__content">
    <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required"></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="テスト太郎" value="{{old('first_name')}}"  />
                    <input type="text" name="last_name" placeholder="テスト太郎" value="{{old('last_name')}}"  />
                </div>
                @error('email')
                <div class="form__error">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required"></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <div class="form__input--radio-item">
                        <input type="radio" name="gender" id="man" value="1" class="radio-hidden" checked/>
                        <label for="man" class="custom-radio">男性</label>
                    </div>
                    <div class="form__input--radio-item">
                        <input type="radio" name="gender" id="woman" value="2" class="radio-hidden" />
                        <label for="woman" class="custom-radio">女性</label>
                    </div>
                    <div class="form__input--radio-item">
                        <input type="radio" name="gender" id="other" value="3" class="radio-hidden" />
                        <label for="other" class="custom-radio">その他</label>
                    </div>
                </div>
                @error('email')
                <div class="form__error">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required"></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="test@example.com" value="{{old('email')}}" />
                </div>
                @error('email')
                <div class="form__error">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required"></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="tel" name="tel[0]" placeholder="090" value="{{old('tel')}}" class=""/>
                    <span>-</span>
                    <input type="tel" name="tel[1]" placeholder="1234" value="{{old('tel')}}" />
                    <span>-</span>
                    <input type="tel" name="tel[2]" placeholder="5678" value="{{old('tel')}}" />
                </div>
                @error('email')
                <div class="form__error">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required"></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="test@example.com" value="{{old('address')}}" />
                </div>
                @error('address')
                <div class="form__error">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="test@example.com" value="{{old('building')}}" />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required"></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--select select-wrapper">
                    <select name="category_id" >
                        <option value="">選択してください</option>
                    </select>
                </div>
                @error('category_id')
                <div class="form__error">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required"></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" placeholder="資料をいただきたいです" ></textarea>
                </div>
                @error('detail')
                <div class="form__error">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection