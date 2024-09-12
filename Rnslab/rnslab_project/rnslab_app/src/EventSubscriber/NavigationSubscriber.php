<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use App\Repository\PagesRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class NavigationSubscriber implements EventSubscriberInterface
{
    private $pagesRepository;
    private $requestStack;

    public function __construct(PagesRepository $pagesRepository, RequestStack $requestStack){
        $this->pagesRepository = $pagesRepository;
        $this->requestStack = $requestStack;
    }
    public function onKernelController(ControllerEvent $event): void
    {
        $pages = $this->pagesRepository->findAll();
        $this->requestStack->getCurrentRequest()->attributes->set('navigationPages', $pages);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
