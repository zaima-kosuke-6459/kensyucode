<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    protected $fillable = ['name','author','publisher','category_id','publication_date'];

    public function Category(){
        return $this->belongsTo(BookCategory::class);
    }

    public function BorrowedBooks(){
        return $this->HasMany(BorrowedBook::class);
    }
    //ローカルスコープ　書籍ID、発行日でソート
    public function scopeBookSort($query,$order,$orderFlag){
        if(!($order || $orderFlag)) return $query->orderBy('publication_date');
        return $query->orderBy($order,$orderFlag);
    }

}
