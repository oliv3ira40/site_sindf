<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="StartProject">
        <meta name="author" content="StartProject">

        @if (HelpAppearanceSetting::getFavicon())
            <link rel="shortcut icon" href="{{ asset(HelpAdmin::getStorageUrl().HelpAppearanceSetting::getFavicon()->favicon) }}">
        @else
            <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">
        @endif

        <title>@yield('title')</title>

        <!-- App css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        
        <!-- Notification css (Toastr) -->
        <link href="{{ asset('admin/assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('admin/assets/js/modernizr.min.js') }}"></script>
		
		{{-- My css --}}
		<link href="{{ asset('css/my-css.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="{{ route('adm.index') }}" class="logo">
                    @if (HelpAppearanceSetting::getLogoWhiteBackground())
                        <img class="logo-login" src="{{ asset(HelpAdmin::getStorageUrl().HelpAppearanceSetting::getLogoWhiteBackground()->logo_for_white_background) }}" alt="logomarca">
                    @else
                        <span>
                            Start<span>Project</span>
                        </span>
                    @endif
				</a>
                {{-- <h5 class="text-muted m-t-0 font-600">Responsive Admin Dashboard</h5> --}}
			</div>
			