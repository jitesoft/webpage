<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  AdminController.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use View;

class AdminController extends Controller {

    public function getIndex() {
        if (Auth::user() !== null) {
            return redirect()->action(AdminController::class . "@getDashboard");
        }

        return View::make('admin.login');

    }

    public function getDashboard() {
        echo "Dashboard!";
    }
}
