<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AuthController.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Http\Controllers\Admin;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use Socialite;

class AuthController extends Controller
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;

    }

    public function getGoogleAuthRedirection() {
        return Socialite::driver('google')->redirect();
    }

    public function getHandleGoogleProviderCallback() {
        $user = Socialite::driver('google')->user();

        // Get user by id.



        $token = $user->token;
        $refreshToken = $user->refreshToken; // not always provided
        $expiresIn = $user->expiresIn;




        return [
            'email' => $user->getEmail(),
            'token' => $token,
            'refresh' => $refreshToken,
            'expires' => $expiresIn,
            'id' => $user->getId()
        ];
    }
}
