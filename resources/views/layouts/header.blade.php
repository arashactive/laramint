<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ICET Agra</title>

    <!-- Custom fonts for this template-->
    <link href="{{URL::to('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    @if(Auth::check() && Auth::user()->theme == 'dark')  
        <link href="{{ URL::to('css/dark/sb-admin-2.css') }}" rel="stylesheet">
    @else
        <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
    @endif
    <link href="{{ URL::to('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::to('vendor/jQuery-TE/jquery-te-1.4.0.css') }}" rel="stylesheet">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<!--     Google Analytics opt-out snippet added by Site Kit 
    <script type="text/javascript">
    window["ga-disable-UA-118287266-1"] = true;
    </script>
    <script type="text/javascript">
    window["ga-disable-G-JE49KMQSTV"] = true;
    </script>-->
</head>