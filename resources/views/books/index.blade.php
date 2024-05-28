@extends('layouts.app')
@section('title','書籍情報検索画面')
@section('content')
    <h1>書籍検索</h1>
    @if (\Auth::user())
    <a href="{{ route('books.create') }}">+書籍情報登録</a>
    @endif
    <form action="{{ route('books.index') }}" method="get" id="booksearch">
        <p>キーワード：<input type="text" name="keyword" value="{{ $search_keyword }}"></p>
        <p>ジャンル：
        <select class="select_box" name="category_id">
            <option value="">(未選択)</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}"{{$search_category_id == $category->id ? " selected" : "" }}>
                {{ $category->name }}({{ $category->books->count()}}件)
            </option>
            @endforeach
        </select>
        </p>
        <p>著者：<input type="text" name="author" value="{{ $search_author }}"></p>
                <!-- ソートの基準選択 -->
                <p>表示順：<select name="order">
                    <option value="id" @if(request('order') == 'id') selected @endif>書籍ID</option>
                    <option value="publication_date" @if(request('order') == 'publication_date') selected @endif>出版日</option>
                </select>
                <!-- ソート順選択 -->
                <select name="order_flag">
                    <option value="asc" @if(request('order_flag') == 'asc') selected @endif>昇順</option>
                    <option value="desc" @if(request('order_flag') == 'desc') selected @endif>降順</option>
                </select></p>
        <p><button class="submit_button" type="submit">検索</button></p>
      </form>
      @if(empty($_GET["keyword"]) && empty($_GET["category_id"]) && empty($_GET["author"]))
      <p>キーワード、ジャンル、著者を入力して検索してください</p>
      @elseif($count === 0)
      <p>該当書籍なし</p>
      @else
      <p>検索結果：{{ $count }}件</p>
      <table class="table">
        <thead>
            <th>書籍名</th>
            <th>著者</th>
            <th>出版社</th>
            <th>出版日</th>
            <th>貸出状態</th>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td><a href="/books/{{ $book->id }}">{{ $book->name }}</a></td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->publication_date }}</td>
                <td>
                    @if(!is_bool(array_search($book->id, array_column($borrowings, 'book_id'))))
                    貸出中
                    @else
                    貸出可
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->links() }}
    @endif
@endsection
