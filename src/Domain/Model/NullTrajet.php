<?php

namespace App\Domain\Model;

use http\Exception\RuntimeException;

final class NullTrajet implements TrajetInterface
{

    public function getDepart(): Escale
    {
        throw new RuntimeException('Not implemented');
    }

    public function getDestination(): Escale
    {
        throw new RuntimeException('Not implemented');
    }

    public function getArrets(): iterable
    {
        throw new RuntimeException('Not implemented');
    }
}
