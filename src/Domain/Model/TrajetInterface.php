<?php

namespace App\Domain\Model;

interface TrajetInterface
{
    public function getDepart(): Escale;
    public function getDestination(): Escale;
    public function getArrets(): iterable;
}
