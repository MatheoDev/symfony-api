<?php

namespace App\Model;

interface TrajetInterface
{
    public function getDepart(): Escale;
    public function getDestination(): Escale;
    public function getArrets(): iterable;
}
