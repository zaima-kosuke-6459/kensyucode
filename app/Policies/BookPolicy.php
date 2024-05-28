<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    public function create(Admin $admin)
    {
        //
        return \Auth::User();
    }

    public function update(Admin $admin, Book $book)
    {
        //
        return \Auth::User();
    }

    public function delete(Admin $admin, Book $book)
    {
        //
        return \Auth::User();
    }

}
