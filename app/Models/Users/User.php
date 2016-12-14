<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  User.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Models\Users;

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\AbstractModel;
use App\Models\SoftDeleteTrait;

/**
 * User model.
 * @ORM\Entity
 */
class User extends AbstractModel implements Authenticatable {

    use \Illuminate\Auth\Authenticatable;
    use SoftDeleteTrait;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="saml_id", type="string", length=255)
     */
    private $samlId;

    public function __construct (string $samlId, string $name) {
        parent::__construct();

        $this->samlId = $samlId;
        $this->name   = $name;
    }

    /**
     * @return string
     */
    public function getSamlId() : string {
        return $this->samlId;
    }

    /**
     * @return string
     */
    public function getName() : string {
        return $this->name;
    }

}
