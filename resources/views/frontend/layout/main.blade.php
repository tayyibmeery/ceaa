<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Elegant Testing Agency')</title>
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/logo.png') }}">

    <!-- Styles -->
    <link href="{{ asset('frontend/assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendors/css/forms/select/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendors/css/extensions/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/notification.css') }}" rel="stylesheet">
    @stack('styles')
    {{-- <style>
        section {
            padding: 0px !important;
        }

        #buttona {
            position: fixed;
            right: 0;
            top: 55%;
            z-index: 1000;
        }

        .CardBox {
            min-height: 120px;
            background-color: #fff;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.133) 0 1.6px 3.6px 0, rgba(0, 0, 0, 0.11) 0 0.3px 0.9px 0;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .boxColor {
            background-color: #f9f9fa;
            box-shadow: rgba(0, 0, 0, 0.133) 0 1.6px 3.6px 0, rgba(0, 0, 0, 0.11) 0 0.3px 0.9px 0;
            border-radius: 5px;
            min-height: 175px;
            margin-bottom: 10px;
            text-align: center;
            transition: all 0.5s ease;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .boxColorN {
            background-color: #23394E;
            min-height: 150px;
            padding: 40px 0;
            text-align: center;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
            border: 2px solid #23394E;
        }

        .d-m-t {
            margin-top: 40px !important;
        }

        .para-text {
            color: #000;
            font-size: 15px;
            text-transform: uppercase;
            font-weight: 500;
            word-spacing: 3px;
            text-align: center;
            padding: 15px 0px;
        }

        .para-textN {
            color: #000;
            font-size: 15px;
            font-weight: 500;
            word-spacing: 3px;
            text-align: center;
            padding: 15px 0px;
        }

    </style> --}}
    <style>
        section {
            padding: 0px !important;
        }

        #buttona {
            position: fixed;
            right: 0;
            top: 55%;
            z-index: 1000;
        }

        .CardBox {
            min-height: 120px;
            background-color: #fff;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.133) 0 1.6px 3.6px 0, rgba(0, 0, 0, 0.11) 0 0.3px 0.9px 0;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .boxColor {
            background-color: #26a550;
            box-shadow: rgba(0, 0, 0, 0.133) 0 1.6px 3.6px 0, rgba(0, 0, 0, 0.11) 0 0.3px 0.9px 0;
            border-radius: 5px;
            min-height: 175px;
            margin-bottom: 10px;
            text-align: center;
            transition: all 0.5s ease;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .boxColorN {
            background-color: #26a550;
            min-height: 150px;
            padding: 40px 0;
            text-align: center;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
            border: 2px solid #26a550;
        }

        .d-m-t {
            margin-top: 40px !important;
        }

        .para-text {
            color: #FFD700;
            font-size: 15px;
            text-transform: uppercase;
            font-weight: 500;
            word-spacing: 3px;
            text-align: center;
            padding: 15px 0px;
        }

        .para-textN {
            color: #FFD700;
            font-size: 15px;
            font-weight: 500;
            word-spacing: 3px;
            text-align: center;
            padding: 15px 0px;
        }

    </style>
</head>
<body class="breakpoint-lg b--desktop">
    <div class="body-inner">

        @include('frontend.layout.header')
        @include('frontend.layout.socialicon')


        <!-- Main Content -->
        <div class="main-content">


            @yield('content')



            @include('frontend.layout.footer')


        </div>
        <!-- Scroll to Top -->
        <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

        <!-- Scripts -->
        <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/functions.js') }}"></script>

        <script src="{{ asset('frontend/js/vendors.min.js') }}"></script>
        <script src="{{ asset('frontend/js/datatables.min.js') }}"></script>
        <script src="{{ asset('frontend/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('frontend/js/form-select2.min.js') }}"></script>
        <script src="{{ asset('frontend/js/front.js') }}"></script>

        <script src="https://apis.google.com/js/platform.js"></script>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0&appId=481054275414885"></script>

        <!-- Additional JS -->


        @stack('scripts')
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
        <script src="https://apis.google.com/js/platform.js"></script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0&appId=481054275414885" nonce="MWeZBjTc"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    , 'Access-Control-Allow-Headers': '*'
                }
            });

            $(window).on('load', function() {
                $('#loading').hide();
            });

            $(document).ready(function() {
                notificationsTrigger();

                $('.date').datepicker({
                    format: 'dd-mm-yyyy'
                });
            });

            function notificationsTrigger() {
                $.ajax({
                    method: 'post'
                    , url: 'https://etapk.com/notifications'
                    , contentType: false
                    , processData: false
                    , dataType: 'json'
                    , success: function(res) {
                        if (res.status === 'ok') {
                            $('.counting').text(res.total_count);
                            $('.notificationsView').empty().append(res.view);
                            return true;
                        }
                        AdminApp.error(res.message);
                    }
                    , error: function(res) {
                        AdminApp.ajaxError(res);
                    }
                });
            }

            $('body').on('click', '.notification-link', function() {
                let $el = $(this);
                $.ajax({
                    method: 'post'
                    , url: 'https://etapk.com/notifications/mark'
                    , dataType: 'json'
                    , data: {
                        id: $el.data('id')
                    }
                    , success: function(res) {
                        location.href = $el.data('url');
                    }
                    , error: function(res) {
                        AdminApp.ajaxError(res);
                    }
                });
            });

            let pusher = new Pusher('fd21cf771ae29f649f85', {
                cluster: 'eu'
                , encrypted: true
            });
            Pusher.logToConsole = true;
            let channel = pusher.subscribe('notifications');
            channel.bind('NotificationChange', function() {
                notificationsTrigger();
            });

            $('#backgroundDiv').click(function() {
                closePopup();
            });

            function closePopup() {
                document.getElementById('backgroundDiv').className = 'modal-backdrop fade';
                document.getElementById('backgroundDiv').style.display = 'none';
                document.getElementById('popupDiv').style.display = 'none';
            }

        </script>
</body>
</html>
