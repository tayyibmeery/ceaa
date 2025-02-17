<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="ETA">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ETA Login</title>

    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('frontend/assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
</head>
<body class="breakpoint-md b--responsive">

<div class="body-inner">
    <section class="fullscreen" data-bg-parallax="{{ asset('frontend/images/slider/5.jpg') }}">
        <div class="parallax-container img-loaded" data-bg="{{ asset('frontend/images/pages/1.jpg') }}" data-velocity="-.140"></div>
        <div class="container">
            <div>
                <div class="row">
                    <div class="text-center m-b-30" style="margin-top: -180px;">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('frontend/images/logo/eta-logo.png') }}" alt="ETA Logo" style="width: 220px;">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 center p-50 background-white b-r-6">
                        <h3>Login to your Account</h3>
                        @yield('content')
                        <p class="small">Don't have an account yet? <a href="{{ route('register') }}">Register New Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<a id="scrollTop" style="bottom: 16px; opacity: 0;"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

<script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/assets/js/functions.js') }}"></script>
<script src="https://unpkg.com/imask"></script>
<script>
    // JavaScript for toggle password visibility and CNIC mask
    $(document).ready(function () {
        const togglePassword = (selector) => {
            $(selector).click(function (e) {
                e.preventDefault();
                const input = $(this).parent().parent().find('.password');
                const type = input.attr('type');
                input.attr('type', type === 'password' ? 'text' : 'password');
                $(this).toggleClass('fa-eye-slash fa-eye');
            });
        };

        togglePassword('#togglePassword');
        togglePassword('#togglePassword1');

        const cnicElement = document.getElementById('cnic');
        if (cnicElement) {
            IMask(cnicElement, { mask: '00000-0000000-0' });
        }
    });
</script>
</body>
</html>
