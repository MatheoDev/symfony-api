<?php

namespace App\PriceCalculator;

use App\Model\Trajet;
use App\Model\TrajetInterface;
use App\PriceCalculator\Modifers\ModifierInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

class PriceCalculator
{
    public function __construct(
        /** @var array<ModifierInterface> */
        #[AutowireIterator(tag: 'app.price_calculator.modifier')]
        private iterable $modifiers,
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
