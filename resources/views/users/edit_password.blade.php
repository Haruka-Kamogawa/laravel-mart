@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <span>
                <a href="{{ route('mypage') }}">{{ __('messages.mypage.title') }}</a> > {{ __('messages.edit_password.title') }}
            </span>

            <h2 class="mt-3 mb-3">{{ __('messages.edit_password.title') }}</h2>
            <hr>

            <form method="post" action="{{route('mypage.update_password')}}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="password" class="form-label text-md-right">{{ __('messages.edit_password.new_password') }}</label>
                    </div>

                    <div class="collapse show">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="password-confirm" class="form-label text-md-right">{{ __('messages.edit_password.confirm_password') }}</label>
                    </div>

                    <div class="collapse show">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <hr>

                <button type="submit" class="btn submit-button w-25">
                    {{ __('messages.edit_password.save') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection