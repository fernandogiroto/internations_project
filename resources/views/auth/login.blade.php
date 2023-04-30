@extends('layouts.auth')
@section('content')
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
@endsection