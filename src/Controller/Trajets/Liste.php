<?php

namespace App\Controller\Trajets;

use App\Repository\TrajetRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

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
