<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserOauthTokenRepositoryInterface.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Contracts;

use App\Models\Users\UserOauthToken;

interface UserOauthTokenRepositoryInterface {

    /**
     * @param int $id
     * @return UserOauthToken|null
     */
    public function findById(int $id);

    /**
     * @param string $id
     * @return UserOauthToken|null
     */
    public function findByOauthId(string $id);
}
