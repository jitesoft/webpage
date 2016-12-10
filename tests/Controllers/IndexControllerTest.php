<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  IndexControllerTest.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Tests\Controllers;

use TestCase;

class IndexControllerTest extends TestCase
{

    public function testGetWelcome() {
        $this->visit('/')->type('Welcome.', '#text-welcome > h2');
    }
    public function testGetAbout() {
        $this->visit('/about')->type('About.', '#text-about > h2');
    }

    public function testGetContact() {
        $this->visit('/contact')->type('Contact.', '#text-contact > h2');
    }

}
