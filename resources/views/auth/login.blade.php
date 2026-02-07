@extends('layouts.app')

@section('content')


<main class="login-container">
    <div class="container">
        <div class="row page-login d-flex align-items-center">
            <div class="section-left col-12 col-md-6">
                <h1 class="mb-4">We explore the new <br /> life much better</h1>
                <img 
                    src="frontend/images/login-images.jpg" 
                    alt="" 
                    class="w-75 d-none d-sm-flex" 
                />
            </div>
            <div class="section-right col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img 
                                src="{{ url('frontend/images/logo_nomads.png') }}" 
                                alt="" 
                                class="w-50 mb-4" 
                            />
                        </div>
                        <form method="POST" action="{{ route('login') }}" >
                            @csrf 
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Input Your Email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                            <div class="form-group">
                                <label for="password">{{ _('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Input Your Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">
                                    {{__('Remember Me') }}
                                </label>
                            </div>
                            <button type="submit" class="btn btn-login btn-block">
                                {{ __('Login') }}
                            </button>
                            <a href="{{ url('register')}}" class="btn btn-info btn-block text-decoration-none text-white">
                                Register 
                            </a>
                        </form>
                        <p class="text-center mt-4">
                            @if(Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
