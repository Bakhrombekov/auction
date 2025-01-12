@extends('layout.blank')

@section('content')
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-12 pb-2">
        <img
            src="{{ asset('assets/img/illustrations/auth-register-illustration-light.png') }}"
            class="auth-cover-illustration w-100"
            alt="auth-illustration"/>
        <img
            src="{{ asset('assets/img/illustrations/auth-cover-register-mask-light.png') }}"
            class="authentication-image"
            alt="mask"/>
    </div>
    <div
        class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-12 px-12 py-6">
        <div class="w-px-400 mx-auto pt-5 pt-lg-0">
            <h1>{{ config('app.name') }}</h1>
            <h4 class="mb-1">Adventure starts here 🚀</h4>
            <p class="mb-5">Make your app management easy and fun!</p>

            <form id="formAuthentication" class="mb-5" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-floating form-floating-outline mb-5">
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        placeholder="Enter your Full Name"
                        autofocus/>
                    <label for="username">Full Name</label>
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-floating form-floating-outline mb-5">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"/>
                    <label for="email">Email</label>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mb-5 form-password-toggle">
                    <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"/>
                            <label for="password">Password</label>
                        </div>
                        <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-5 form-password-toggle">
                    <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                            <input
                                type="password"
                                id="password_confirmation"
                                class="form-control"
                                name="password_confirmation"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"/>
                            <label for="password_confirmation">Password confirmation</label>
                        </div>
                        <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                    </div>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-5">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required/>
                        <label class="form-check-label" for="terms-conditions">
                            I agree to
                            <a href="javascript:void(0);">privacy policy & terms</a>
                        </label>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
            </form>

            <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}">
                    <span>Sign in instead</span>
                </a>
            </p>

            <div class="divider my-5">
                <div class="divider-text">or</div>
            </div>

            <div class="d-flex justify-content-center gap-2">
                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-facebook">
                    <i class="tf-icons ri-facebook-fill"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-twitter">
                    <i class="tf-icons ri-twitter-fill"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-github">
                    <i class="tf-icons ri-github-fill"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-google-plus">
                    <i class="tf-icons ri-google-fill"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
@section('content1')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
