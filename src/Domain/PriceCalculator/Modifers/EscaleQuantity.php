<?php

namespace App\Domain\PriceCalculator\Modifers;

use App\Domain\Model\Trajet;
use App\Domain\PriceCalculator\Price;

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
