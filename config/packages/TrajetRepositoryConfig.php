<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use \App\Repository\TrajetRepositoryInterface;
use \App\Repository\TrajetInMemoryTrajetRepository;
use \App\Repository\TrajetRepository;

// example of a service alias in configurator
return static function (ContainerConfigurator $container): void
{
//    $env = $container->env();
//
//    $repository = 'dev' === $env ? TrajetInMemoryTrajetRepository::class : TrajetRepository::class;
//    $container->services()->alias(TrajetRepositoryInterface::class, $repository);
};
