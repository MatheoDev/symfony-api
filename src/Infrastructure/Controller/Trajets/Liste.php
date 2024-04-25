<?php

namespace App\Infrastructure\Controller\Trajets;

use App\Application\Repository\TrajetRepositoryInterface;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route(path: '/trajets', name: 'trajets_liste', methods: ['GET'])]
class Liste
{
    public function __construct(
        private readonly TrajetRepositoryInterface $trajetRepository,
    ) {}

    public function __invoke()
    {
        return $this->trajetRepository->findAll();
    }
}
