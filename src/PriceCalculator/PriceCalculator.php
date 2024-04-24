<?php

namespace App\PriceCalculator;

use App\Model\Trajet;

class PriceCalculator
{
    /**
     * @param Trajet $trajet
     * @return int prix en centimes
     */
    public function calculatePrice(Trajet $trajet): int
    {


        return 12;
    }
}
