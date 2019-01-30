<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <style>
        html, body {
            height: 100%;
        }
        .logo {
            background-image: url('images/header_logo.png') !important;
        }
        @yield('style')
    </style>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Agonia Tools - @yield('title')</title>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://agonialands.com/assets/titan/style.css">
        <link rel="stylesheet" href="https://agonialands.com/assets/titan/responsive.css">
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div class="logo"></div>
                <div class="headerNews" style="overflow: hidden;">
                    <h2>Welcome to Agonia Tools!</h2>
                    <p class="news">
                        <b>This is an unofficial guide for the game Agonia - Tales Of Forgotten Lands</b>
                    </p>
                </div>
            </div>
            <div id="content">
                <div id="section1">
                    @include('navbar')
                    @yield('form')
                </div>
                <div id="section2">
                    <div class="panel-char" style="width:100%;">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!-- Javscript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    @yield('javascript')
</html>
