<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  NewsItem.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Models;

/**
 * NewsItem model.
 * Takes care of the data for each of the newsfeed items.
 */
class NewsItem extends AbstractModel {
    use SoftDeleteTrait;


    private $header;
    private $body;
    private $author;


}
