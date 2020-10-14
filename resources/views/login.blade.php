@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-10">
            <div class="col-6">
                <form action="{{ route('login') }}" class="form-signin" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                    <p class="mt-5 mb-3 text-muted">© 2017-2020</p>
                </form>
            </div>     
        </div>
    </div>
@endsection
