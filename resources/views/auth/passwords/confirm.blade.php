@extends('layouts.app')

@section('content')
    @if (env('APP_REST_PASS'))
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
                                <h4>{{ __('Confirm Password') }}</h4>
                                {{ __('Please confirm your password before continuing.') }}
                                <form class="pt-3" method="POST" action="{{ route('password.confirm') }}">
                                    @csrf

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
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="{{ __('Confirm Password') }}"
                                            required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mt-3 d-grid gap-2">
                                        <button type="submit"
                                            class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                            {{ __('Confirm Password') }}
                                        </button>
                                    </div>

                                    <div class="text-center mt-4 font-weight-light">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" type="button" class="text-primary">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
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
    @endif
@endsection
