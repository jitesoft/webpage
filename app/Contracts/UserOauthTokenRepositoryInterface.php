<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserOauthTokenRepositoryInterface.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Contracts;

use App\Models\Users\UserOauthToken;

interface UserOauthTokenRepositoryInterface {
    /**
     * Fetch a User OAuth token by its ID.
     *
     * @param int $id
     * @return UserOauthToken|null
     */
    public function findById(int $id) : ?UserOauthToken;

    /**
     * Fetch a User OAuth token by its OAuthID.
     *
     * @param string $id
     * @return UserOauthToken|null
     */
    public function findByOauthId(string $id) : ?UserOauthToken;
}
