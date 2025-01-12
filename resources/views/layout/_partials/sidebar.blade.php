<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">
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

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.47365 11.7183C8.11707 12.0749 8.11707 12.6531 8.47365 13.0097L12.071 16.607C12.4615 16.9975 12.4615 17.6305 12.071 18.021C11.6805 18.4115 11.0475 18.4115 10.657 18.021L5.83009 13.1941C5.37164 12.7356 5.37164 11.9924 5.83009 11.5339L10.657 6.707C11.0475 6.31653 11.6805 6.31653 12.071 6.707C12.4615 7.09747 12.4615 7.73053 12.071 8.121L8.47365 11.7183Z"
                    fill-opacity="0.9"/>
                <path
                    d="M14.3584 11.8336C14.0654 12.1266 14.0654 12.6014 14.3584 12.8944L18.071 16.607C18.4615 16.9975 18.4615 17.6305 18.071 18.021C17.6805 18.4115 17.0475 18.4115 16.657 18.021L11.6819 13.0459C11.3053 12.6693 11.3053 12.0587 11.6819 11.6821L16.657 6.707C17.0475 6.31653 17.6805 6.31653 18.071 6.707C18.4615 7.09747 18.4615 7.73053 18.071 8.121L14.3584 11.8336Z"
                    fill-opacity="0.4"/>
            </svg>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <li class="menu-header mt-5">
            <span class="menu-header-text">References</span>
        </li>

        <li class="menu-item {{ (request()->is('category/*') or request()->is('category')) ? 'active' : '' }}">
            <a href="{{ route('category.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-bill-line"></i>
                <div>Category</div>
            </a>
        </li>

        {{--        <li class="menu-item">--}}
        {{--            <a href="{{ route('dashboard.index') }}" class="menu-link">--}}
        {{--                <i class="menu-icon tf-icons ri-layout-2-line"></i>--}}
        {{--                <div>Columns</div>--}}
        {{--            </a>--}}
        {{--        </li>--}}

        <li class="menu-item {{ (request()->is('classification/*') or request()->is('classification')) ? 'active' : '' }}">
            <a href="{{ route('classification.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-remixicon-line"></i>
                <div>Subject Classification</div>
            </a>
        </li>

        <li class="menu-item {{ (request()->is('material/*') or request()->is('material')) ? 'active' : '' }}">
            <a href="{{ route('material.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-box-3-line"></i>
                <div>Materials and types</div>
            </a>
        </li>

        <li class="menu-header mt-5">
            <span class="menu-header-text">Auction</span>
        </li>

        <li class="menu-item {{ (request()->is('product/*') or request()->is('product')) ? 'active' : '' }}">
            <a href="{{ route('product.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-copper-diamond-line"></i>
                <div>Products</div>
            </a>
        </li>

        <li class="menu-header mt-5">
            <span class="menu-header-text">Users</span>
        </li>
        <li class="menu-item">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ri-user-line"></i>
                <div>Users</div>
            </a>
        </li>
    </ul>
</aside>
