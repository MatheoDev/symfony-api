<?php

namespace App\PriceCalculator\Modifers;

use App\Model\Trajet;
use App\PriceCalculator\Price;

class EscaleQuantity implements ModifierInterface
{
    public function apply(Trajet $trajet, Price $price): void
    {
        $percent = $price->value * .1;
        $cout = $percent * count($trajet->getArrets());
        $price->value = $price->value + $cout;
    }

    public static function getDefaultPriority(): int
    {
        return 7;
    }

}
