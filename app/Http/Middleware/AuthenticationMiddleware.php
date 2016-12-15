<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AuthenticationMiddleware.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Http\Middleware;


use App\Contracts\UserOauthTokenRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Users\User;
use Auth;
use Closure;

class AuthenticationMiddleware {

    /** @var UserOauthTokenRepositoryInterface */
    private $ouathTokenRepository;

    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserOauthTokenRepositoryInterface $oauthTokenRepository,
                                UserRepositoryInterface $userRepository) {
        $this->ouathTokenRepository = $oauthTokenRepository;
        $this->userRepository       = $userRepository;
    }

    public function handle($request, Closure $next) {
        $user = Auth::user();

        if ($user !== null) {
            // Fetch the real user.
            $u = $this->userRepository->getById($user->getAuthIdentifier());
            if ($u->getUserLevel() === User::USER_LEVEL_ADMIN) {
                return $next($request);
            }
            return $next($request);
        }

        return redirect()->action(AdminController::class . "@getIndex")
            ->withErrors(['login' => 'You are unauthorized to access the admin area.']);
    }
}
