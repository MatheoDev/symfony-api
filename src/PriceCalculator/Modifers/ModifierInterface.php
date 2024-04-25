<?php

namespace App\PriceCalculator\Modifers;

use App\Model\Trajet;
use App\PriceCalculator\Price;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('app.price_calculator.modifier')]
interface ModifierInterface
{
    public function apply(Trajet $trajet, Price $price): void;
    public static function getDefaultPriority(): int;
}
