@extends('layouts.app')

@section('title','新規貸出画面')

@section('content')
<body>
<h1>新規貸出画面</h1>
    @include('commons.flash')
    {{$error}}
<form action="{{route('borrowbooks.store')}}" method="post">
    @csrf
<dl>
    <dt>会員ID</dt>
    <dd>
        <input type="number" name="user_id">
    </dd>
    <dt>書籍ID</dt>
    <dd>
        <input type="number" name="book_id">
    </dd>
</dl>
    <button class="submit_button" type="submit">貸出</button>

</form>
<a href="{{route('borrowbooks.index')}}">戻る</a>
</body>
@endsection
