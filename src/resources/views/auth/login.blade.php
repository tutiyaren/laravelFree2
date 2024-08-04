@extends('index')

@section('content')

<form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- Email Address -->
    <div>
        <label for="email">メールアドレス</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <!-- Password -->
    <div>
        <label for="password">パスワード</label>
        <input id="password" type="password" name="password" required>
    </div>

    <!-- Remember Me -->
    <!-- <div>
        <input id="remember_me" type="checkbox" name="remember">
        <label for="remember_me">ログイン状態を保持する</label>
    </div> -->

    <div>
        <button type="submit">ログイン</button>
    </div>
</form>


@endsection