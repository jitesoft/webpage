<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  SAML2LogoutEventListener.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Events\Listeners;

use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Aacotroneo\Saml2\Saml2User;
use Auth;
use Session;

class SAML2LogoutEventListener {

    public function handle(Saml2LoginEvent $event) {

        /** @var Saml2User $user */
        $user = $event->getSaml2User();

        logger(sprintf('User %s logged out.', $user->getUserId()));

        Auth::logout();
        Session::save();
    }


}
