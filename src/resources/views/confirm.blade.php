@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('title', "Confirm")
@section('content')
<div class="confirm__content">
    <form class="form" action="/contacts" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        {{$contact['first_name']. ' ' . $contact['last_name']}}
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        @switch ($contact['gender'])
                            @case(1)
                                男性
                                @break
                            @case(2)
                                女性
                                @break
                            @case(3)
                                その他
                                @break
                        @endswitch
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        {{$contact['email']}}
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        {{$contact['tel']}}
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        {{$contact['address']}}
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        {{$contact['building']}}
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="category_id" value="{{$contact['category_id']}}"  >
                        {{$contact['category_txt']}}
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        {{$contact['detail']}}
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
            <button type="button" class="form__link-back" onclick="window.location='{{ '/' }}'">
        修正
    </button>
        </div>
    </form>
</div>
@endsection