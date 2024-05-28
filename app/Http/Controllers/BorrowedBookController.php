<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use App\Models\User;
use App\Models\Book;
use App\Models\Admin;
use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $borrowedbooks = BorrowedBook::with('book')->with('user')->with('admin')->get();
        
        return view('borrowbooks.index', ['borrowedbooks' => $borrowedbooks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('borrowbooks.create',['error'=>'']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        //
        $borrowed_books = BorrowedBook::where('book_id',$request->book_id)->orderBy('updated_at','desc')->first();
        if(BorrowedBook::where('book_id',$request->book_id)->count()){
            $data = ['parameter' => $borrowed_books->return_date];
            $rules = ['parameter' => 'date'];
    
            $flg=\Validator::make($data, $rules)->passes();  // false
            if(!$flg){
                return view('borrowbooks.create',['error'=>'・現在貸出中の書籍です']);
            }
        }

        $request->validate([
            'user_id'=>['required','exists:users,id'],
            'book_id'=>['required','exists:books,id'],
        ]);
        
       BorrowedBook::create([
            'user_id'=>$request->user_id,
            'book_id'=>$request->book_id,
            'admin_id'=>\Auth::user()->id,
            'borrowed_date'=>now()->format('Y-m-d'),
            'return_due_date'=>date('Y-m-d', strtotime(now() . '+2 weeks'))
        ]);
        return redirect(route('borrowbooks.index',));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return \Illuminate\Http\Response
     */
    public function show(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = Admin::all();
        $borrowed_book = BorrowedBook::find($id);
        return view('borrowbooks.edit', ['borrowed_book' => $borrowed_book, 'admins' => $admins]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $request->validate([
            'user_id'=>['required','exists:users,id'],
            'book_id'=>['required','exists:books,id'],
            'borrowed_date'=>'required',
            'return_due_date'=>'required',
            
        ]);
        BorrowedBook::find($id)->update($request->all());
        return redirect(route('borrowbooks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $borrowed_book = BorrowedBook::find($id);
        $borrowed_book->delete();
        return redirect(route('borrowbooks.index'));
    }
}
