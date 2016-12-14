<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserRepository.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use Jitesoft\Web\App\Models\Users\User;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    /**
     * Get a user by id.
     * @param $id
     * @return User|null
     */
    public function getById($id) {
        return $this->entityManager->find(User::class, $id);
    }
}
