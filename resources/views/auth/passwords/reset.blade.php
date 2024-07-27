@extends('layouts.app')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo text-center">
                                <img src="../../assets/images/logo.png">
                            </div>
                            <h4>{{ __('Reset Password') }}</h4>
                            <form class="pt-3" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        id="email" placeholder="{{ __('Email Address') }}"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="{{ __('Password') }}" required
                                        autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-lg @error('password-confirm') is-invalid @enderror"
                                        id="password-confirm" name="password_confirmation"
                                        placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                                    @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>

                                <div class="text-center mt-4 font-weight-light"> Do have an account?
                                    <a href="/login" type="button" class="text-primary">
                                        {{ __('Login') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
