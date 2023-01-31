<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/images/dlb_logo_water.png') }}">
        
        <title>NHA-Epayment</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600;800&display=swap" rel="stylesheet">
        
    </head>
    <body>
    <style>
            * {
                font-family: 'Open Sans';
                font-style: normal;
                font-weight: 300;
                src: local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTRWV49_lSm1NYrwo-zkhivY.woff2) format('woff2');
                unicode-range: U+1F00-1FFF;
            }
            body {
                background: linear-gradient(0deg, rgba(70, 243, 8, 0.47), rgba(62, 100, 49, 0.47)), url({{url('image/nha_background.jpg')}});
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                /* height:100%; */
            }
            
            .footers{
                font-size: 13px;
                position: fixed;
                bottom: 0;
                background: #dfe6e9;
                padding: 1px;
                width: 100%;
                border-top: 1px solid #b2bec3;
                color: #636e72;
            }
        </style>


<div class="d-flex align-items-center justify-content-center" style="height: 100vh">

<div class="con" style="border: 1px solid #9E9E9E; border-radius: 10px; background: white">

    @yield('header')

    @yield('content')

{{--                @yield('footers')--}}


</div>

</div>

<script src="{{ asset('js/app.js') }}" defer></script>
    </body>
    </html>