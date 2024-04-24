<?php

namespace App\Repository;

use App\Model\TrajetInterface;
use Symfony\Component\Uid\Uuid;

interface TrajetRepositoryInterface
{
    public function findAll(): array;

    public function findOneById(Uuid $id): TrajetInterface;
}
