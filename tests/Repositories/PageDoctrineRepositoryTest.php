<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  PageRepositoryTest.php - Part of the web project.

  © - Jitesoft 2017
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Tests\Repositories;

use App\Contracts\PageRepositoryInterface;
use App\Models\Page;
use Tests\AbstractTestCase;

class PageDoctrineRepositoryTest extends AbstractTestCase {

    /** @var PageRepositoryInterface */
    private $repository;

    public function setUp() {
        parent::setUp();

        $this->repository = $this->app->make(PageRepositoryInterface::class);

        $pages = [
            new Page("test1", "test1", "abc",true, "asadasdasdasd"),
            new Page("test2","test2", "def",true, "asdasd"),
            new Page("test3","test3", "ghi",true, "asdasdasdasd")
        ];

        foreach ($pages as $page) {
            $this->entityManager->persist($page);
        }
        $this->entityManager->flush();
    }

    public function testFindById() {
        $page = new Page("abxac", "abxac", "asdasd",true, "123");
        $this->entityManager->persist($page);
        $this->entityManager->flush();
        $this->assertNotNull($page->getId());
        $this->assertCount(4, $this->repository->getAll());

        $out = $this->repository->findById($page->getId());
        $this->assertSame($page, $out);
    }

    public function testFindByTitle() {
        $page = new Page("ggccc", "abxac", "asdasd",true, "123");
        $this->entityManager->persist($page);
        $this->entityManager->flush();
        $this->assertNotNull($page->getId());
        $this->assertCount(4, $this->repository->getAll());

        $out = $this->repository->findByTitle("abxac");
        $this->assertSame($page, $out);
    }

    public function testFindByIdentifier() {
        $page = new Page("abxac", "asdasd", "asdasd",true, "123");
        $this->entityManager->persist($page);
        $this->entityManager->flush();
        $this->assertNotNull($page->getId());
        $this->assertCount(4, $this->repository->getAll());

        $out = $this->repository->findByIdentifier("abxac");
        $this->assertEquals($page, $out);
    }

}
