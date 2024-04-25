<?php

namespace App\Domain\Model;

use App\Domain\Enums\TypeTrain;
use Symfony\Component\Uid\Uuid;

final class Trajet implements TrajetInterface
{
    public Uuid $id;
    /**
     * @var iterable<Escale>
     */
    private iterable $escales;
    public readonly TypeTrain $train;

    public function __construct(TypeTrain $train, Escale ...$escales)
    {
        assert(count($escales) > 1);

        $this->id = Uuid::v4();
        $this->escales = $escales;
        $this->train = $train;
    }

    public function setId(Uuid $id): void
    {
        $this->id = $id;
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
