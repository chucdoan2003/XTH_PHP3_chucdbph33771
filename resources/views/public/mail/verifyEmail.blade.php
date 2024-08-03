<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Xin chào {{ $username }}</h1>
    <p>Rất vui mừng chào bạn khi bạn đăng ký tài khoản của công ty chúng tôi, bấm vào đây để xác thực <a href="{{ route('verify', $token) }}"><Button>Xác thực</Button></a></p>
</body>
</html>