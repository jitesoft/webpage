<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AbstractSeeder.php - Part of the web project.

  © - Jitesoft 2017
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\Seeders;

use App\Models\AbstractModel;
use Doctrine\ORM\EntityManagerInterface;
use Generator;
use Illuminate\Database\Seeder;

abstract class AbstractSeeder extends Seeder {

    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @return array|AbstractModel[]
     */
    protected function seed() : array {
        return [];
    }

    /**
     * @return array|AbstractModel[]
     */
    protected function seedDev() : array {
        return [];
    }

    /**
     * @param AbstractModel $model
     * @param AbstractModel[]|array         $models
     * @return bool
     */
    protected function exists(AbstractModel $model, Array $models) : bool {
        return false;
    }

    public function run() {

        $entities = $this->seed();
        if (config("app.env") !== "production") {
            $entities = array_merge($entities, $this->seedDev());
        }

        if (count($entities) <= 0) {
            return;
        }
        $entity = get_class($entities[0]);
        $all    = $this->entityManager->createQuery("SELECT a FROM $entity a")->getResult();

        $entities = array_filter($entities, function($e) use($all) {
            return $e === null || !$this->exists($e, $all);
        });

        foreach ($entities as $entity) {
            $this->entityManager->persist($entity);
            $this->entityManager->flush();
        }
    }
}
