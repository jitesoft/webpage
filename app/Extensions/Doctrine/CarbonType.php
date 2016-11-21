<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  CarbonType.php - Part of the web project.

  © - Jitesoft 2016
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\Web\App\Extensions\Doctrine;

use Carbon\Carbon;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeType;

class CarbonType extends DateTimeType {

    const CARBON = "carbon";

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform) {
        if ($value === null || $value instanceof Carbon) {
            return $value;
        }

        return Carbon::instance(parent::convertToPHPValue($value, $platform));
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform) {
        if($value === null) {
            return $value;
        }

        /** @var $value Carbon */
        return $value->format($platform->getDateTimeFormatString());
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return self::CARBON;
    }
}
