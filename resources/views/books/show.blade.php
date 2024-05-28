@extends('layouts.app')
@section('title','書籍情報詳細画面')
@section('content')
    <h1>書籍詳細</h1>
    <table class="show_table">
        <tr>
            <th>カテゴリ</th>
            <td>{{ $book->category->name }}</td>
        </tr>
        <tr>
            <th>書籍名</th>
            <td>{{ $book->name }}</td>
        </tr>
        <tr>
            <th>著者</th>
            <td>{{ $book->author }}</td>
        </tr>
        <tr>
            <th>出版社</th>
            <td>{{ $book->publisher }}</td>
        </tr>
        <tr>
            <th>出版日</th>
            <td>{{ $book->publication_date }}</td>
        </tr>
    </table>
    @if (\Auth::user())
    <a href="{{ route('books.edit', $book) }}">書籍の更新</a>
    @endif
    <a href="{{ route('books.index') }}">戻る</a>
    @if (\Auth::user())
    <a href="#" onclick="deleteBook()">削除</a>
    <form action="{{ route('books.destroy', $book) }}" method="post" id="delete-form">
        @csrf
        @method('delete')
    </form>
        <script type="text/javascript">
            function deleteBook() {
                event.preventDefault();
                if (window.confirm('本当に削除しますか？')) {
                    document.getElementById('delete-form').submit();
                }
            }
        </script>
    @endif
@endsection
