@extends('layouts.app')

@section('title','管理者ログイン画面')

@section('content')
    <h1>管理者登録</h1>
    @include('commons.flash')
    <form action="{{route('register')}}" method="post">
        @csrf
        <p>
            <label>名前</label><br>
            <input type="text" name="name" value="{{old('name')}}">
        </p>
        <p>
            <label>メールアドレス</label><br>
            <input type="email" name="email" value="{{old('email')}}">
        </p>
        <p>
            <label>パスワード</label><br>
            <input type="password" name="password" value="">
        </p>
        <p>
            <label>パスワード確認</label><br>
            <input type="password" name="password_confirmation" value="">
        </p>
        <p>
            <button type="submit">管理者登録</button>
        </p>
    </form>
    <p>
        <a href="{{route('admins.index')}}">キャンセル</a>
    </p>
@endsection