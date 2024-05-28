@extends('layouts.app')

@section('title','会員情報の編集')

@section('content')
    <h1>会員情報の編集</h1>
    @include('commons.flash')

    <form action="{{ route('users.update',$user) }}" method="post">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <label for="name">会員名</label><br>
        <input type="text" name="name" value="{{ old('name',$user->name) }}" placeholder="会員名">
        <br>
        <label for="address">住所</label><br>
        <input type="text" name="address" value="{{ old('address',$user->address) }}" placeholder="住所">
        <br>
        <label for="tel">電話番号（ハイフンなし）</label><br>
        <input type="text" name="tel" value="{{ old('tel',$user->tel) }}" placeholder="電話番号">
        <br>
        <label for="email">メールアドレス</label><br>
        <input type="email" name="email" value="{{ old('email',$user->email) }}" placeholder="メールアドレス">
        <br>
        <div class="div_button">
            <button class="submit_button">更新</button>
        </div>
    </form>
    <a href="{{ route('users.show',$user->id) }}">戻る</a>
@endsection
