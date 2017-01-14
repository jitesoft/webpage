<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AuthController.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Http\Controllers\Admin;

use App\Contracts\UserOauthTokenRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Users\User;
use App\Models\Users\UserOauthToken;
use Auth;
use Socialite;

class AuthController extends Controller {
    /** @var UserRepositoryInterface */
    private $userRepository;

    /** @var UserOauthTokenRepositoryInterface */
    private $oauthTokenRepository;

    public function __construct(UserRepositoryInterface $userRepository,
                                UserOauthTokenRepositoryInterface $oauthTokenRepository) {
        $this->userRepository       = $userRepository;
        $this->oauthTokenRepository = $oauthTokenRepository;
    }

    public function getGoogleAuthRedirection() {
        return Socialite::driver('google')->redirect();
    }

    public function getJbHubAuthRedirection() {
        return Socialite::driver('jetbrains-hub')->redirect();
    }

    public function getHandleGoogleProviderCallback() {
        /** @var \SocialiteProviders\Manager\OAuth2\User $user */
        $user = Socialite::driver('google')->user();

        // Check email domain.
        $email = $user->getEmail();
        if (explode('@', $email)[1] !== 'jitesoft.com') {
            return redirect()->action(AdminController::class . "@getIndex")
                ->withErrors(['login' => 'You are unauthorized to access the admin area.']);
        }

        $token = $this->oauthTokenRepository->findByOauthIdAndProvider($user->getId(), 'google');
        if ($token === null) {

            $existingUser = $this->userRepository->findByEmail($email);
            if ($user != null) {
                // User exists. Add a new token.
                $token = $existingUser->createToken(UserOauthToken::OAUTH_PROVIDER_JB_HUB, $user->token, $user->id);
            } else {
                $newUser = new User($user->getEmail());
                $newUser->createToken(UserOauthToken::OAUTH_PROVIDER_GOOGLE, $user->token, $user->getId());
                $this->userRepository->persist($newUser);
                $message = "Could not find a user with given credentials. 
                            A new user has been created but not yet activated. Contact administrator.";

                return redirect()->action(AdminController::class . "@getIndex")
                    ->withErrors(["login" => $message]);
            }
        }

        if (!$token->getUser()->isActive()) {
            return redirect()->action(AdminController::class . "@getIndex")
                ->withErrors(["login" => "User with given credentials is not yet activated. Contact administrator."]);
        }

        Auth::login($token->getUser(), false);
        return redirect()->action(AdminController::class . "@getDashboard");
    }

    public function getHandleJbHubProviderCallback() {
        /** @var \SocialiteProviders\Manager\OAuth2\User $user */
        $user = Socialite::driver('jetbrains-hub')->user();

        // Check email domain.
        $email = $user->getEmail();
        if (explode('@', $email)[1] !== 'jitesoft.com') {
            return redirect()->action(AdminController::class . "@getIndex")
                ->withErrors(['login' => 'You are unauthorized to access the admin area.']);
        }

        $token = $this->oauthTokenRepository->findByOauthIdAndProvider($user->getId(), 'jetbrains-hub');
        if ($token === null) {
            $existingUser = $this->userRepository->findByEmail($email);
            if ($user != null) {
                // User exists. Add a new token.
                $token = $existingUser->createToken(UserOauthToken::OAUTH_PROVIDER_JB_HUB, $user->token, $user->id);
            } else {
                $newUser = new User($user->getEmail());
                $newUser->createToken(UserOauthToken::OAUTH_PROVIDER_JB_HUB, $user->token, $user->getId());
                $this->userRepository->persist($newUser);
                $message = "Could not find a user with given credentials. 
                A new user has been created but not yet activated. Contact administrator.";
                return redirect()->action(AdminController::class . "@getIndex")
                    ->withErrors(["login" => $message]);
            }
        }

        if (!$token->getUser()->isActive()) {
            return redirect()->action(AdminController::class . "@getIndex")
                ->withErrors(["login" => "User with given credentials is not yet activated. Contact administrator."]);
        }

        Auth::login($token->getUser(), false);
        return redirect()->action(AdminController::class . "@getDashboard");
    }

}
