<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  UserOauthRepositoryTest.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Tests\Repositories;

use App\Contracts\UserOauthTokenRepositoryInterface;
use App\Models\Users\User;
use App\Models\Users\UserOauthToken;
use Tests\AbstractTestCase;

/**
 * @group RepositoryTest
 */
class UserOauthRepositoryTest extends AbstractTestCase {

    /** @var UserOauthTokenRepositoryInterface */
    private $repository;

    /** @var UserOauthToken[] */
    private $valid = array();

    public function setUp() {
        parent::setUp();

        $this->repository = $this->app->make(UserOauthTokenRepositoryInterface::class);

        // Create a few tokens, a user is required for that to work.
        $user           = new User("email");
        $this->valid[0] = $user->createToken("google", "abc", "1");
        $this->valid[1] = $user->createToken("facebook", "123", "2");
        $this->valid[2] = $user->createToken("github", "1a2", "3");
        $this->valid[3] = $user->createToken("hub", "a1b", "4");

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function testFindById() {
        $first       = $this->repository->findById($this->valid[0]->getId());
        $second      = $this->repository->findById($this->valid[1]->getId());
        $third       = $this->repository->findById($this->valid[2]->getId());
        $notExisting = $this->repository->findById(12345);

        $this->assertNotNull($first);
        $this->assertNotNull($second);
        $this->assertNotNull($third);
        $this->assertNull($notExisting);

        $this->assertEquals($this->valid[0], $first);
        $this->assertEquals($this->valid[1], $second);
        $this->assertEquals($this->valid[2], $third);
    }

    public function testFindByOauthId() {
        $first       = $this->repository->findByOauthId($this->valid[0]->getOauthId());
        $second      = $this->repository->findByOauthId($this->valid[1]->getOauthId());
        $third       = $this->repository->findByOauthId($this->valid[2]->getOauthId());
        $notExisting = $this->repository->findByOauthId("12345");

        $this->assertNotNull($first);
        $this->assertNotNull($second);
        $this->assertNotNull($third);
        $this->assertNull($notExisting);

        $this->assertEquals($this->valid[0], $first);
        $this->assertEquals($this->valid[1], $second);
        $this->assertEquals($this->valid[2], $third);
    }

}
