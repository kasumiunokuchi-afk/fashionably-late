@extends('layouts/app')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('title', "admin")

@section('content')

<div class="admin__content">
    <form class="form" action="/search" method="post">
        @csrf
        <input type="text" name="search_word" value="" placeholder="aaa" class="search-form__item">
        <div class="search__input--select select-wrapper">
            <select name="gender" >
                <option value="">性別</option>
            </select>
        </div>
        <div class="form__input--select select-wrapper">
            <select name="category_id" >
                <option value="">お問い合わせの種類</option>
            </select>
        </div>
        <div class="form__input--date">
            <input type="date" name="date" id="">
        </div>
        <button class="search-form__button-submit" type="submit">検索</button>
        <button class="search-form__button-submit" type="submit">リセット</button>
    </form>
</div>
<div class="admin__content">
    <form action="/export" method="post">
    <button class="search-form__button-submit" type="submit">エクスポート</button>
    </form>

</div>
<div class="admin__content">
    <table class="contact-table__inner">
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
        </tr>
        <tr>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td>
                <button class="contact-table__button-detail" data-bs-toggle="modal" data-bs-target="#myModal">詳細</button>
            </td>
        </tr>
<!--         
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->gender }}</td>
            <td>{{ $contact->mail }}</td>
            <td>{{ $contact->category}}</td>
            <td>
                <a href="">詳細</a>
            </td>
        </tr>
        @endforeach
         -->
    </table>
</div>

<div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <form action="/delete">
                <table class="modal-table__inner">
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お名前</th>
                        <td class="modal-table__text">
                            <input type="text" name="first_name" value="aaa" hidden >
                            <input type="text" name="last_name" value="aaa" hidden >
                            aaa
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">性別</th>
                        <td class="modal-table__text">
                            aaa
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">メールアドレス</th>
                        <td class="modal-table__text">
                            aaa
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">電話番号</th>
                        <td class="modal-table__text">
                            aaa
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">住所</th>
                        <td class="modal-table__text">
                            aaa
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">建物名</th>
                        <td class="modal-table__text">
                            aaa
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お問い合わせの種類</th>
                        <td class="modal-table__text">
                            aaa
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お問い合わせ内容</th>
                        <td class="modal-table__text">
                            aaa
                        </td>
                    </tr>
                </table>
                <div class="modal__button-delete">
                    <button  data-bs-dismiss="modal">削除</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
</div>

@endsection