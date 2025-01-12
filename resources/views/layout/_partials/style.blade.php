
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
    rel="stylesheet"/>

<!-- Icons -->
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/remixicon/remixicon.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}"/>

<!-- Menu waves for no-customizer fix -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}"/>

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"/>

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
@yield('vendor-css')

<!-- Page CSS -->
@yield('page-css')

<!-- Helpers -->
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('assets/js/config.js') }}"></script>
