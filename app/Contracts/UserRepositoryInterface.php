<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserRepositoryInterface.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Contracts;

use App\Models\Users\User;

interface UserRepositoryInterface {

    /**
     * Get a user by id.
     * @param $id
     * @return User|null
     */
    public function getById($id);

}
