<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  CarbonType.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace App\Extensions\Doctrine;

use App\Models\AbstractModel;
use Carbon\Carbon;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;
use EntityManager;

class SoftDeletableFilter extends SQLFilter {

    const NAME = 'SoftDeletableFilter';

    public function addFilterConstraint(ClassMetadata $metadata, $table) {
        $connection = EntityManager::getConnection();
        $platform   = $connection->getDatabasePlatform();
        $now        = clone Carbon::now('UTC');
        $nowStr     = $now->format($platform->getDateTimeFormatString());

        return $this->isSoftDeletable($metadata->rootEntityName)
            ? "{$table}.deleted_at IS NULL OR '$nowStr' < {$table}.deleted_at"
            : '';
    }

    private function isSoftDeletable($entity) {
        return is_subclass_of($entity, AbstractModel::class);
    }

}
