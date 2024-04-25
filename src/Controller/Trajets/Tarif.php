<?php

namespace App\Controller\Trajets;

use App\Model\NullTrajet;
use App\PriceCalculator\Modifers\BasePrice;
use App\PriceCalculator\Modifers\EscaleQuantity;
use App\PriceCalculator\Modifers\TypeOfTrain;
use App\PriceCalculator\PriceCalculator;
use App\Repository\TrajetRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

#[AsController]
#[Route(path: '/trajets/{id}/tarif', name: 'trajet_tarif', methods: ['GET'])]
class Tarif
{
    public function __invoke(PriceCalculator $priceCalculator, TrajetRepositoryInterface $trajetRepository, string $id): JsonResponse
    {
        $trajet = $trajetRepository->findOneById(Uuid::fromRfc4122($id));

        if ($trajet instanceof NullTrajet) {
            throw new NotFoundHttpException();
        }

        return new JsonResponse(['tarif' => $priceCalculator->calculatePrice($trajet)]);
    }
}
