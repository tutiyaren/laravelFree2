<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRCode</title>
</head>

<body>

    <h1>QRコード表示</h1>
    <a href="{{ route('qrCode', ['id' => 1]) }}">AのQRコード表示</a>
    <a href="{{ route('qrCode', ['id' => 2]) }}">BのQRコード表示</a>
    <a href="{{ route('qrCode', ['id' => 3]) }}">CのQRコード表示</a>


    @yield('contents')

</body>

</html>