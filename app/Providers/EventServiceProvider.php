<?php

namespace App\Providers;

use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Aacotroneo\Saml2\Events\Saml2LogoutEvent;
use App\Events\Listeners\SAML2LoginEventListener;
use App\Events\Listeners\SAML2LogoutEventListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Saml2LoginEvent::class => [
            SAML2LoginEventListener::class
        ],
        Saml2LogoutEvent::class => [
            SAML2LogoutEventListener::class
        ]
    ];
}
