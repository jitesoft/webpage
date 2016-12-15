<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserOauthTokenRepository.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Repositories;

use App\Contracts\UserOauthTokenRepositoryInterface;
use App\Models\Users\UserOauthToken;

class UserOauthTokenRepository extends AbstractRepository implements UserOauthTokenRepositoryInterface {

    /**
     * @param int $id
     * @return UserOauthToken|null
     */
    public function findById(int $id) {
        return $this->entityManager->find(UserOauthToken::class, $id);
    }

    /**
     * @param string $id
     * @return UserOauthToken|null
     */
    public function findByOauthId(string $id) {
        return $this->entityManager
            ->createQuery("SELECT t FROM App\Models\Users\UserOauthToken AS t WHERE t.oauthId=:oauth_id")
            ->setParameter("oauth_id", $id)
            ->getOneOrNullResult();
    }
}
