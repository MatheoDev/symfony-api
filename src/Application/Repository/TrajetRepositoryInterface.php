<?php

namespace App\Application\Repository;

use App\Domain\Model\TrajetInterface;
use Symfony\Component\Uid\Uuid;

interface TrajetRepositoryInterface
{
    public function findAll(): array;

    public function findOneById(Uuid $id): TrajetInterface;
}
