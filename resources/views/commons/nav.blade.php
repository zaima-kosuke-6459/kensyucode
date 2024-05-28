<header>
    <div>
        @if (\Auth::user())
        こんにちは、{{\Auth::user()->name}}さん
        @endif
<ul class="navigation">
    <li>
        <a href="{{ route('books.index') }}">書籍検索へ</a>
    </li>
    @if (\Auth::user())
    <li>
        <a href="{{ route('borrowbooks.index')}} ">貸出状況へ</a>
    </li>
    <li>
        <a href="{{ route('users.index') }}">会員管理へ</a>
    </li>
    <li>
        <a href="{{ route('admins.index') }}">管理ユーザ管理へ</a>
    </li>
    <li>
        <a href="#" onclick="logout()">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="post">@csrf</form>
        <script type="text/javascript">
            function logout(){
                document.getElementById('logout-form').submit();
            }
        </script>
    </li>
    @else
    <li>
        <a href="{{ route('login') }}">ログイン</a>
    </li>
    @endif
</ul>
</div>
</header>
