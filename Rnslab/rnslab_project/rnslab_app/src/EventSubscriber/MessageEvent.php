<?php

namespace App\EventSubscriber;

use App\Repository\MessageContactsRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RequestStack;

class MessageEvent implements EventSubscriberInterface
{
    private $messageContactsRepository;
    private $requestStack;

    public function __construct(MessageContactsRepository $messageContactsRepository, RequestStack $requestStack)
    {
        $this->messageContactsRepository = $messageContactsRepository;
        $this->requestStack = $requestStack;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }

    public function onKernelController(ControllerEvent $event): void
    {
        $request = $this->requestStack->getCurrentRequest();

        if ($request->attributes->get('_route') === 'admin') {
            $latestMessages = $this->messageContactsRepository->findBy([], ['dateSend' => 'DESC'], 5);
            $request->attributes->set('latestMessages', $latestMessages);
        }
    }
}