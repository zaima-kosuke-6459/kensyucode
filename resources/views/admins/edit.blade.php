@extends('layouts.app')

@section('title','管理者情報編集画面')

@section('content')
    <h1>管理者情報編集</h1>
    @include('commons.flash')
    <form action="{{route('admins.update',$admin)}}" method="post">
        @csrf
        @method('patch')
        <p>
            <label>名前</label><br>
            <input type="text" name="name" value="{{$admin->name}}">
        </p>
        <p>
            <label>メールアドレス</label><br>
            <input type="email" name="email" value="{{$admin->email}}">
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
            <button class="submit_button" type="submit">更新</button>
        </p>
        <p>
            <a href="{{route('admins.index')}}">キャンセル</a>
        </p>
    </form>
@endsection
