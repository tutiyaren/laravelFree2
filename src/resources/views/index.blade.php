<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID</title>
</head>

<body>

    <header>
        
        <form action="{{ route('logout') }}" method="post" class="logout">
            @csrf
            <button type="submit" class="logout-button">ログアウト</button>
        </form>
        
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>