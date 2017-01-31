<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  PageRepository.php - Part of the web project.

  © - Jitesoft 2017
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Repositories;

use App\Contracts\PageRepositoryInterface;
use App\Models\Page;

class PageRepository extends AbstractRepository implements PageRepositoryInterface {

    /**
     * Fetch all pages.
     *
     * @return Page[]
     */
    public function getAll() : array {
        return $this->entityManager
            ->createQuery("SELECT p FROM \App\Models\Page p")
            ->getResult();
    }

    /**
     * Find a page by its id.
     *
     * @param int $id
     * @return Page|null
     */
    public function findById(int $id) : ?Page {
        return $this->entityManager
            ->createQuery("SELECT p FROM \App\Models\Page p WHERE p.id=:id")
            ->setParameter("id", $id)
            ->getOneOrNullResult();
    }

    /**
     * Fetch a page by its title.
     *
     * @param string $title
     * @return Page|null
     */
    public function findByTitle(string $title) : ?Page {
        return $this->entityManager
            ->createQuery("SELECT p FROM \App\Models\Page p WHERE p.title=:title")
            ->setParameter("title", $title)
            ->getOneOrNullResult();
    }
}
