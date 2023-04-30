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
        <div id="app">
            <div class="vh-100 d-flex justify-content-center align-items-center">
                <div class="container">
                  <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                      <div class="border border-3 border-primary"></div>
                      <div class="card bg-white shadow-lg">
                        <div class="card-body p-5">
                            <form method="POST" action="{{ route('login') }}" class="mb-3">
                                @csrf
                                <div class="d-flex justify-content-center">
                                    <img src="{{asset('/assets/images/logo.png')}}" class="navbar-logo mb-3" alt="Internations Logo">
                                </div>
                            <div class="mb-3">
                              <label for="email" class="form-label ">Email address</label>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label ">Password</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            <div class="d-grid">
                              <button class="btn btn-outline-dark mt-3" type="submit">Login</button>
                            </div>
                          </form>
                          @if (Route::has('register'))
                            <div>
                                <p class="mb-0  text-center">Don't have an account? 
                                    <a href="{{ route('register') }}" class="text-primary fw-bold">Register</a>
                                </p>
                            </div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </body>    

