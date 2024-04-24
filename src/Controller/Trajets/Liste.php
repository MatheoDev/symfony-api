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
        private readonly SerializerInterface      $serializer,
        private readonly TrajetRepositoryInterface $trajetRepository,
    ) {}

    public function __invoke(): JsonResponse
    {
        $trajets = $this->trajetRepository->findAll();

        $serialize = $this->serializer->serialize($trajets, 'json');

        return new JsonResponse($serialize, 200, [], true);
    }
}
