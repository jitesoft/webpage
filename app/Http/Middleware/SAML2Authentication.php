<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  Authentication.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Http\Middleware;

use Closure;
use Saml2;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;

class SAML2Authentication {
    /** @var Auth */
    protected $auth;

    public function __construct(Auth $auth) {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next) {

        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized', 401);
            }
            return Saml2::login();
        }
        return $next($request);
    }
}
