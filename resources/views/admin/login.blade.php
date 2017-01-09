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
        <link rel="stylesheet" href="{{asset('css/login.css')}}" />
    </head>
    <body>
        <div class="content">
            <h1>
                Admin - Login
            </h1>

            <div id="errors" class="{{ count($errors) > 0 ? "" : "hidden"  }}">
                @foreach($errors as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>

            <div class="login">
                <a id="google" class="button" href="{{action(\App\Http\Controllers\Admin\AuthController::class . "@getGoogleAuthRedirection")}}">Login with google</a>
            </div>

            <div class="login">
                <a id="jb-hub" class="button" href="{{action(\App\Http\Controllers\Admin\AuthController::class . "@getJbHubAuthRedirection")}}">Login with Jetbrains Hub</a>
            </div>

        </div>
    </body>
</html>
