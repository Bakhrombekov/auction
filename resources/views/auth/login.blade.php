@extends('layout.blank')

@section('content')
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-12 pb-2">
        <img
            src="{{ asset('assets/img/illustrations/auth-login-illustration-light.png') }}"
            class="auth-cover-illustration w-100"
            alt="auth-illustration"/>
        <img
            src="{{ asset('assets/img/illustrations/auth-cover-login-mask-light.png') }}"
            class="authentication-image"
            alt="mask"/>
    </div>

    <div
        class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-12 px-12 py-6">
        <div class="w-px-400 mx-auto pt-5 pt-lg-0">
            <h4 class="mb-1">Welcome to {{ config('app.name') }}! 👋</h4>
            <p class="mb-5">Please sign-in to your account and start the adventure</p>

            <form id="formAuthentication" class="mb-5" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-floating form-floating-outline mb-5">
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        autofocus />
                    <label for="email">Email</label>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="mb-5">
                    <div class="form-password-toggle">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <label for="password">Password</label>
                            </div>
                            <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-5 d-flex justify-content-between mt-5">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }} />
                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign in</button>
            </form>

            <p class="text-center">
                <span>New on our platform?</span>
                <a href="{{ route('register') }}">
                    <span>Create an account</span>
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
