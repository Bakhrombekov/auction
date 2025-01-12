<!doctype html>

<html
    lang="en"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('assets/') }}"
    data-template="vertical-menu-template-no-customizer"
    data-style="light">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>@yield('title') {{ config('app.name') }}</title>

    <meta name="description" content="{{ config('app.name') }}"/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}"/>

    @include('layout._partials.style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
</head>

<body>
<!-- Content -->

<div class="authentication-wrapper authentication-cover">
    <!-- Logo -->
    <a href="{{ route('dashboard.index') }}" class="auth-cover-brand d-flex align-items-center gap-2">
              <span class="app-brand-logo demo">
                <span style="color: var(--bs-primary)">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                         width="900.000000pt" height="512.000000pt" viewBox="0 0 900.000000 512.000000"
                         preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                               fill="#666cff" stroke="none">
                                <path d="M4321 5044 c-82 -22 -172 -70 -245 -130 -159 -131 -246 -304 -246
                                -489 l0 -70 78 -25 c172 -56 390 -184 607 -357 140 -111 436 -406 545 -543
                                165 -207 307 -451 362 -622 l23 -71 95 6 c162 9 290 69 414 193 79 78 125 150
                                164 252 24 60 26 81 26 202 1 171 -20 250 -115 439 -225 446 -782 981 -1201
                                1155 -176 73 -373 96 -507 60z"/>
                                <path d="M3448 4108 c-247 -28 -494 -251 -553 -499 -27 -114 -29 -111 81 -143
                                118 -36 319 -133 439 -213 421 -280 850 -745 1045 -1133 43 -85 120 -300 120
                                -335 0 -13 276 -295 808 -826 851 -850 848 -847 976 -884 82 -24 239 -17 316
                                14 127 52 239 164 291 291 31 77 38 234 14 316 -37 128 -31 122 -936 1029
                                l-858 860 -26 90 c-72 248 -268 538 -565 835 -431 431 -823 634 -1152 598z"/>
                                <path d="M2500 3215 c-205 -52 -383 -212 -463 -413 -26 -66 -31 -94 -35 -192
                                -5 -139 10 -218 67 -361 94 -234 272 -479 547 -753 213 -214 419 -368 626
                                -471 181 -90 260 -110 428 -109 121 0 142 2 202 26 101 38 173 85 252 163 123
                                122 184 253 193 416 14 248 -99 516 -355 839 -92 117 -397 422 -512 514 -195
                                154 -419 280 -580 326 -97 28 -290 36 -370 15z"/>
                            </g>
                    </svg>
                </span>
              </span>
        <span class="app-brand-text demo menu-text fw-semibold ms-2">{{ config('app.name') }}</span>
    </a>

    <!-- /Logo -->
    <div class="authentication-inner row m-0">

        <!-- Content -->
        @yield('content')
        <!-- /Content -->
    </div>
</div>

<!-- / Content -->

@include('layout._partials.script')

<script src="{{ asset('assets/js/pages-auth.js') }}"></script>
</body>
</html>
