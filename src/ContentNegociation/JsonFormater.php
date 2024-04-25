<?php

namespace App\ContentNegociation;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class JsonFormater extends AbstractFormater
{
    public const string SUPPORTED_FORMAT = 'json';

    public function __construct(
        private readonly SerializerInterface $serializer
    ) {}

    public function format(object|iterable $data): JsonResponse
    {
        return new JsonResponse($this->serializer->serialize($data, 'json'), 200, [], true);
    }
}
