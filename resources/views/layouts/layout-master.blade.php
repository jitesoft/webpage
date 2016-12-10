<!DOCTYPE html>
<html lang="en">
    <head>
        <title>jitesoft</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, shrink-to-fit=no">
        <meta name="author" content="Jitesoft">
        <meta property="og:image" content="{{asset('og-image.png')}}">
        <meta name="description" content="Jitesoft is a company specialized in backend development for Web, Games and Applications.">
        <meta name="robots" content="nofollow">
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:600" rel="stylesheet">
        <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Source Code Pro', monospace;
                margin: 0;
                line-height: 120%;
                font-size:100%;
                text-align: center;
            }

            .content h2 {
                font-size: 1.7em;
            }

            .content p {
                padding: 20px;
                margin: auto;
                font-size: 1.2em;
                font-family: monospace;
                width: 100%;
                max-width: 320px;
                text-align: center;

            }

            .content h1 {
                font-size: 10vw;
            }

            footer {
                position: fixed;
                left: 0;
                right: 0;
                bottom: 0;
                padding: 20px;
                text-align: center;
                font-size: 11px;
            }

            a {
                color: #636b6f;
            }

            .hidden {
                display:none;
            }

        </style>
    </head>


    <body>
        @yield('content')
        <footer>
            <a href="https://github.com/jitesoft" target="_blank">Github</a>
            <a href="https://bitbucket.org/jitesoft" target="_blank">Bitbucket</a>
            <a href="{{action('Web\IndexController@getContact')}}" class="link contact">Contact</a>
            <a href="{{action('Web\IndexController@getAbout')}}" class="link about">About</a>
        </footer>
    </body>
    <script type="application/javascript" src="{{asset('js/app.js', env('SECURE', false))}}"></script>
</html>
