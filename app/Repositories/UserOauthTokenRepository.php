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
    public function findById(int $id) : ?UserOauthToken {
        return $this->entityManager
            ->createQuery("SELECT t FROM App\Models\Users\UserOauthToken AS t WHERE t.id=:id")
            ->setParameter('id', $id)
            ->getOneOrNullResult();
    }

    /**
     * @param string $id
     * @param string $provider
     * @return UserOauthToken|null
     */
    public function findByOauthIdAndProvider(string $id, string $provider) : ?UserOauthToken {
        return $this->entityManager
            ->createQuery(
                "SELECT t FROM App\Models\Users\UserOauthToken AS t WHERE t.oauthId=:oauth_id AND t.provider=:provider"
            )
            ->setParameter("oauth_id", $id)
            ->setParameter("provider", $provider)
            ->getOneOrNullResult();
    }
}
