@extends('layouts.app')

@section('content')
    
<div class="container mt-5">
   <div class="row justify-content-center">
       <div class="col-md-5">
           <h3 class="text-center">{{ __('messages.register_confirmation.title') }}</h3>

           <p class="text-center">
               {{ __('messages.register_confirmation.temporary_status') }}
           </p>

           <p class="text-center">
               {{ __('messages.register_confirmation.check_email') }}
           </p>

           <p class="text-center">
               {{ __('messages.register_confirmation.click_link') }}
           </p>
           <div class="text-center">
               <a href="{{ url('/') }}" class="btn submit-button w-50 text-light">{{ __('messages.register_confirmation.go_home') }}</a>
           </div>
       </div>
   </div>
</div>
@endsection