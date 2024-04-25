<?php

namespace App\Infrastructure\ContentNegociation;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HtmlFormater extends AbstractFormater
{
    public const string SUPPORTED_FORMAT = 'html';

    public function __construct(
        private readonly Environment $twig
    ) {}

    public function format(iterable|object $data): Response
    {
        $reflection = is_array($data) ? new \ReflectionClass($data[0]) : new \ReflectionClass($data);
        $resourceName = is_array($data) ? $reflection->getShortName() . 's' : $reflection->getShortName();

        $renderedData = $this->twig->render($resourceName . '.html.twig', [$resourceName => $data]);
        return new Response($renderedData);
    }
}
