<?php

namespace App\Domain\PriceCalculator;

use App\Domain\Model\Trajet;
use App\Domain\Model\TrajetInterface;
use App\Domain\PriceCalculator\Modifers\ModifierInterface;
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
