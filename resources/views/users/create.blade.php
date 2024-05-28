@extends('layouts.app')

@section('title','会員情報の登録')

@section('content')
    <h1>会員情報の登録</h1>
    @include('commons.flash')

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <label for="name">会員名</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="会員名">
        <br>
        <label for="address">住所</label><br>
        <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="住所">
        <br>
        <label for="tel">電話番号（ハイフンなし）</label><br>
        <input type="text" id="tel" name="tel" value="{{ old('tel') }}" placeholder="電話番号">
        <br>
        <label for="email">メールアドレス</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
        <br>
        <div class="div_button">
            <button class="submit_button">登録</button>
        </div>
    </form>
    <a href="{{ route('users.index') }}">戻る</a>
@endsection
