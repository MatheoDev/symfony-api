<?php

namespace App\ContentNegociation;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;
use Symfony\Component\HttpFoundation\Response;

#[AutoconfigureTag('app.content_negociation.formater')]
interface FormaterInterface
{
    public function support(string $format): bool;

    /**
     * @param object $data
     * @return Response
     */
    public function format(object $data);
}
