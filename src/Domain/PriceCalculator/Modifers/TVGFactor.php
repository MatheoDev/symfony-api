<?php

namespace App\Domain\PriceCalculator\Modifers;

use App\Domain\Enums\TypeTrain;
use App\Domain\Model\Trajet;
use App\Domain\PriceCalculator\Price;

class TVGFactor implements ModifierInterface
{
    public function apply(Trajet $trajet, Price $price): void
    {
        if ($trajet->train === TypeTrain::TGV) {
            $price->value += 2000;
        }
    }

    public static function getDefaultPriority(): int
    {
        return 7;
    }

}
