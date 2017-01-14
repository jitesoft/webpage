<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  CarbonType.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Extensions\Doctrine;

class SoftDeletableExtension {

    /**
     * @return array
     */
    public function getFilters() {
        return array(
            SoftDeletableFilter::NAME => SoftDeletableFilter::class
        );
    }

}
