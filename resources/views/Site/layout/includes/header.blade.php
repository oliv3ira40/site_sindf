<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180931553-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-180931553-1');
    </script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>@yield('title')</title>

    <!-- Favicons-->
    @if (HelpAppearanceSetting::getFavicon())
        <link rel="shortcut icon" href="{{ asset(HelpAdmin::getStorageUrl().HelpAppearanceSetting::getFavicon()->favicon) }}">
    @else
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">
    @endif
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('site/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/vendors.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/icon_fonts/css/all_icons_min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/assets/font-awesome/css/font-awesome.min.css') }}">
    
    <!-- REVOLUTION STYLE SHEETS -->
    <link href="{{ asset('site/rev-slider-files/css/settings.css') }}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{ asset('site/css/blog.css') }}" rel="stylesheet">
    
    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('css/my-css.css') }}" rel="stylesheet">
</head>

<body>
	
	{{-- <div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div> --}}
    <!-- /Preload-->
    
    <div id="page">