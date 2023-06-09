<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Rotiku</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="keywords" content="Cakes Bakery Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="{{ asset('assetsFrontend/css/bootstrap.css')}}">
	<!-- Bootstrap-Core-CSS -->
	{{-- <link href="{{ asset('assetsFrontend/css/login_overlay.css')}}" rel='stylesheet' type='text/css' /> --}}

	<link rel="stylesheet" href="{{ asset('assetsFrontend/css/style.css')}}" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="{{ asset('assetsFrontend/css/fontawesome-all.css')}}">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Oxygen:300,400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Pacifico&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
	<!-- //Web-Fonts -->

	{{-- card-shop --}}
	<link rel="stylesheet" href="{{ asset('assetsFrontend/css/card.css')}}">
	{{-- //card-shop --}}

	{{-- invoice  --}}
	<link rel="stylesheet" href="{{asset('assetsFrontend/css/invoice.css')}}">
	{{-- //invoice --}}

	{{-- menu roti page style --}}
	<link rel="stylesheet" href="{{asset('assetsFrontend/css/menuroti.css')}}">
	{{-- //menu roti page style --}}

	{{-- product --}}
		<link rel="stylesheet" href="{{asset('assetsFrontend/css/cardProduct.css')}}">
	{{-- //product --}}


	{{-- beli --}}
		<link rel="stylesheet" href="{{asset('assetsFrontend/css/beli.css')}}">
	{{-- //beli --}}

	{{-- bootstap-icon --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	{{-- //bootstap-icon --}}

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	{{-- bootstap  --}}
	<link rel="stylesheet" href="{{asset('assetsFrontend/css/daftar.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	{{-- bootstap  --}}

	{{-- filter  --}}
	<link rel="stylesheet" href="{{asset('assetsFrontend/css/filter.css')}}">
	{{-- //filter  --}}

	{{-- Jquery --}}
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	{{-- //Jquery --}}

	{{-- notif --}}
	<link rel="stylesheet" href="{{asset('assetsFrontend/css/notif.css')}}">
	{{-- //notif --}}

	{{-- cart --}}
	<link rel="stylesheet" href="{{asset('assetsFrontend/css/cart.css')}}">
	{{-- //cart --}}

	{{-- berbagai-penawaran --}}
	<link rel="stylesheet" href="{{asset('assetsFrontend/css/berbagaipenawaran.css')}}">
	{{-- //berbagai-penawaran --}}

	{{-- daftar driver --}}
	<link rel="stylesheet" href="{{asset('assetsFrontend/css/daftardriver.css')}}">
	{{-- //daftar driver --}}

</head>
