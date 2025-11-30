@extends('layouts/app')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('title', "Contact")
@section('content')
<div class="contact-form__content">
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required"></span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="例：山田" value="{{old('first_name', session('contact.first_name'))}}"  />
                    <input type="text" name="last_name" placeholder="例：太郎" value="{{old('last_name', session('contact.last_name'))}}"  />
                </div>
                @error('first_name')
                <div class="form__error">
                    {{$message}}
                </div>
                @enderror
                @error('last_name')
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
                        <input type="radio" name="gender" id="man" value="1" class="radio-hidden" 
                         {{ session('contact.gender') == '1' ? 'checked' : '' }} />
                        <label for="man" class="custom-radio">男性</label>
                    </div>
                    <div class="form__input--radio-item">
                        <input type="radio" name="gender" id="woman" value="2" class="radio-hidden" 
                         {{ session('contact.gender') == '2' ? 'checked' : '' }}/>
                        <label for="woman" class="custom-radio">女性</label>
                    </div>
                    <div class="form__input--radio-item">
                        <input type="radio" name="gender" id="other" value="3" class="radio-hidden" 
                         {{ session('contact.gender') == '3' ? 'checked' : '' }}/>
                        <label for="other" class="custom-radio">その他</label>
                    </div>
                </div>
                @error('gender')
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
                    <input type="email" name="email" placeholder="例：test@example.com" value="{{old('email' , session('contact.email'))}}" />
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
                    <input type="tel" name="tel0" placeholder="090" 
                    value="{{old('tel0', session('contact.tel0'))}}" class=""/>
                    <span>-</span>
                    <input type="tel" name="tel1" placeholder="1234" 
                    value="{{old('tel1', session('contact.tel1'))}}" />
                    <span>-</span>
                    <input type="tel" name="tel2" placeholder="5678" 
                    value="{{old('tel2', session('contact.tel2'))}}" />
                </div>
                @error('tel0')
                <div class="form__error">
                    {{$message}}
                </div>
                @enderror
                @error('tel1')
                <div class="form__error">
                    {{$message}}
                </div>
                @enderror
                @error('tel2')
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
                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷１２３" value="{{old('address', session('contact.address'))}}" />
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
                    <input type="text" name="building" placeholder="例：千駄ヶ谷マンション１２３" 
                    value="{{old('building', session('contact.building'))}}" />
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
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" 
                        {{old('category_id', session('contact.category_id')) == $category->id ? 'selected' : ''}} >{{$category->id . '. ' . $category->content}}</option>
                        @endforeach
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
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" >{{old('detail', session('contact.detail'))}}</textarea>
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