@csrf
<dl>
    <dt>カテゴリ</dt>
    <dd>
        <select class="select_box" name="category_id">
            <option value="">(未選択)</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @if(isset($book->category->id) && $category->id == $book->category->id)
                selected
                @endif
            >{{ $category->name }}</option>
            @endforeach
        </select>
    </dd>
    <dt>書籍名</dt>
    <dd>
        <input type="text" name="name"
                value="{{ old('name', $book->name) }}">
    </dd>
    <dt>著者</dt>
    <dd>
        <input type="text" name="author"
                value="{{ old('author', $book->author) }}">
    </dd>
    <dt>出版社</dt>
    <dd>
        <input type="text" name="publisher"
                value="{{ old('publisher', $book->publisher) }}">
    </dd>
    <dt>出版日</dt>
    <dd>
        <input type="date" name="publication_date"
                value="{{ old('publication_date', $book->publication_date) }}">
    </dd>
</dl>
