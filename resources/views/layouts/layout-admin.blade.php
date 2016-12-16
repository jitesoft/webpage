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
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
</head>


<body>
@yield('content')
<footer>
    @if(Auth::check())
        @include('admin._admin-footer')
    @endif
</footer>
</body>
<script type="application/javascript" src="{{asset('js/admin.js', env('SECURE', false))}}"></script>
</html>
