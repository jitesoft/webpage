@if(count($errors) > 0)

    {{$errors->first()}}

@endif

<a href="{{action(\App\Http\Controllers\Admin\AuthController::class . "@getGoogleAuthRedirection")}}">Login with google.</a>
