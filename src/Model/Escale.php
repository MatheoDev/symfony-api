<?php

namespace App\Model;

final readonly class Escale
{
    public function __construct(
        public string $gare,
        public string $voie,
        public \DateTimeInterface $horaire
    ) {}

}
