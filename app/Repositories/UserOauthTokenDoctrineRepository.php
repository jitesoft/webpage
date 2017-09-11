<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserOauthTokenRepository.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Repositories;

use App\Contracts\UserOauthTokenRepositoryInterface;
use App\Models\Users\UserOauthToken;

class UserOauthTokenDoctrineRepository extends AbstractRepository implements UserOauthTokenRepositoryInterface {

    /**
     * @param int $id
     * @return UserOauthToken|null|object
     */
    public function findById(int $id) : ?UserOauthToken {
        return $this->entityManager->getRepository(UserOauthToken::class)->find($id);
    }

    /**
     * @param string $id
     * @param string $provider
     * @return UserOauthToken|null|object
     */
    public function findByOauthIdAndProvider(string $id, string $provider) : ?UserOauthToken {

        return $this->entityManager->getRepository(UserOauthToken::class)->findOneBy([
            "oauthId" => $id,
            "provider" => $provider
        ]);
    }
}
