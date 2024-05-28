@extends('layouts.app')

@section('title','貸出一覧画面')

@section('content')
<body>
<h1>貸出一覧画面</h1>
<a href="{{route('borrowbooks.create')}}">+新規貸出</a>
<table class="table">
            <thead>
            <th></th><th>貸出ID</th><th>会員名</th><th>書籍名</th><th>担当者名</th><th>貸出日</th><th>返却期限日</th><th>返却日</th><th></th>
            </thead>
            <tbody>
            @foreach($borrowedbooks as $borrowedBook)
                <tr>
                    <td><a href="{{route('borrowbooks.edit',$borrowedBook)}}">編集</a></td>
                    <td>{{ $borrowedBook->id }}</td>
                    <td>{{ $borrowedBook->user->name }}</td>
                    <td>{{ $borrowedBook->book->name }}</td>
                    <td>{{ $borrowedBook->admin->name }}</td>
                    <td>{{$borrowedBook->borrowed_date}}</td>
                    <td>{{$borrowedBook->return_due_date}}</td>
                    <td>@if(empty($borrowedBook->return_date))
                        <form action="{{route('borrowbooks.update',$borrowedBook->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="user_id" value="{{$borrowedBook->user_id}}">
                            <input type="hidden" name="book_id" value="{{$borrowedBook->book_id}}">
                            <input type="hidden" name="admin_id" value="{{$borrowedBook->admin_id}}">
                            <input type="hidden" name="borrowed_date" value="{{$borrowedBook->borrowed_date}}">
                            <input type="hidden" name="return_due_date" value="{{$borrowedBook->return_due_date}}">
                            <input type="hidden" name="return_date" value="{{date('Y-m-d')}}">

                            <button class="submit_button" type="submit">返却</button>
                        </form>
                        @else
                            {{$borrowedBook->return_date}}
                        @endif
                    </td>
                    <td>
                        <form action="{{route('borrowbooks.destroy',$borrowedBook)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="delete_button" type="submit">削除</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        </body>
</html>
@endsection
