<?php

namespace App\Repository;

use App\Enums\TypeTrain;
use App\Model\Escale;
use App\Model\Trajet;

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
}
