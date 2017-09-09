<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AbstractTestCase.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Tests;

use App\Extensions\Doctrine\SoftDeletableFilter;
use App\Models\AbstractModel;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Id\IdentityGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Tools\SchemaTool;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use LaravelDoctrine\ORM\Facades\EntityManager;
use ReflectionClass;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class AbstractTestCase extends BaseTestCase {
    protected $baseUrl = 'http://localhost';

    /** @var String[] */
    private static $models = array();

    private static $doctrineMetadata;

    /** @var EntityManagerInterface */
    protected $entityManager;

    private static $appCashed;

    public function setUp() {
        $this->app = self::$appCashed;
        parent::setUp();
        self::$appCashed = $this->app;

        $this->entityManager = $this->app->make(EntityManagerInterface::class);

        if (!$this->entityManager->isOpen()) {
            throw new \Exception('The entity manager is closed.');
        }
    }

    public function tearDown() {

        if ($this->entityManager === null) {
            $this->fail("Entity manager was null.");
            return;
        }

        try {
            $this->entityManager->flush();
        } finally {
            $this->entityManager->clear();
        }

        // Remove all instances of the models with disable filter so that they are actually really removed!
        $this->entityManager->getFilters()->disable(SoftDeletableFilter::NAME);
        foreach (self::$models as $model) {
            $this->entityManager->createQuery("DELETE FROM $model")->execute();
        }
        $this->entityManager->getFilters()->enable(SoftDeletableFilter::NAME);
    }

    /**
     * Creates the application.
     *
     * @return Application
     * @throws \Exception
     */
    public function createApplication() {
        $dbDriver = env('DB_CONNECTION');
        if ($dbDriver !== 'sqlite') {
            throw new \Exception('Tests expects DB_CONNECTION = sqlite');
        }

        $app = require __DIR__.'/../bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
        return $app;
    }

    public function refreshApplication() {
        parent::refreshApplication();

        $app = $this->app;

        $app->forgetInstance(EntityManager::class);
        $app->forgetInstance(EntityManagerInterface::class);
        $entityManager = $app->make(EntityManagerInterface::class);

        if (self::$doctrineMetadata === null) {
            $metadataFactory        = $entityManager->getMetadataFactory();
            self::$doctrineMetadata = $metadataFactory->getAllMetadata();
        }


        foreach (self::$doctrineMetadata as $metadata) {
            /** @var ClassMetadata $metadata */

            // Replace all database generated identifiers with our
            // random id generator.
            if ($metadata->idGenerator instanceof IdentityGenerator) {
                $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_AUTO);
            }
        }

        $schemaTool = new SchemaTool($entityManager);
        $schemaTool->updateSchema(self::$doctrineMetadata, true);

        $config = $entityManager->getConfiguration();
        $config->addFilter(SoftDeletableFilter::NAME, SoftDeletableFilter::class);
        $entityManager->getFilters()->enable(SoftDeletableFilter::NAME);

        $entityManager->beginTransaction();


        self::$models = array();

        foreach (get_declared_classes() as $class) {
            $rClass = new ReflectionClass($class);

            if ($rClass->isSubclassOf(AbstractModel::class) && $rClass->isInstantiable()) {
                self::$models[] = $rClass->getName();
            }
        }

        if (count(self::$models) === 0) {
            self::fail("No models found.");
        }
    }


}
