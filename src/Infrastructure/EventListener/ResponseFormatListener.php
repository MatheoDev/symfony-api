<?php

namespace App\Infrastructure\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final readonly class ResponseFormatListener
{
    public function __construct(
//        /** @var iterable<FormaterInterface> */
//        #[AutowireIterator(tag: 'app.content_negociation.formater')]
//        private iterable $formaters,
    )
    {
    }

    #[AsEventListener(event: KernelEvents::VIEW)]
    public function onKernelView(ViewEvent $event): void
    {
        if ($event->getRequest()->attributes->has('_formater')) {
            $event->setResponse(
                $event->getRequest()
                    ->attributes
                    ->get('_formater')
                    ->format($event->getControllerResult())
            );
//            return;
        }

//        foreach ($this->formaters as $formater) {
//            if ($formater->support($event->getRequest()->getPreferredFormat())) {
//                $event->setResponse($formater->format($event->getControllerResult()));
//                return;
//            }
//        }
    }
}
