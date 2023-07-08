<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600;700;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,700;0,800;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assetsDriver/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('assetsDriver/css/listpesanan.css')}}">
    <link rel="stylesheet" href="{{asset('assetsDriver/css/transaksi.css')}}">
    <link rel="stylesheet" href="{{asset('assetsDriver/css/profile.css')}}">
    <title>Rotiku | driver</title>
</head>
<body>
    <div  class="{{ Request::is('driver') ? 'content-gradient' : 'content-white' }}">
        @yield('content')    
    </div>
</body>
</html>