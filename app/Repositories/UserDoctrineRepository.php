<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserRepository.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\Users\User;

class UserDoctrineRepository extends AbstractRepository implements UserRepositoryInterface
{
    /**
     * Fetch all users.
     *
     * @return User[]
     */
    public function getAll() {
        return $this->entityManager->getRepository(User::class)->findAll();
    }

    /**
     * Find a user by its id.
     *
     * @param int $id
     * @return User|null|object
     */
    public function findById(int $id) : ?User {
        return $this->entityManager->getRepository(User::class)->find($id);
    }

    /**
     * Find a user by its email.
     *
     * @param string $email
     * @return User|null|object
     */
    public function findByEmail(string $email) : ?User {
        return $this->entityManager->getRepository(User::class)->findOneBy([
            "email" => $email
        ]);
    }
}
