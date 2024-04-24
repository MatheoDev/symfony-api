<?php

namespace App\Model;

use App\Enums\TypeTrain;
use http\Exception\RuntimeException;
use Symfony\Component\Uid\UuidV4;

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
