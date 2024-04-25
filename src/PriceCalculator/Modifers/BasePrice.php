<?php

namespace App\PriceCalculator\Modifers;

use App\Model\Trajet;
use App\PriceCalculator\Price;

class BasePrice implements ModifierInterface
{
    public function apply(Trajet $trajet, Price $price): void
    {
        $price->value = 500;
    }

    public function getPriority(): int
    {
        return 999;
    }

}
