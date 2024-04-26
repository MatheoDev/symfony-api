<?php

namespace App\Domain\PriceCalculator\Formule;

use App\Domain\PriceCalculator\Price;

class Student implements FormuleInterface
{
    public function apply(Price $price): void
    {
        $price->value = $price->value * 0.80;
    }

    public function getName(): string
    {
        return 'student';
    }
}
