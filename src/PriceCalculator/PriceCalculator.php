<?php

namespace App\PriceCalculator;

use App\Model\Trajet;
use App\Model\TrajetInterface;
use App\PriceCalculator\Modifers\ModifierInterface;

class PriceCalculator
{
    public function __construct(
        /** @var array<ModifierInterface> */
        private array $modifiers,
    ) {}

    /**
     * @param Trajet $trajet
     * @return Price prix en centimes
     */
    public function calculatePrice(TrajetInterface $trajet): Price
    {
        $price = new Price();

        foreach ($this->modifiers as $modifier) {
            $modifier->apply($trajet, $price);
        }

        return $price;
    }
}
