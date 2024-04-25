<?php

namespace App\Application\Repository;

use App\Domain\Enums\TypeTrain;
use App\Domain\Model\Escale;
use App\Domain\Model\Trajet;
use App\Domain\Model\TrajetInterface;
use Symfony\Component\Uid\Uuid;


class TrajetInMemoryTrajetRepository implements TrajetRepositoryInterface
{
    public function findAll(): array
    {
        $lille = new Escale('Lille', 'A', \DateTimeImmutable::createFromFormat('H:i', '09:12'));
        $grandSynthe = new Escale('Grand-Synthe', 'B', \DateTimeImmutable::createFromFormat('H:i', '09:45'));
        $calais = new Escale('Calais', 'B', \DateTimeImmutable::createFromFormat('H:i', '10:14'));
        $lilleCalais = new Trajet(TypeTrain::TGV, $lille, $grandSynthe, $calais);

        return [
            $lilleCalais,
        ];
    }

    public function findOneById(Uuid $id): TrajetInterface
    {
        $lille = new Escale('Lille', 'A', \DateTimeImmutable::createFromFormat('H:i', '09:12'));
        $grandSynthe = new Escale('Grand-Synthe', 'B', \DateTimeImmutable::createFromFormat('H:i', '09:45'));
        $calais = new Escale('Calais', 'B', \DateTimeImmutable::createFromFormat('H:i', '10:14'));

        return new Trajet(TypeTrain::TGV, $lille, $grandSynthe, $calais);
    }

}
