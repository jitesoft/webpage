<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  IndexController.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Get the welcome/index view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getWelcome() {
        return view('web.welcome');
    }

    /**
     * Get the contact view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact() {
        return view('web.contact');
    }

    /**
     * Get the about view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout() {
        return view('web.about');
    }

}
