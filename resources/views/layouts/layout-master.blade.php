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
        <link rel="stylesheet" href="{{asset('css/site.css')}}" />
    </head>


    <body>
        @yield('content')
        <footer>
            <a href="https://github.com/jitesoft" target="_blank">Github</a>
            <a href="https://bitbucket.org/jitesoft" target="_blank">Bitbucket</a>
            <a href="{{action(\App\Http\Controllers\Web\IndexController::class . '@getContact')}}" class="link contact">Contact</a>
            <a href="{{action(\App\Http\Controllers\Web\IndexController::class . '@getAbout')}}" class="link about">About</a>
        </footer>
    </body>
    <script type="application/javascript" src="{{asset('js/site.js', env('SECURE', false))}}"></script>
</html>
