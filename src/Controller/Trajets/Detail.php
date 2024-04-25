<?php

namespace App\Controller\Trajets;

use App\Model\TrajetInterface;
use App\Repository\TrajetRepositoryInterface;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

#[AsController]
#[Route(path: '/trajets/{id}', name: 'trajet_detail', methods: ['GET'])]
class Detail
{
    public function __construct(
        private readonly TrajetRepositoryInterface $trajetRepository,
    )
    {
    }

    /**
     * @param string $id
     * @return TrajetInterface
     */
    public function __invoke(string $id): TrajetInterface
    {
        return $this->trajetRepository->findOneById(Uuid::fromRfc4122($id));
    }
}
