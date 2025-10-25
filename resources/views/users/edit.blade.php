@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <span>
                <a href="{{ route('mypage') }}">{{ __('messages.mypage.title') }}</a> > {{ __('messages.edit_profile.title') }}
            </span>

            <h2 class="mt-3 mb-3">{{ __('messages.edit_profile.title') }}</h2>
            <hr>

            <form method="POST" action="{{ route('mypage') }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="name" class="text-md-left edit-user-info-label">{{ __('messages.edit_profile.name') }}</label>
                    </div>
                    <div class="collapse show editUserName">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('messages.edit_profile.error_name') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="email" class="text-md-left edit-user-info-label">{{ __('messages.edit_profile.email') }}</label>
                    </div>
                    <div class="collapse show editUserMail">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('messages.edit_profile.error_email') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="postal_code" class="text-md-left edit-user-info-label">{{ __('messages.esit_profile.postal_code') }}</label>
                    </div>
                    <div class="collapse show editUserPhone">
                        <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ $user->postal_code }}" required autocomplete="postal_code" autofocus>
                        @error('postal_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('messages.edit_profile.error_postal_code') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="address" class="text-md-left edit-user-info-label">{{ __('messages.edit_profile.address') }}</label>
                    </div>
                    <div class="collapse show editUserPhone">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('messages.edit_profile.error_address') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="phone" class="text-md-left edit-user-info-label">{{ __('messages.edit_profile.phone') }}</label>
                    </div>
                    <div class="collapse show editUserPhone">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __('messages.edit_profile.error_phone') }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn submit-button w-25">
                    {{ __('messages.edit_profile.save') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection