
@extends('layouts.app')

@section('title','管理者ログイン画面')

@section('content')
    <h1>管理者ログイン</h1>
    @include('commons.flash')
    <form action="{{route('login')}}" method="post">
        @csrf
        <p>
            <label>メールアドレス</label><br>
            <input type="email" name="email" value="{{old('email')}}">
        </p>
        <p>
            <label>パスワード</label><br>
            <input type="password" name="password" value="">
        </p>
        <p>
            <button type="submit">ログイン</button>
        </p>
    </form>
@endsection