<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRCode</title>
</head>

<body>

    {!! QrCode::size('400')->generate('Hello') !!}
</body>

</html>