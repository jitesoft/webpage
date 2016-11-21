<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AbstractModel.php - Part of the web project.

  © - Johannes Tegnér 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\Web\App\Models;

use Carbon\Carbon;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\PreUpdate;

/**
 * @MappedSuperclass
 * @HasLifecycleCallbacks
 */
abstract class AbstractModel {

    const TIMEZONE = 'UTC';

    /**
     * @Column(type="carbon", name="created_at", nullable=false)
     * @var Carbon
     */
    private $createdAt;

    /**
     * @Column(type="carbon", name="updated_at", nullable=false)
     * @var Carbon
     */
    private $updatedAt;

    /**
     * @var int
     * @Id
     * @Column(type="integer", name="id")
     * @GeneratedValue
     */
    protected $id;

    /**
     * AbstractModel constructor.
     */
    public function __construct() {
        $this->createdAt = Carbon::now(self::TIMEZONE);
        $this->updatedAt = Carbon::now(self::TIMEZONE);
    }

    /**
     * @PreUpdate
     */
    public function onUpdate() {
        $this->updatedAt = Carbon::now(self::TIMEZONE);
    }

    /**
     * Get created at carbon object.
     * @return Carbon
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Get updated at carbon object.
     * @return Carbon
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * @return int|null
     */
    public function getId() {
        return $this->id;
    }
}
