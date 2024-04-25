<?php

namespace App\EventListener;

use App\ContentNegociation\FormaterInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

final readonly class ResponseFormatListener
{
    public function __construct(
        /** @var iterable<FormaterInterface> */
        #[AutowireIterator(tag: 'app.content_negociation.formater')]
        private iterable $formaters,
    ) {}

    #[AsEventListener(event: KernelEvents::VIEW)]
    public function onKernelView(ViewEvent $event): void
    {
        foreach ($this->formaters as $formater) {
            if ($formater->support($event->getRequest()->getPreferredFormat())) {
                $event->setResponse($formater->format($event->getControllerResult()));
                return;
            }
        }

        throw new NotAcceptableHttpException();
    }
}
