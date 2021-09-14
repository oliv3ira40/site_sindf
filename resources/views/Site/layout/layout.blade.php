@include('Site.layout.includes.header')
@include('Site.layout.includes.menu')

@yield('content')

@include ('cookieConsent::index');
@include('Site.layout.includes.footer')