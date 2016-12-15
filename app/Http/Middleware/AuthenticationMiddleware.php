<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AuthenticationMiddleware.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Http\Middleware;


use App\Contracts\UserOauthTokenRepositoryInterface;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Users\User;
use Auth;
use Closure;

class AuthenticationMiddleware {

    /** @var UserOauthTokenRepositoryInterface */
    private $ouathTokenRepository;

    public function __construct(UserOauthTokenRepositoryInterface $oauthTokenRepository) {
        $this->ouathTokenRepository = $oauthTokenRepository;
    }

    public function handle($request, Closure $next) {
        /** @var User $user */
        $user = Auth::user();
        if ($user !== null && $user->getUserLevel() == User::USER_LEVEL_ADMIN) {
            return $next($request);
        }

        return redirect()->action(AdminController::class . "@getIndex")
            ->withErrors(['login' => 'You are unauthorized to access the admin area.']);
    }
}
