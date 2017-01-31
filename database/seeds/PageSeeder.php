<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  PageSeeder.php - Part of the web project.

  © - Jitesoft 2017
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\Seeders;

use App\Models\AbstractModel;
use App\Models\Page;

class PageSeeder extends AbstractSeeder {
    protected function seed() : array {
        return [
            new Page("welcome", "Welcome", "Jitesoft is a company specialized in backend development for Web, Games and Applications.", "True"),
            new Page("contact", "Contact", "Easiest way of contact is through the electronic postal office. The addressee to send the electronic letter to would be <a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#106;&#111;&#104;&#97;&#110;&#110;&#101;&#115;&#64;&#106;&#105;&#116;&#101;&#115;&#111;&#102;&#116;&#46;&#99;&#111;&#109;'>&#74;&#111;&#104;&#97;&#110;&#110;&#101;&#115;</a>.<br>Hope to hear from you!", true),
            new Page("about", "About Jitesoft", "Jitesoft was started in october 2016 by Johannes Tegnér.<br>We are a company working with both in-house and external projects.<br>The company is specialized within the fields of <i>Game-development</i>, <i>Web-development</i> and <i>Application-development</i>.<br>Feel free to contact <a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#106;&#111;&#104;&#97;&#110;&#110;&#101;&#115;&#64;&#106;&#105;&#116;&#101;&#115;&#111;&#102;&#116;&#46;&#99;&#111;&#109;'>&#74;&#111;&#104;&#97;&#110;&#110;&#101;&#115;</a> for any project queries and we will get back to you as soon as possible!", false)
        ];
    }

    /**
     * @param AbstractModel $model
     * @param array         $models
     * @return bool
     */
    protected function exists(AbstractModel $model, Array $models) : bool {
        /** @var Page $model */
        return array_first($models, function(Page $page) use($model) {
            return $page->getIdentifier() === $model->getIdentifier();
        }) !== null ? true : false;
    }

}
