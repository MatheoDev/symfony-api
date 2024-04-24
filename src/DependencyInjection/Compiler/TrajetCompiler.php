<?php

namespace App\DependencyInjection\Compiler;

use App\Repository\TrajetInMemoryTrajetRepository;
use App\Repository\TrajetRepository;
use App\Repository\TrajetRepositoryInterface;
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
