<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pra</title>
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <link href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" rel="stylesheet">
</head>

<body>

    <form action="{{ route('store') }}" class="form" method="post">
        @csrf
        <p class="form-title">満足度</p>
        <div class="form-rating">
            <input class="form-rating__input" id="star5" name="rating" type="radio" value="5">
            <label class="form-rating__label" for="star5"><i class="fa-solid fa-star"></i></label>

            <input class="form-rating__input" id="star4" name="rating" type="radio" value="4">
            <label class="form-rating__label" for="star4"><i class="fa-solid fa-star"></i></label>

            <input class="form-rating__input" id="star3" name="rating" type="radio" value="3">
            <label class="form-rating__label" for="star3"><i class="fa-solid fa-star"></i></label>

            <input class="form-rating__input" id="star2" name="rating" type="radio" value="2">
            <label class="form-rating__label" for="star2"><i class="fa-solid fa-star"></i></label>

            <input class="form-rating__input" id="star1" name="rating" type="radio" value="1">
            <label class="form-rating__label" for="star1"><i class="fa-solid fa-star"></i></label>

        </div>
        @error('rating')
        <p class="error">{{ $message }}</p>
        @enderror
        <button type="submit">送信</button>
    </form>



    <script src="{{ asset('js/test.js') }}"></script>

</body>

</html>