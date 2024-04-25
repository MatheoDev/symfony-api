<?php

namespace App\Infrastructure\DependencyInjection\Compiler;

use App\Application\Repository\TrajetInMemoryTrajetRepository;
use App\Application\Repository\TrajetRepository;
use App\Application\Repository\TrajetRepositoryInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TrajetCompiler implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $container->setAlias(TrajetRepositoryInterface::class, TrajetRepository::class);

        if ($container->getParameter('envAMoi') === 'dev') {
            $container->setAlias(TrajetRepositoryInterface::class, TrajetInMemoryTrajetRepository::class);
        }
    }

}
