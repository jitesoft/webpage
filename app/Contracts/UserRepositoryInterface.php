<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserRepositoryInterface.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Contracts;

use App\Models\AbstractModel;
use App\Models\Users\User;

interface UserRepositoryInterface {

    /**
     * Fetch all users.
     *
     * @return User[]
     */
    public function getAll();

    /**
     * Find a user by its id.
     *
     * @param int $id
     * @return User|null
     */
    public function findById(int $id) : ?User;

    /**
     * Find a user by its email.
     *
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email) : ?User;

    /**
     * Persist model.
     *
     * @param AbstractModel $model
     */
    public function persist(AbstractModel $model);
}
