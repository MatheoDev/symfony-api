<?php

namespace App\Domain\PriceCalculator\Modifers;

use App\Domain\Enums\TypeTrain;
use App\Domain\Model\Trajet;
use App\Domain\PriceCalculator\Price;

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
