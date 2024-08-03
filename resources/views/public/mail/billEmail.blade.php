<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đặt hàng thành công</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1>Bạn đã đặt thành công đơn hàng</h1>
    <p>Moho cảm ơn bạn đã tin tưởng sử dụng sản phẩm của chúng tôi. Moho chúng tôi sẵn sàng phục vụ bạn mọi lúc mọi thời điểm</p>
    <p><a href="{{ route('orders.index') }}"><Button class="px-2 py-4 text-green-500" style="">Đi tới đơn hàng</Button></a></p>
    <p>Moho chân trọng cảm ơn quý khách</p>
    <p>Công ty Moho</p>
</body>
</html>