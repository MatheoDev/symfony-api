<?php

namespace App\Domain\PriceCalculator\Formule;

use App\Domain\PriceCalculator\Price;

class BigVoyageur implements FormuleInterface
{
    public function apply(Price $price): void
    {
        $price->value = $price->value * 0.75;
    }

    public function getName(): string
    {
        return 'big_voyageur';
    }
}
