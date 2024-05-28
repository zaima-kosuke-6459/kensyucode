@extends('layouts.app')

@section('title','会員詳細')

@section('content')
    <h1>会員詳細</h1>

    <a href="{{ route('users.edit',$user) }}">会員情報を編集</a>
    <!-- 会員詳細表示テーブル -->
    <table class="show_table">
        <tr>
            <th>会員ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>会員名</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $user->address }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $user->tel }}</td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>作成日</th>
            <td>{{ $user->created_at->format('Y年m月d日') }}</td>
        </tr>
    </table>

    <!-- 削除処理 -->
    <form action="{{ route('users.destroy',$user) }}" method="post" onSubmit="return deleteCheck()">
        @csrf
        @method('delete')
        <div>
            <button class="delete_button">削除</button>
        </div>
    </form>
    <!-- 一覧画面に戻る -->
    <a href="{{ route('users.index') }}">戻る</a>
@endsection

<!-- チェックダイヤログ表示用関数（JS） -->
<script type="text/javascript">
    function deleteCheck(){
        if(window.confirm('削除してよろしいですか？')){
            return true;
        }
    return false;
    }
</script>
