<?php

namespace App\PriceCalculator\Modifers;

use App\Enums\TypeTrain;
use App\Model\Trajet;
use App\PriceCalculator\Price;

class TypeOfTrain implements ModifierInterface
{
    public function apply(Trajet $trajet, Price $price): void
    {
        $price->value += match ($trajet->train) {
            TypeTrain::OUIGO =>  500,
            TypeTrain::TER => 1500,
            TypeTrain::TGV => 2500,
        };
    }

    public static function getDefaultPriority(): int
    {
        return 7;
    }

}
