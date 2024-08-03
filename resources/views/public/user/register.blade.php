<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  
</head>
<body>
    <div  style="width: 100%; height: 1024px; background-image:url('{{ asset('image/backgroundlogin2.jpg') }}');background-size: cover;" >
        @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }} <a href="{{ route('auth.showlogin') }}"><Button>Đến đăng nhập</Button></a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        @endif

        @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        @endif
       
        <div style="position: absolute; top: 25%; left: 35%;background-color: #fff ; border-radius: 5px;">
            <div class="flex flex-row">
                <div >
                <img src="{{ asset('image/login.jpg') }}" style="width: 200px; height:100%" class="object-cover" alt="">
                </div>
                <form action="{{ route('register') }}" method="POST" >
                    @csrf
                    
                    <h3 class="text-2xl text-blue-500 font-semibold" style="text-align:center; margin: 16px 0 0 0;">Đăng ký</h3>
                    <div style="background-color: #fff; padding: 8px 16px 0; border-radius: 10px;">
                        <label for="" class="" style="font-size: 18px;">Name</label>
                        <input type="text" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="name" >
                    </div>
                    <div style="background-color: #fff; padding: 4px 16px; border-radius: 10px;">
                        <label for="" class="" style="font-size: 18px;">Password</label>
                        <input type="password" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="password">
                    </div>  
                    <div style="background-color: #fff; padding: 4px 16px; border-radius: 10px;">
                        <label for="" class="" style="font-size: 18px;">Enter a Password</label>
                        <input type="password" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="password_confirmation">
                    </div>  
                    <div style="background-color: #fff; padding: 4px 16px; border-radius: 10px;">
                        <label for="" class="" style="font-size: 18px;">Email</label>
                        <input type="email" class=" w-full my-2" style="outline-color: rgb(35, 172, 35);border: 1px solid rgba(0,0, 0, 0.4);border-radius: 6px; margin-top: 8px;padding: 3px 8px;" name="email">
                    </div>  
                     
                    
                    <div class="px-4 pb-4">
                        <button type="submit" style="padding: 4px 16px; border: 2px solid #e57171;border-radius:10px; color:#F7F7F7; background-color: rgb(57, 190, 31); border: none; width: 100%; margin-top: 12px">Đăng ký</button>
                    </div>
                </form>
            </div>
             
        </div>
    </div>
 

    
</body>
</html>