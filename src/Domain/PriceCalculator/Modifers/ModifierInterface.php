<?php

namespace App\Domain\PriceCalculator\Modifers;

use App\Domain\Model\Trajet;
use App\Domain\PriceCalculator\Price;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('app.price_calculator.modifier')]
interface ModifierInterface
{
    public function apply(Trajet $trajet, Price $price): void;
    public static function getDefaultPriority(): int;
}
