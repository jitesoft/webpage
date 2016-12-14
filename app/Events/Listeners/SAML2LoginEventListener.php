<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  SAML2LoginEventListener.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Events\Listeners;

use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Aacotroneo\Saml2\Saml2User;
use App\Contracts\UserRepositoryInterface;
use Auth;

class SAML2LoginEventListener {
    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function handle(Saml2LoginEvent $event) {
        /** @var Saml2User $user */
        $user        = $event->getSaml2User();
        $laravelUser = $this->userRepository->getById($user->getUserId());
        Auth::login($laravelUser);
    }
}
