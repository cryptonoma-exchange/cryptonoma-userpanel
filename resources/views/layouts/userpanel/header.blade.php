<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config("app.name") }}</title>
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ url('images/favicon.png') }}"> --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ url('css/userpanel/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('userpanel/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ url('css/userpanel/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/userpanel/user_new.css?v=1.0.2') }}">
    <link rel="stylesheet" href="{{ url('css/userpanel/toastr.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <style>
		[x-cloak] {
			display: none !important;
		}
		.toast {
			opacity: 1 !important;
		}
		#toast-container > div {
			opacity: 1 !important; 
		}
	</style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
</head>

<body class="">
    @php
        if (empty(Session::get('mode'))) {
            Session::put('mode', 'nightmode');
        }
        
    @endphp
