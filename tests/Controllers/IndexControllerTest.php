<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  IndexControllerTest.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Tests\Controllers;

use Jitesoft\Seeders\PageSeeder;
use Tests\AbstractTestCase;

class IndexControllerTest extends AbstractTestCase {

    public function setUp() {
        parent::setUp();
        $this->seed(PageSeeder::class);
    }

    public function testGetRoot() {
        $this->get('/page/welcome')
            ->assertViewHas("current", "welcome");
    }

    public function testGetWelcome() {
        $this->get('/')
            ->assertViewHas("current", "welcome");
    }
    public function testGetAbout() {
        $this->get('/page/about')
            ->assertViewHas("current", "about");
    }

    public function testGetContact() {
        $this->get('/page/contact')
            ->assertViewHas("current", "contact");
    }

}
