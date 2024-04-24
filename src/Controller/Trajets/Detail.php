<?php

namespace App\Controller\Trajets;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/trajets/{id}', name: 'trajet_detail', methods: ['GET'])]
class Detail
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse();
    }
}
