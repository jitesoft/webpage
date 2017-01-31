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
        $this->visit('/page/welcome')
            ->type('Welcome', '#content-welcome > h2')
            ->assertViewHas("current", "welcome");
    }

    public function testGetWelcome() {
        $this->visit('/')
            ->type('Welcome', '#content-welcome > h2')
            ->assertViewHas("current", "welcome");
    }
    public function testGetAbout() {
        $this->visit('/page/about')
            ->type('About.', '#content-about > h2')
            ->assertViewHas("current", "about");
    }

    public function testGetContact() {
        $this->visit('/page/contact')
            ->type('Contact.', '#content-contact > h2')
            ->assertViewHas("current", "contact");
    }

}
