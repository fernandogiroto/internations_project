<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/images/favicon.ico') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Internations') }}</title>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div id="app" class="banner">
            <div class="vh-100 d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6">
                            <div class="border border-3 border-primary"></div>
                                <div class="card bg-white shadow-lg">
                                    <div class="card-body p-5">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>    
</html>
