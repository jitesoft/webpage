<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  PageRepositoryInterface.php - Part of the web project.

  © - Jitesoft 2017
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Contracts;

use App\Models\AbstractModel;
use App\Models\Page;

interface PageRepositoryInterface {

    /**
     * Fetch all pages.
     *
     * @return Page[]
     */
    public function getAll() : array;

    /**
     * Find a page by its id.
     *
     * @param int $id
     * @return Page|null
     */
    public function findById(int $id) : ?Page;

    /**
     * Fetch a page by its title.
     *
     * @param string $title
     * @return Page|null
     */
    public function findByTitle(string $title) : ?Page;

    /**
     * Fetch a page by its identifier.
     *
     * @param string $identifier
     * @return Page|null
     */
    public function findByIdentifier(string $identifier) : ?Page;

    /**
     * Persist model.
     *
     * @param AbstractModel $model
     */
    public function persist(AbstractModel $model);
}
