<?php

namespace App\Infrastructure\Controller\Trajets;

use App\Application\Repository\TrajetRepositoryInterface;
use App\Domain\Model\NullTrajet;
use App\Domain\PriceCalculator\Price;
use App\Domain\PriceCalculator\PriceCalculator;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

#[AsController]
#[Route(path: '/trajets/{id}/tarif', name: 'trajet_tarif', methods: ['GET'])]
class Tarif
{
    public function __invoke(
        PriceCalculator           $priceCalculator,
        TrajetRepositoryInterface $trajetRepository,
        string                    $id,
        ?string                   $arretId
    ): Price
    {
        $uuidArretId = $arretId !== null ? Uuid::fromRfc4122($arretId) : null;
        $trajet = $trajetRepository->findOneById(Uuid::fromRfc4122($id), $uuidArretId);

        if ($trajet instanceof NullTrajet) {
            throw new NotFoundHttpException();
        }

        return $priceCalculator->calculatePrice($trajet);
    }
}
