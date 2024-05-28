<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use /*HasApiTokens,*/ HasFactory/*, Notifiable*/;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'tel',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function borrowedBooks()
    {
        return $this->belongsToMany(Book::class,'borrowed_books')->withTimestamps();
    }

    //ローカルスコープ　会員idを検索
    public function scopeSearchId($query,$searchId)
    {
        if(!$searchId) return;
        return $query->where('id',$searchId);
    }

    //ローカルスコープ　会員名で検索
    public function scopeSearchUser($query,$searchUser)
    {
        if(!$searchUser) return;
        return $query->where('name','LIKE','%' . $searchUser . '%');
    }

    //ローカルスコープ　会員ID、作成日でソート
    public function scopeUserSort($query,$order,$orderFlag){
        if(!($order || $orderFlag)) return $query->orderBy('created_at');
        return $query->orderBy($order,$orderFlag);
    }
}
