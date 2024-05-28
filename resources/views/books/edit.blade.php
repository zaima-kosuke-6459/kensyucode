@extends('layouts.app')
@section('title','書籍情報編集画面')
@section('content')
    <h1>書籍情報編集</h1>
    @include('commons.flash')
    <form action="{{ route('books.update', $book->id )}}" method="post" novalidate>
        @method('patch')
        @include('books.form')
        <button class="submit_button" type="submit">更新</button>
    </form>
    <p>
        <a href="/books/{{ $book->id }}">戻る</a>
    </p>
@endsection
