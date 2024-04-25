<?php

namespace App\Domain\PriceCalculator\Modifers;

use App\Domain\Model\Trajet;
use App\Domain\PriceCalculator\Price;

class BasePrice implements ModifierInterface
{
    public function apply(Trajet $trajet, Price $price): void
    {
        $price->value = 500;
    }

    public static function getDefaultPriority(): int
    {
        return 999;
    }
}
