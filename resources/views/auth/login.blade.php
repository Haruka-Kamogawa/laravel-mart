@extends('layouts.app')

@section('content')
    
<div class="container pt-5">
   <div class="row justify-content-center">
       <div class="col-md-5">
           <h1 class="mt-3 mb-3">{{ __('messages.login.title') }}</h1>

           <hr class="mb-4">
           <form method="POST" action="{{ route('login') }}">
               @csrf

               <div class="form-group mb-3">
                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('messages.login.email_placeholder') }}">

                   @error('email')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ __('messages.login.email_error') }}</strong>
                   </span>
                   @enderror
               </div>

               <div class="form-group mb-3">
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror login-input" name="password" required autocomplete="current-password" placeholder="{{ __('messages.login.password_placeholder') }}">

                   @error('password')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ __('messages.login.password_error') }}</strong>
                   </span>
                   @enderror
               </div>

               <div class="form-group mb-3">
                   <div class="form-check">
                       <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                       <label class="form-check-label check-label w-100" for="remember">
                           {{ __('messages.login.remember_me') }}
                       </label>
                   </div>
               </div>

               <div class="form-group">
                   <button type="submit" class="btn submit-button w-100">
                       {{ __('messages.login.submit') }}
                   </button>

                   <a class="btn btn-link d-flex justify-content-center login-text" href="{{ route('password.request') }}">
                       {{ __('messages.login.forgot_password') }}
                   </a>
               </div>
           </form>

           <hr>

           <div class="form-group">
               <a class="fw-bold btn btn-link d-flex justify-content-center login-text" href="{{ route('register') }}">
                   {{ __('messages.login.signup') }}
               </a>
           </div>
       </div>
   </div>
</div>
@endsection