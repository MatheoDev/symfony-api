<?php

namespace App\Model;

use App\Enums\TypeTrain;
use Symfony\Component\Uid\UuidV4;

final class Trajet
{
    public readonly UuidV4 $id;
    /**
     * @var iterable<Escale>
     */
    private iterable $escales;
    public readonly TypeTrain $train;

    public function __construct(TypeTrain $train, Escale ...$escales)
    {
        assert(count($escales) > 1);

        $this->id = UuidV4::v4();
        $this->escales = $escales;
        $this->train = $train;
    }

    public function getDepart(): Escale
    {
        return $this->escales[0];
    }

    public function getDestination(): Escale
    {
        return end($this->escales);
    }

    /**
     * @return iterable<Escale>
     */
    public function getArrets(): iterable
    {
        return array_slice($this->escales, 1, -1);
    }
}
