<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name', 'MiDigitalLife') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap/bootstrap.css') }}">
    <!-- =============== FONTAWESOME STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('css/vendor/fontawesome/css/font-awesome.min.css') }}">
    <!-- =============== 3RD PARTY STYLES ===============-->
    <link rel="stylesheet" href="{{ asset('css/3rdparty/pikaday/pikaday.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('css/3rdparty/datetimepicker/bootstrap_datetimepicker.min.css') }}">-->
    <!-- =============== CUSTOM STYLES ===============-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- =============== CSRF Token ===============-->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
</head>
<body>
    <div class="container" id="app">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>{{ config('app.name', 'Laravel') }}</h3>
                @yield('content')
        </div>
    </div>

    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Email confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>
                        A confirmation email has been sent to <strong>mail.andrew.browne@gmail.com</strong>.
                    </p>
                    <p>
                        Please copy the the confirmation token from that email into the field below and click the <strong>Confirm</strong> button.
                    </p>
                    <p>
                        <input type="text" value="" id="confirmEmail" name="confirmEmail" placeholder="Paste confirmation token" />
                    </p>
                    <p>
                        If you did not receive a email from us with a confirmation token, click the <strong>Resend</strong> button to try again.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Resend</button>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Scripts -->
    <script src="{{ asset('js/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap/bootstrap-dialog.js') }}"></script>
    <script src="{{ asset('js/3rdparty/pikaday/moment.js') }}"></script>
    <script src="{{ asset('js/3rdparty/pikaday/pikaday.js') }}"></script>
    <!--<script src="{{ asset('js/3rdparty/date_timepicker/bootstrap-datetimepicker.js') }}"></script>-->
    <script src="{{ asset('js/custom/common.js') }}"></script>

    <div id="ajax-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static"></div>
   
</body>
</html>
