<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hawaa Moslemwear</title>
    <link rel="icon" href="{{url('images/icon.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">


    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <style>
        /* popup */

        /* style untuk link popup */
        .popup-wrapper {
            z-index: 991;
        }

        a.popup-link {
            /* padding:17px 0; */
            text-align: center;
            margin: 10% auto;
            position: relative;
            width: 300px;
            color: #fff;
            text-decoration: none;
            background-color: #FFBA00;
            border-radius: 3px;
            box-shadow: 0 5px 0px 0px #eea900;
            display: block;
        }

        a.popup-link:hover {
            background-color: #ff9900;
            box-shadow: 0 3px 0px 0px #eea900;
            -webkit-transition: all 1s;
            transition: all 1s;
        }

        /* end link popup*/
        /* animasi popup */

        @-webkit-keyframes autopopup {
            from {
                opacity: 0;
                margin-top: -200px;
            }

            to {
                opacity: 1;
            }
        }

        @-moz-keyframes autopopup {
            from {
                opacity: 0;
                margin-top: -200px;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes autopopup {
            from {
                opacity: 0;
                margin-top: -200px;
            }

            to {
                opacity: 1;
            }
        }

        /* end animasi popup */
        /*style untuk popup */
        #popup {
            background-color: rgba(0, 0, 0, 0.8);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: 0;
            -webkit-animation: autopopup 2s;
            -moz-animation: autopopup 2s;
            animation: autopopup 2s;
        }

        #popup:target {
            -webkit-transition: all 1s;
            -moz-transition: all 1s;
            transition: all 1s;
            opacity: 0;
            visibility: hidden;
        }

        @media (min-width: 500px) {
            .popup-container {
                width: 500px;
            }
        }

        @media (max-width: 1000px) {
            .popup-container {
                width: 100%;
            }
        }

        /* isi popup  */
        .popup-container {
            position: relative;
            margin: 7% auto;
            /* padding:30px 50px; */
            /* background-color: #fafafa; */
            /* color:#333; */
            border-radius: 3px;
        }


        a.popup-close {
            position: absolute;
            top: 3px;
            right: 3px;
            background-color: #333;
            padding: 7px 10px;
            font-size: 20px;
            text-decoration: none;
            line-height: 1;
            color: #fff;
        }

        /* end style popup */
    </style>
</head>

<body>
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
    <!-- loader -->
    <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg>
    </div> -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/scrollax.min.js')}}"></script>

    <script src="{{asset('js/google-map.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @stack('script')

</body>

</html>