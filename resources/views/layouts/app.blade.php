<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">

    <title>@yield('title')</title>
</head>
<body>
    <header>
        <div class="container">
            <a class="brand" href="{{route('books.index')}}">{{config('app.name')}}</a>
            @include('commons.nav')
        </div>
    </header>
    <main>
    <div class="container">
        @yield('content')
    </div>
    </main>
</body>
</html>
