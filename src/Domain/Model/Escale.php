<?php

namespace App\Domain\Model;

use Symfony\Component\Uid\Uuid;

final readonly class Escale
{
    public function __construct(
        public Uuid $id,
        public string $gare,
        public string $voie,
        public \DateTimeInterface $horaire
    ) {}

}
