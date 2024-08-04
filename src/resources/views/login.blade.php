@extends('index')

@section('content')

<form action="{{ route('signin') }}" method="post" class="form">
    @csrf
    <!-- メールアドレス -->
    <div class="title">
        <div class="title-inner">
            <p class="title-inner__top"><label for="email">メールアドレス</label></p>
            <input type="email" name="email" value="{{ old('email') }}" id="email" placeholder="email" class="title-inner__input" required>
        </div>
    </div>
    <!-- パスワード -->
    <div class="title">
        <div class="title-inner">
            <p class="title-inner__top"><label for="password">パスワード</label></p>
            <input type="password" name="password" value="" id="password" placeholder="password" class="title-inner__input" required>
        </div>
    </div>
    <!-- 送信 -->
    <div class="submit">
        <button type="submit" class="submit-button">ログイン</button>
    </div>
</form>

@endsection