@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center my-4">
    <div class="w-50">

        @if (session('flash_message'))
            <div class="alert alert-success">{{ session('flash_message') }}</div>
        @endif

        <h2 class="mb-4">{{ __('messages.mypage.title') }}</h1>

        <hr>

        {{-- Account Details --}}
        <div class="row align-items-center mb-3">
            <div class="col-2 d-flex justify-content-center">
                <i class="fas fa-user fa-3x"></i>
            </div>
            <div class="col-9 d-flex flex-column justify-content-center">
                <label for="user-name">{{ __('messages.mypage.edit_account_title') }}</label>
                <p>{{ __('messages.mypage.edit_account_description') }}</p>
            </div>
            <div class="col-1 d-flex justify-content-end">
                <a href="{{ route('mypage.edit') }}">
                    <i class="fas fa-chevron-right fa-2x"></i>
                </a>
            </div>
        </div>

        <hr>

        {{-- Order History --}}
        <div class="row align-items-center mb-3">
            <div class="col-2 d-flex justify-content-center">
                <i class="fas fa-archive fa-3x"></i>
            </div>
            <div class="col-9">
                <label for="user-name">{{ __('messages.mypage.order_history_title') }}</label>
                <p>{{ __('messages.mypage.order_history_description') }}</p>
            </div>
            <div class="col-1 d-flex justify-content-end">
                <a href="{{ route('mypage.orders') }}">
                    <i class="fas fa-chevron-right fa-2x"></i>
                </a>
            </div>
        </div>

        <hr>

        {{-- Change Password --}}
        <div class="row align-items-center mb-3">
            <div class="col-2 d-flex justify-content-center">
                <i class="fas fa-lock fa-3x"></i>
            </div>
            <div class="col-9">
                <label for="user-name">{{ __('messages.mypage.change_password_title') }}</label>
                <p>{{ __('messages.mypage.change_password_description') }}</p>
            </div>
            <div class="col-1 d-flex justify-content-end">
                <a href="{{ route('mypage.edit_password') }}">
                    <i class="fas fa-chevron-right fa-2x"></i>
                </a>
            </div>
        </div>

        <hr>

        {{-- Log out --}}
        <div class="row align-items-center mb-3">
            <div class="col-2 d-flex justify-content-center">
                <i class="fas fa-sign-out-alt fa-3x"></i>
            </div>
            <div class="col-9">
                <label for="user-name">{{ __('messages.mypage.logout_title') }}</label>
                <p>{{ __('messages.mypage.logout_description') }}</p>
            </div>
            <div class="col-1 d-flex justify-content-end">
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-chevron-right fa-2x"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        <hr>

    </div>
</div>
@endsection