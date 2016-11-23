<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  User.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\Web\App\Models\Users;

use Doctrine\ORM\Mapping as ORM;
use Jitesoft\Web\App\Models\AbstractModel;
use Jitesoft\Web\App\Models\SoftDeleteTrait;

/**
 * User model.
 */
class User extends AbstractModel
{
    use SoftDeleteTrait;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @param string $email
     * @param string $name
     * @param string $password
     */
    public function __construct (string $email, string $name, string $password) {
        parent::__construct();

        $this->email    = $email;
        $this->name     = $name;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getName() : string {
        return $this->name;
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
     * @return string
     */
    public function getPassword() : string {
        return $this->password;
    }

    /**
     * Hashes password.
     * @param string $password
     */
    public function setPassword(string $password) {
        $this->password = $password;
    }
}
