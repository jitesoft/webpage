<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  SoftDeleteTrait.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Models;

use Carbon\Carbon;
use Doctrine\ORM\Mapping\Column;

trait SoftDeleteTrait {

    /**
     * @var Carbon
     * @Column(type="carbon", name="deleted_at", nullable=true)
     */
    private $deletedAt;

    /**
     * @return Carbon
     */
    public function getDeletedAt() {
        return $this->deletedAt;
    }
}
