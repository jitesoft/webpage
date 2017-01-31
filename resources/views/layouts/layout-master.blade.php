<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Jitesoft</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, shrink-to-fit=no">
        <meta name="author" content="Jitesoft">
        <meta property="og:image" content="og-image.png">
        <meta name="description" content="Jitesoft is a company specialized in backend development for Web, Games and Applications.">
        <meta name="robots" content="nofollow">
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:600" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="stylesheet" href="{{ asset('css/site.css', env('SECURE', false))}}" />
    </head>
    <body>
        @include('cookieConsent::index')
        <div class="position-ref full-height">
            <div class="content">
                <h1 class="link welcome">
                    Jitesoft
                </h1>
                @yield('content')
            </div>
        </div>
        <footer>
            <a href="https://github.com/jitesoft" target="_blank">Github</a>
            <a href="https://bitbucket.org/jitesoft" target="_blank">Bitbucket</a>

            <a href="{{action(\App\Http\Controllers\Web\IndexController::class . '@getPage', ["page" => "contact"])}}" class="link contact">Contact</a>
            <a href="{{action(\App\Http\Controllers\Web\IndexController::class . '@getPage', ["page" => "about"])}}" class="link about">About</a>
            <a href="{{action(\App\Http\Controllers\Web\IndexController::class . '@getPage', ["page" => "welcome"])}}" class="link welcome">Home</a>
        </footer>
        @if(config("APP_ENV", "production") !== "local" && config("APP_ENV", "production") !== "test")
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                ga('create', 'UA-90343888-1', 'auto');
                ga('send', 'pageview');
            </script>
        @endif
        <script type="application/javascript" src="{{asset('js/site.js', env('SECURE', false))}}"></script>
    </body>
</html>
