@extends('layouts.app')

@section('title','貸出編集画面')

@section('content')
<body>
<h1>貸出編集画面</h1>
@include('commons.flash')
<form action="{{route('borrowbooks.update',$borrowed_book->id)}}" method="post">
    @csrf
    @method('patch')
<dl>
    <dt>会員ID</dt>
    <dd>
        <input type="number" name="user_id" value="{{$borrowed_book->user_id}}">
    </dd>
    <dt>書籍ID</dt>
    <dd>
        <input type="number" name="book_id" value="{{$borrowed_book->book_id}}">
    </dd>
    <dt>管理ユーザID</dt>
    <dd>
    <select class="select_box" name="admin_id">
        @foreach($admins as $admin)
        
        <option value="{{$admin->id}}" {{($admin->id) == ($borrowed_book->admin_id) ? 'selected' : ''}}>{{$admin->id}}({{$admin->name}})</option>
        @endforeach
        </select>
    </dd>
    <dt>貸出日</dt>
    <dd>
        <input type="date" name="borrowed_date" value="{{$borrowed_book->borrowed_date}}">
    </dd>

    <dt>返却期限日</dt>
    <dd>
        <input type="date" name="return_due_date" value="{{$borrowed_book->return_due_date}}">
    </dd>
    <dt>返却日</dt>
    <dd>
        <input type="date" name="return_date" value="{{$borrowed_book->return_date}}">
    </dd>
</dl>
<button class="submit_button" type="submit">更新</button>
</form>
<a href="{{route('borrowbooks.index')}}">キャンセル</a>
</body>
</html>
@endsection
