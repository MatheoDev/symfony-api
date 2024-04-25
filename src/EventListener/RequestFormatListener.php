<?php

namespace App\EventListener;

use App\ContentNegociation\FormaterInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

final class RequestFormatListener
{
    private const array ALLOW_SPECIAL_ROUTES = [
        'debug_bar' => '#^/_wdt#',
    ];

    public function __construct(
        /** @var iterable<FormaterInterface> */
        #[AutowireIterator(tag: 'app.content_negociation.formater')]
        private iterable $formaters,
    )
    {
    }

    #[AsEventListener(event: KernelEvents::REQUEST)]
    public function onKernelRequest(RequestEvent $event): void
    {
        foreach (self::ALLOW_SPECIAL_ROUTES as $route) {
            if (preg_match($route, $event->getRequest()->getPathInfo())) {
                return;
            }
        }

        foreach ($this->formaters as $formater) {
            if ($formater->support($event->getRequest()->getPreferredFormat(''))) {
                $event->getRequest()->attributes->set('_formater', $formater);
                return;
            }
        }

        throw new NotAcceptableHttpException(
            sprintf('Unsupported Accept format %s', $event->getRequest()->getPreferredFormat())
        );
    }
}
