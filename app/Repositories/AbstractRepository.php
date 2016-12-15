<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AbstractRepository.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Repositories;

use App\Models\AbstractModel;
use Doctrine\ORM\EntityManagerInterface;

class AbstractRepository {

    /** @var EntityManagerInterface */
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * Persist a model.
     * @param AbstractModel $model
     */
    public function persist(AbstractModel $model) {
        $this->entityManager->persist($model);
        $this->entityManager->flush();
    }
}
