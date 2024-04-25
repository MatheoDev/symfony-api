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
        foreach ($this->formaters as $formater) {
            if ($formater->support($event->getRequest()->getPreferredFormat())) {
                $event->getRequest()->attributes->set('_formater', $formater);
                return;
            }
        }

        throw new NotAcceptableHttpException(
            sprintf('Unsupported Accept format %s', $event->getRequest()->getPreferredFormat())
        );
    }
}
