@extends('layouts.app')

@section('content')
    <div class="container-scroller">
        <x-modal.popup></x-modal.popup>
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo text-center">
                                <img src="../../assets/images/logo.png">
                            </div>
                            @if (env('APP_REGISTER'))
                                <h4>{{ __('Register') }}</h4>
                                <h6 class="font-weight-light">Sign in to continue.</h6>
                                <form class="pt-3" method="POST" method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="{{ __('Name') }}"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="{{ __('Email Address') }}"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="{{ __('Password') }}"
                                            value="{{ old('password') }}" required autocomplete="password" autofocus>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                            id="password-confirm" name="password_confirmation"
                                            placeholder="{{ __('Confirm Password') }}" required
                                            autocomplete="new-password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mt-3 d-grid gap-2">
                                        <button type="submit"
                                            class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                    @if (env('APP_RESET_PASS'))
                                        <div class="my-2 d-flex justify-content-between align-items-center">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}"
                                                    class="auth-link text-primary">{{ __('Forgot Your Password?') }}</a>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="text-center mt-4 font-weight-light"> Do have an account?
                                        <a href="/login" type="button" class="text-primary">
                                            {{ __('Login') }}
                                        </a>
                                    </div>
                                </form>
                            @else
                                <div class="text-center">
                                    <i class="fa fa-info-circle text-info" style="font-size: 60px;"></i>
                                    <h5>Service is currently unavailable</h5>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Do have an account?
                                    <a href="/login" type="button" class="text-primary">
                                        {{ __('Login') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
