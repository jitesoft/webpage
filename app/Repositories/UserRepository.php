<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserRepository.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\Users\User;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    /**
     * Fetch all users.
     *
     * @return User[]
     */
    public function getAll() {
        return $this->entityManager
            ->createQuery("SELECT u FROM \App\Models\Users\User u")
            ->getResult();
    }

    /**
     * Find a user by its id.
     *
     * @param int $id
     * @return User|null
     */
    public function findById(int $id) : ?User {
        return $this->entityManager
            ->createQuery("SELECT u FROM \App\Models\Users\User u WHERE u.id=:id")
            ->setParameter('id', $id)
            ->getOneOrNullResult();
    }

    /**
     * Find a user by its email.
     *
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email) : ?User {
        return $this->entityManager
            ->createQuery("SELECT u FROM \App\Models\Users\User u WHERE u.email=:email")
            ->setParameter('email', $email)
            ->getOneOrNullResult();
    }
}
