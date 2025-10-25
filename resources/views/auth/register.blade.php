@extends('layouts.app')

@section('content')
    
<div class="container pt-5">
   <div class="row justify-content-center">
       <div class="col-md-5">
           <h1 class="mb-3">{{ __('messages.register.title') }}</h1>

           <hr class="mb-4">

           <form method="POST" action="{{ route('register') }}">
               @csrf

               <div class="form-group row mb-3">
                   <label for="name" class="col-md-5 col-form-label text-md-left">{{ __('messages.register.name') }}<span class="text-danger"> *</span></label>

                   <div class="col-md-7">
                       <input id="name" type="text" class="form-control @error('name') is-invalid @enderror login-input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('messages.register.name_placeholder') }}">

                       @error('name')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ __('messages.register.name_error') }}</strong>
                       </span>
                       @enderror
                   </div>
               </div>

               <div class="form-group row mb-3">
                   <label for="email" class="col-md-5 col-form-label text-md-left">{{ __('messages.register.email') }}<span class="text-danger"> *</span></label>

                   <div class="col-md-7">
                       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror login-input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('messages.register.email_placeholder') }}">

                       @error('email')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ __('messages.register.email_error') }}</strong>
                       </span>
                       @enderror
                   </div>
               </div>

               <div class="form-group row mb-3">
                   <label for="postal_code" class="col-md-5 col-form-label text-md-left">{{ __('messages.register.postal_code') }}<span class="text-danger"> *</span></label>

                   <div class="col-md-7">
                       <input type="text" class="form-control @error('postal_code') is-invalid @enderror login-input" name="postal_code" required placeholder="{{ __('messages.register.postal_code_placeholder') }}">
                   </div>
               </div>

               <div class="form-group row mb-3">
                   <label for="address" class="col-md-5 col-form-label text-md-left">{{ __('messages.register.address') }}<span class="text-danger"> *</span></label>

                   <div class="col-md-7">
                       <input type="text" class="form-control @error('address') is-invalid @enderror login-input" name="address" required placeholder="{{ __('messages.register.address_placeholder') }}">
                   </div>
               </div>

               <div class="form-group row mb-3">
                   <label for="phone" class="col-md-5 col-form-label text-md-left">{{ __('messages.register.phone') }}<span class="text-danger"> *</span></label>

                   <div class="col-md-7">
                       <input type="text" class="form-control @error('phone') is-invalid @enderror login-input" name="phone" required placeholder="{{ __('messages.register.phone_placeholder') }}">
                   </div>
               </div>

               <div class="form-group row mb-3">
                   <label for="password" class="col-md-5 col-form-label text-md-left">{{ __('messages.register.password') }}<span class="text-danger"> *</span></label>

                   <div class="col-md-7">
                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror login-input" name="password" required autocomplete="new-password" placeholder="{{ __('messages.register.password_placeholder') }}">

                       @error('password')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ __('messages.register.password_error') }}</strong>
                       </span>
                       @enderror
                   </div>
               </div>

               <div class="form-group row mb-4">
                   <label for="password-confirm" class="col-md-5 col-form-label text-md-left">{{ __('messages.register.password_confirm') }}<span class="text-danger"> *</span></label>

                   <div class="col-md-7">
                       <input id="password-confirm" type="password" class="form-control login-input" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('messages.register.password_confirm_placeholder') }}">
                   </div>
               </div>

               <hr class="mb-4">

               <div class="form-group">
                   <button type="submit" class="btn submit-button w-100">
                       {{ __('messages.register.submit') }}
                   </button>
               </div>
           </form>
       </div>
   </div>
</div>
@endsection