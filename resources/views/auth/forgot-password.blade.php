@extends('layouts.app')

@section('content')
    
<div class="container pt-5">
   <div class="row justify-content-center">
       <div class="col-md-5">
           <h1 class="mt-3 mb-3">{{ __('messages.forgot_password.title') }}</h1>

           <p>
               {{ __('messages.forgot_password.description') }}
           </p>

           <hr class="mb-4">

           @if (session('status'))
           <div class="alert alert-success" role="alert">
               {{ __('messages.forgot_password.status_success') }}
           </div>
           @endif


           <form method="POST" action="{{ route('password.email') }}">
               @csrf

               <div class="form-group mb-4">
                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('messages.forgot_password.email_placeholder') }}">

                   @error('email')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ __('messages.forgot_password.email_error') }}</strong>
                   </span>
                   @enderror
               </div>

               <div class="form-group">
                   <button type="submit" class="btn submit-button w-100">
                       {{ __('messages.forgot_password.submit') }}
                   </button>
               </div>
           </form>
       </div>
   </div>
</div>
@endsection