<?php

namespace App\PriceCalculator\Modifers;

use App\Model\Trajet;
use App\PriceCalculator\Price;

interface ModifierInterface
{
    public function apply(Trajet $trajet, Price $price): void;

    public function getPriority(): int;
}
