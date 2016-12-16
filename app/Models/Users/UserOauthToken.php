<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserOauthToken.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Models\Users;

use App\Models\AbstractModel;
use App\Models\SoftDeleteTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_oauth_tokens")
 */
class UserOauthToken extends AbstractModel {
    use SoftDeleteTrait;

    const OAUTH_PROVIDER_GOOGLE = "google";

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tokens")
     */
    private $user;

    /**
     * @var string
     * @ORM\Column(name="provider", type="string", length=255)
     */
    private $provider;

    /**
     * @var string
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

    /**
     * @var string
     * @ORM\Column(name="oauth_id", type="string", length=255)
     */
    private $oauthId;

    public function __construct(User $user, string $provider, string $token, string $id) {
        parent::__construct();

        $this->provider = $provider;
        $this->token    = $token;
        $this->oauthId  = $id;
        $this->user     = $user;
    }

    /**
     * @return User
     */
    public function getUser() : User {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getProvider() : string {
        return $this->provider;
    }

    /**
     * @param string $provider
     */
    public function setProvider(string $provider) {
        $this->provider = $provider;
    }

    /**
     * @return string
     */
    public function getToken() : string {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token) {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getOauthId() : string {
        return $this->oauthId;
    }

    /**
     * @param string $oauthId
     */
    public function setOauthId(string $oauthId) {
        $this->oauthId = $oauthId;
    }

}
