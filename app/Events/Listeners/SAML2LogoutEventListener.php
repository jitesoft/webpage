<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  SAML2LogoutEventListener.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Events\Listeners;

use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Aacotroneo\Saml2\Saml2User;

class SAML2LogoutEventListener {

    public function handle(Saml2LoginEvent $event) {

        /** @var Saml2User $user */
        $user     = $event->getSaml2User();
        $userData = [
            'id'         => $user->getUserId(),
            'attributes' => $user->getAttributes(),
            'assertion'  => $user->getRawSamlAssertion()
        ];



        //$laravelUser = //find user by ID or attribute
            //if it does not exist create it and go on  or show an error message
        //Auth::login($laravelUser);

    }


}
