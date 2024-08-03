<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  
</head>
<body>
    <div class="container mx-auto" style="min-height: 1024px;">
        <div class="flex flex-row w-full">
            <div class="w-1/5 " >
                @include('layout.admin.aside')
            </div>
            <div class="flex-col flex-1" style="background-color: #EDEDED;min-height: 1024px"  >
                <div >
                    @include('layout.admin.header')
                </div>
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    
    </div>

</body>
</html>