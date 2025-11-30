@extends('layouts/app')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('title', "Admin")

@section('content')

<div class="admin__content">
    <div class="content__inner">
        <form class="form form__search" action="/search" method="get">
            @csrf
            <input type="text" name="search_word" value="{{request('search_word')}}" placeholder="名前やメールアドレスを入力してください" class="search-form__input">
            <div class="search__input--select select-wrapper">
                <select name="gender" >
                    <option value="" disable>性別</option>
                    <option value="0" {{request('gender') == 0 ? 'selected' : '' }}>全て</option>
                    <option value="1" {{request('gender') == 1 ? 'selected' : '' }}>男性</option>
                    <option value="2" {{request('gender') == 2 ? 'selected' : '' }}>女性</option>
                    <option value="3" {{request('gender') == 3 ? 'selected' : '' }}>その他</option>
                </select>
            </div>
            <div class="form__input--select select-wrapper">
                <select name="category_id" >
                    <option value="">お問い合わせの種類</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" 
                            {{request('category_id') == $category->id ? 'selected' : ''}} >
                            {{$category->id . '. ' . $category->content}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form__input--date">
                <input type="date" name="date" value="{{request('date')}}">
            </div>
            <button class="search-form__button-search" type="submit">検索</button>
        </form>
        <form action="/reset" method="get">
            <button class="search-form__button-reset" type="submit">リセット</button>
        </form>
    </div>
</div>
<div class="admin__content">
    <div class="content__inner">
        <form action="/export" method="get">
        <button class="button-export" type="submit">エクスポート</button>
        </form>

        <div class="search-form__pagination">
            {{ $contacts->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
<div class="admin__content">
    <table class="contact-table__inner">
        <tr>
            <th style="width:15%">お名前</th>
            <th style="width:15%">性別</th>
            <th style="width:30%">メールアドレス</th>
            <th style="width:25%">お問い合わせの種類</th>
            <th style="width:15%"></th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <td> {{$contact->first_name. ' ' . $contact->last_name}}</td>
            <td>
                @switch ($contact->gender)
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
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category['content']}}</td>
            <td>
                <button class="contact-table__button-detail btn-detail" 
                data-bs-toggle="modal" 
                data-bs-target="#myModal" 
                data-name="{{$contact->first_name. ' ' . $contact->last_name}}"
                data-gender="@switch($contact->gender)@case(1)男性@break @case(2)女性@break @case(3)その他@break @endswitch"
                data-tel="{{$contact->tel}}" 
                data-email="{{ $contact->email }}" 
                data-address="{{ $contact->address }}" 
                data-building="{{$contact->building}}" 
                data-category="{{ $contact->category['content']}}"
                data-detail="{{$contact->detail}}" 
                data-id="{{$contact->id}}" >
                    詳細
                </button>
            </td>
        </tr>
        @endforeach
        
    </table>
</div>

<div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <table class="modal-table__inner">
                <tr class="modal-table__row">
                    <th class="modal-table__header">お名前</th>
                    <td class="modal-table__text">
                        <span id="modal-name"></span>
                    </td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">性別</th>
                    <td class="modal-table__text">
                        <span id="modal-gender"></span>
                    </td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">メールアドレス</th>
                    <td class="modal-table__text">
                        <span id="modal-email"></span>
                    </td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">電話番号</th>
                    <td class="modal-table__text">
                        <span id="modal-tel"></span>
                    </td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">住所</th>
                    <td class="modal-table__text">
                        <span id="modal-address"></span>
                    </td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">建物名</th>
                    <td class="modal-table__text">
                        <span id="modal-building"></span>
                    </td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">お問い合わせの種類</th>
                    <td class="modal-table__text">
                        <span id="modal-category"></span>
                    </td>
                </tr>
                <tr class="modal-table__row">
                    <th class="modal-table__header">お問い合わせ内容</th>
                    <td class="modal-table__text">
                        <span id="modal-detail"></span>
                    </td>
                </tr>
            </table>
            <form action="/delete" method="post">
                @method('delete')
                @csrf
                <input type="hidden" name="id" id="modal-contact-id">
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

<!-- JS: ボタン押下でモーダルに値をセット -->
<script>
document.querySelectorAll('.btn-detail').forEach(button => {
    button.addEventListener('click', () => {
        document.getElementById('modal-name').textContent = button.dataset.name;
        document.getElementById('modal-gender').textContent = button.dataset.gender;
        document.getElementById('modal-email').textContent = button.dataset.email;
        document.getElementById('modal-tel').textContent = button.dataset.tel;
        document.getElementById('modal-address').textContent = button.dataset.address;
        document.getElementById('modal-building').textContent = button.dataset.building;
        document.getElementById('modal-category').textContent = button.dataset.category;
        document.getElementById('modal-detail').textContent = button.dataset.detail;
        document.getElementById('modal-contact-id').value = button.dataset.id;
    });
});
</script>

@endsection