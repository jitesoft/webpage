<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  IndexController.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Http\Controllers\Web;

use App\Contracts\PageRepositoryInterface;
use App\Http\Controllers\Controller;

class IndexController extends Controller {

    /** @var PageRepositoryInterface */
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository) {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Get the welcome/index view.
     * @param string|null $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPage(?string $page = null) {
        $page = $page ?? "welcome";
        $all  = [];
        foreach ($this->pageRepository->getAll() as $p) {
            $all[$p->getIdentifier()] = $p;
        }

        return view('page.main')->with("pages", $all)->with("current", $page);
    }

    /**
     * Get the contact view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact() {
        return view('page.contact');
    }

    /**
     * Get the about view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout() {
        return view('page.about');
    }

}
