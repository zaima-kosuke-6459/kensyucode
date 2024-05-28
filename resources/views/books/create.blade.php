@extends('layouts.app')
@section('title','書籍情報登録画面')
@section('content')
    <h1>書籍情報登録</h1>
    @include('commons.flash')
    <form action="{{ route('books.store')}}" method="post" novalidate>
        @include('books.form')
        <button class="submit_button" type="submit">登録</button>
    </form>
    <p>
    <a href="{{ route('books.index')}}">戻る</a>
    </p>
    @endsection
