<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use App\Repository\LegalInformationsRepository;
use Symfony\Component\HttpFoundation\RequestStack;


class LegalInformationsEvents implements EventSubscriberInterface 
{
    private $requestStack;
    private $legalNoticeRepository;

    public function __construct(RequestStack $requestStack, LegalInformationsRepository $legalInformationsRepository){
        $this->requestStack = $requestStack;
        $this->legalNoticeRepository = $legalInformationsRepository;
    }

    public function onKernelController(ControllerEvent $event): void
    {
        $request = $this->requestStack->getCurrentRequest();
        
        $legalNotices = $this->legalNoticeRepository->findAll();
        $request->attributes->set('allLegalNotices', $legalNotices);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}