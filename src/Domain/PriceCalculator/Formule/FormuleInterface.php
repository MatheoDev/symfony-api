<?php

namespace App\Domain\PriceCalculator\Formule;

use App\Domain\PriceCalculator\Price;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('app.price_calculator.formule')]
interface FormuleInterface
{
    public function apply(Price $price): void;

    public function getName(): string;
}
