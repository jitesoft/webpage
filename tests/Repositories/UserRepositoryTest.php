<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserRepositoryTest.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Tests\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\Users\User;
use Tests\AbstractTestCase;

/**
 * @group RepositoryTest
 */
class UserRepositoryTest extends AbstractTestCase {

    /** @var UserRepositoryInterface */
    private $repository;

    /** @var User[] */
    private $validUsers = [];

    public function setUp() {
        parent::setUp();

        $this->repository = $this->app->make(UserRepositoryInterface::class);

        // Create some users!
        for ($i=0;$i<3;$i++) {
            $user = new User("user{$i}@jitesoft.com");
            $user->setName("Name {$i}");
            $this->validUsers[$i] = $user;
            $this->entityManager->persist($user);
        }
        $this->entityManager->flush();
    }

    public function testFindById() {
        $first  = $this->repository->findById($this->validUsers[0]->getId());
        $second = $this->repository->findById($this->validUsers[1]->getId());
        $third  = $this->repository->findById($this->validUsers[2]->getId());
        $null   = $this->repository->findById(1234);

        $this->assertNotNull($first);
        $this->assertNotNull($second);
        $this->assertNotNull($third);
        $this->assertNull($null);

        $this->assertSame($this->validUsers[0], $first);
        $this->assertSame($this->validUsers[1], $second);
        $this->assertSame($this->validUsers[2], $third);
    }

    public function testGetAll() {
        $this->assertNotNull($this->repository->getAll());
        $this->assertCount(count($this->validUsers), $this->repository->getAll());

        foreach ($this->repository->getAll() as $model) {
            $this->assertContains($model, $this->validUsers);
        }
    }

    public function testPersist() {
        $this->assertCount(count($this->validUsers), $this->repository->getAll());

        $user = new User("testaseasdasdasd@jitesoft.com");
        $this->repository->persist($user);

        $this->assertCount(count($this->validUsers) + 1, $this->repository->getAll());
        $this->assertContains($user, $this->repository->getAll());
    }
}
