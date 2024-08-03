<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  
</head>
<body>
    <div  style="width: 100%; height: 1024px; background-image:url('{{ asset('image/backgroundlogin2.jpg') }}');background-size: cover;" >
       
        <div style="position: absolute; top: 35%; left: 35%;background-color: #fff ; border-radius: 5px;">
            <div class="flex flex-row">
                <div>
                <img src="{{ asset('image/login.jpg') }}" style="width: 200px; height:" class="object-cover" alt="">
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <h3 class="text-2xl text-blue-500 font-semibold" style="text-align:center; margin: 16px 0 0 0;">Đăng nhập</h3>
                    <div style="background-color: #fff; padding: 8px 16px 0; border-radius: 10px;">
                        <label for="" class="" style="font-size: 18px;">Email</label>
                        <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="email">
                    </div>
                    <div style="background-color: #fff; padding: 4px 16px; border-radius: 10px;">
                        <label for="" class="" style="font-size: 18px;">Mật khẩu</label>
                        <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="password">
                        @error('password')
                            <div><span>{{ $message }}</span></div>
                        @enderror
                    </div>  
                    <div class="px-4 flex justify-between ">
                        <a href="">Quên mật khẩu...?</a>
                        <a href="{{ route('register') }}">Đăng ký</a>
                    </div>
                    <div class="px-4">
                        <button style="padding: 4px 16px; border: 2px solid #e57171;border-radius:10px; color:#F7F7F7; background-color: rgb(57, 190, 31); border: none; width: 100%; margin-top: 12px">Đăng nhập</button>
                    </div>
                </form>
            </div>
             
        </div>
    </div>
    
</body>
</html>