<?php

namespace App\PriceCalculator\Modifers;

use App\Enums\TypeTrain;
use App\Model\Trajet;
use App\PriceCalculator\Price;

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
