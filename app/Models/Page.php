<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  Page.php - Part of the web project.

  © - Jitesoft 2017
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page model.
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
class Page extends AbstractModel {
    use SoftDeleteTrait;

    /**
     * @var string
     * @ORM\Column(name="identifier", length=255, unique=true)
     */
    private $identifier;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var bool
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    public function __construct(string $identifier, string $title, string $body, bool $active) {
        parent::__construct();

        $this->identifier = $identifier;
        $this->title      = $title;
        $this->body       = $body;
        $this->active     = $active;
    }

    /**
     * @return string
     */
    public function getIdentifier() : string {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getTitle() : string {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title) {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getBody() : string {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body) {
        $this->body = $body;
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
}
