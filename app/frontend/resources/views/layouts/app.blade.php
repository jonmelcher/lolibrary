<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png" sizes="any">
    <title>{{ $title or config('app.name', 'Lolibrary') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="search-endpoint" content="{{ route('api.search') }}">
    <meta name="default-image" content="{{ default_asset() }}">

    @include('components.external.font-awesome')

    <!-- Styles -->
    <link href="{{ mix('assets/app.css') }}" rel="stylesheet">

    @yield('meta', '')
</head>
<body>
    <a class="sr-only sr-only-focusable" href="#skip-navigation">{{ __('Skip to content') }}</a>
    <div id="app" style="margin-top: 55px">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="height: 14px" src="{{ asset('images/logo_horizontal.png') }}" alt="Lolibrary logo">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li><a class="nav-link" href="{{ route('donate') }}">{{ __('Donate') }}</a></li>
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            @include('components.navbar.dropdown')
                        @endguest

                        <li class="d-sm-none"><a class="nav-link" href="{{ route('search') }}">{{ __('Search') }}</a></li>
                    </ul>

                    <form class="form-inline pl-md-3 d-none d-sm-flex" action="{{ route('search') }}" method="get">
                        <input class="form-control mr-sm-2" name="search" autocomplete="off" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="far fa-search" aria-label="Search Icon"></i></button>
                    </form>
                </div>
            </div>
        </nav>

        @if (config('app.banner.show'))
            <div class="alert-fullwidth text-center alert alert-{{ config('app.banner.style', 'info') }}" role="alert">
                {{ config('app.banner.content') }}
            </div>
        @endif

        @if (session('status'))
            <div class="alert-fullwidth text-center alert alert-primary" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <main class="py-4" id="skip-navigation">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('assets/app.js') }}"></script>
    @yield('script', '')
</body>
</html>
