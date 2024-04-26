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
        $lille = new Escale(Uuid::v4(), 'Lille', 'A', \DateTimeImmutable::createFromFormat('H:i', '09:12'));
        $grandSynthe = new Escale(Uuid::v4(), 'Grand-Synthe', 'B', \DateTimeImmutable::createFromFormat('H:i', '09:45'));
        $calais = new Escale(Uuid::v4(), 'Calais', 'B', \DateTimeImmutable::createFromFormat('H:i', '10:14'));
        $lilleCalais = new Trajet(Uuid::v4(), TypeTrain::TGV, $lille, $grandSynthe, $calais);

        return [
            $lilleCalais,
        ];
    }

    public function findOneById(Uuid $id, ?Uuid $arretId = null): TrajetInterface
    {
        $lille = new Escale(Uuid::v4(), 'Lille', 'A', \DateTimeImmutable::createFromFormat('H:i', '09:12'));
        $grandSynthe = new Escale(Uuid::v4(), 'Grand-Synthe', 'B', \DateTimeImmutable::createFromFormat('H:i', '09:45'));
        $calais = new Escale(Uuid::v4(), 'Calais', 'B', \DateTimeImmutable::createFromFormat('H:i', '10:14'));

        return new Trajet(Uuid::v4(),TypeTrain::TGV, $lille, $grandSynthe, $calais);
    }
}
