<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  RepositoryServiceProvider.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Providers;

use App\Contracts\PageRepositoryInterface;
use App\Contracts\UserOauthTokenRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\PageDoctrineRepository;
use App\Repositories\UserOauthTokenDoctrineRepository;
use App\Repositories\UserDoctrineRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind(UserRepositoryInterface::class, UserDoctrineRepository::class);
        $this->app->bind(UserOauthTokenRepositoryInterface::class, UserOauthTokenDoctrineRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageDoctrineRepository::class);
    }
}
