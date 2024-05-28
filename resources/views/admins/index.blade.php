
@extends('layouts.app')

@section('title','管理者一覧画面')

@section('content')
   <h1>管理者一覧</h1>
   <p><a href="{{route('admins.create')}}">＋管理者追加</a></p>
   <table class="table">
        <thead>
            <tr><th></th><th>ID</th><th>管理者名</th><th>メールアドレス</th></tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>
                    @if (\Auth::user()->id == $admin->id)
                        <a href="{{route('admins.edit',$admin)}}">編集</a>
                    @endif
                </td>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- <a href="#" onclick="logout()">ログアウト</a>
    <form id="logout-form" action="{{route('logout')}}" method="post">@csrf</form>
    <script type="text/javascript">
        function logout(){
            document.getElementById('logout-form').submit();
        }
    </script> -->

    <a href="#" onclick="withdrawal()">退会</a>
    <form id="delete-form" action="{{route('admins.destroy',\Auth::user())}}" method="post">
        @csrf
        @method('delete')
    </form>
    <script type="text/javascript">
        function withdrawal(){
            event.preventDefault();
            if(window.confirm('本当に削除しますか？\n※削除した場合データは元に戻りません')){
                document.getElementById('delete-form').submit();
            }
        }
    </script>
@endsection
