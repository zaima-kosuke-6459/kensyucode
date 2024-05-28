<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 検索結果取得
        $categories = BookCategory::all();
        $search_keyword = "";
        $search_category_id = "";
        $search_author = "";

        $query = Book::query();

        if($request->keyword)
        {
            $search_keyword = $request->keyword;
            $query->where('name', 'LIKE', '%'. $search_keyword. '%');
        }

        if($request->category_id)
        {
            $search_category_id = $request->category_id;
            $query->where('category_id' , '=', $search_category_id);
        }
        if($request->author)
        {
            $search_author = $request->author;
            $query->where('author', 'LIKE', '%'. $search_author. '%');
        }
        $books = $query
        ->bookSort($request->order,$request->order_flag)
        ->simplePaginate(10);
        $count = $books->count();

        // 貸出テーブルにてreturn_dateがnullのbook_idの配列を取得
        $borrowings = BorrowedBook::where('return_date', NULL)->select('book_id')->get()->toArray();

        return view('books.index', ['books' => $books, 'categories' => $categories,
        'search_category_id' => $search_category_id, 'search_keyword' => $search_keyword,
        'search_author' => $search_author, 'borrowings' => $borrowings, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BookCategory::all();
        $book = new Book;
        $this->authorize($book);
        return view('books.create', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required|max:135',
            'author' => 'required|max:60',
            'publisher' => 'required|max:137',
            'publication_date' => 'required'
        ]);

        $book = new Book;
        $this->authorize($book);
        $book->create($request->all());
        return redirect(route('books.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book) //show($id) show(Book $book)
    {
        //
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $this->authorize($book);
        $categories = BookCategory::all();
        return view('books.edit', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required|max:135',
            'author' => 'required|max:60',
            'publisher' => 'required|max:137',
            'publication_date' => 'required'
        ]);
            $this->authorize($book);
            $book->update($request->all());
            return redirect(route('books.show', $book));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize($book);
        $book->delete();
        return redirect(route('books.index'));
    }
}
