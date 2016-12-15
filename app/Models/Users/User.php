<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  User.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Models\Users;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\AbstractModel;
use App\Models\SoftDeleteTrait;

/**
 * User model.
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends AbstractModel implements Authenticatable {
    use SoftDeleteTrait;

    const USER_LEVEL_ADMIN        = "administrator";
    const USER_LEVEL_UNAUTHORIZED = "unauthorized";

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var bool
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var string
     * @ORM\Column(name="user_level", type="string", length=255)
     */
    private $userLevel;

    /**
     * @var UserOauthToken[]|Collection
     * @ORM\OneToMany(targetEntity="UserOauthToken", mappedBy="user", cascade={"persist", "remove", "refresh"})
     */
    private $tokens;


    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @param string $email
     */
    public function __construct (string $email) {
        parent::__construct();

        $this->email     = $email;
        $this->userLevel = self::USER_LEVEL_UNAUTHORIZED;
        $this->active    = false;
        $this->name      = $email;

        $this->tokens = new ArrayCollection();
    }

    /**
     * @param string $provider
     * @param string $token
     * @param string $id
     * @return UserOauthToken
     */
    public function createToken(string $provider, string $token, string $id) : UserOauthToken {
        $token = new UserOauthToken($this, $provider, $token, $id);
        $this->tokens->add($token);
        return $token;
    }

    /**
     * @param string $provider
     * @return UserOauthToken|null
     */
    public function getToken(string $provider) {
        return $this->tokens->filter(function(UserOauthToken $token) use($provider) {
            return $token->getProvider() === $provider;
        })->first();
    }

    /**
     * @return string
     */
    public function getEmail() : string {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email) {
        $this->email = $email;
    }

    /**
     * @return bool
     */
    public function isActive() : bool {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active) {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getUserLevel() : string {
        return $this->userLevel;
    }

    /**
     * @param string $userLevel
     */
    public function setUserLevel(string $userLevel) {
        $this->userLevel = $userLevel;
    }

    /**
     * @return string
     */
    public function getName() : string {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) {
        $this->name = $name;
    }


    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName() {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        return null;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken() {
        return "";
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value) {
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName() {
    }
}
