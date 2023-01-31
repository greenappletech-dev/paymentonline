<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tubig Cadiz E-Payment</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
        
    
    </head>
    <body>
        <style>
            * {
                font-family: 'Arvo', serif;
            }
            .footer{
                font-size: 13px;
                position: fixed;
                bottom: 0;
                background: #dfe6e9;
                padding: 12px;
                width: 100%;
                border-top: 1px solid #b2bec3;
                color: #636e72;
            }
        </style>

        @yield('header')
        
        <script src="{{ asset('js/app.js') }}" defer></script>

        @yield('content')

        @yield('footer')

    </body>
</html>