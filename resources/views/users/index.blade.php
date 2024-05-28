@extends('layouts.app')

@section('title','会員一覧画面')

@section('content')
    <h1>会員一覧画面</h1>
    <a href="{{ route('users.create') }}">＋新規会員登録</a>

    <form action="{{ route('users.index')}}" method="get">
        <!-- 会員IDの入力 -->
        <p>会員ID：<input type="text" name="search_id" placeholder="会員ID" value="{{ request('search_id') }}"></p>
        または
        <!-- 会員名の入力 -->
        <p>会員名：<input type="text" name="search_name" placeholder="会員名" value="{{ request('search_name') }}"></p>
        <!-- ソートの基準選択 -->
        <select name="order">
            <option value="id" @if(request('order') == 'id') selected @endif>会員ID</option>
            <option value="created_at" @if(request('order') == 'created_at') selected @endif>作成日</option>
        </select>
        <!-- ソート順選択 -->
        <select name="order_flag">
            <option value="asc" @if(request('order_flag') == 'asc') selected @endif>昇順</option>
            <option value="desc" @if(request('order_flag') == 'desc') selected @endif>降順</option>
        </select>
        <div class="div_button">
            <button class="submit_button">検索</button>
        </div>
    </form>

    <table class="table">

        @if(!$users->isEmpty())
        <thead>
        <tr>
            <th>会員ID</th><th>会員名</th><th>電話番号</th><th>作成日</th><th>詳細</th>
        </tr>
        </thead>
        @else
            <p>該当会員はいません</p>
        @endif
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->tel }}</td>
                <td>{{ $user->created_at->format('Y年m月d日') }}</td>
                <td><a href="{{ route('users.show',$user) }}">詳細</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->appends(Request::all())->links()}}
@endsection
