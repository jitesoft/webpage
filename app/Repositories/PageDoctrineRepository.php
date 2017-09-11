<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  PageRepository.php - Part of the web project.

  © - Jitesoft 2017
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Repositories;

use App\Contracts\PageRepositoryInterface;
use App\Models\Page;

class PageDoctrineRepository extends AbstractRepository implements PageRepositoryInterface {

    /**
     * Fetch all pages.
     *
     * @return Page[]
     */
    public function getAll() : array {
        return $this->entityManager->getRepository(Page::class)->findAll();
    }

    /**
     * Find a page by its id.
     *
     * @param int $id
     * @return Page|null|object
     */
    public function findById(int $id) : ?Page {
        return $this->entityManager->getRepository(Page::class)->find($id);
    }

    /**
     * Fetch a page by its title.
     *
     * @param string $title
     * @return Page|null|object
     */
    public function findByTitle(string $title) : ?Page {
        return $this->entityManager->getRepository(Page::class)->findOneBy([
           "title" => $title
        ]);
    }


    /**
     * Fetch a page by its identifier.
     *
     * @param string $identifier
     * @return Page|null|object
     */
    public function findByIdentifier(string $identifier): ?Page {
        return $this->entityManager->getRepository(Page::class)->findOneBy([
            "identifier" => $identifier
        ]);
    }
}
